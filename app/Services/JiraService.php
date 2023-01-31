<?php

namespace BookStack\Services;

use JiraCloud\JiraException;
use Unirest\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class JiraService
 * Handles any app-specific Jira tasks.
 */
class JiraService
{
	/**
	 * OpenIdService constructor.
	 */
	public function __construct()
	{
	}


	/**
	 * Get the JIRA config from the application.
	 */
	protected function config(): array
	{
		$config = config('services.jira');
		return $config;
	}

	/**
	 * 
	 * 
	 * @throws JiraException
	 */
	public function createTask(array $taskCreationParams)
	{

		Log::info(`createTask params` . implode(" ", $taskCreationParams) . "<br>");

		$config = $this->config();
		Request::auth($config['userEmailAddress'], $config['personalAccessToken']);

		$headers = array(
			'Accept' => 'application/json',
			'Content-Type' => 'application/json'
		);

		$summary = "Feedback by {$taskCreationParams['userShortName']} at " . now()->toDateTimeString();
		$summary = json_encode($summary);

		$cleanedUpHighlightedtext = $taskCreationParams['textHighlightedByUser'];
		$cleanedUpHighlightedtext = str_replace(["\r\n", "\r", "\n"], "\n", $cleanedUpHighlightedtext);
		$cleanedUpHighlightedtext = json_encode($cleanedUpHighlightedtext);

		$feedbackText = $taskCreationParams['feedbackText'];
		$feedbackText = str_replace(["\r\n", "\r", "\n"], "\n", $feedbackText);
		$feedbackText = json_encode($feedbackText);

		$intermediateSummary = "
			User details: (Id: {$taskCreationParams['userLogDescription']})
			
			Profile URL: {$taskCreationParams['userProfileUrl']}

			User's short name: {$taskCreationParams['userShortName']}

			The user-agent was {$taskCreationParams['userAgent']}.
		
			Page URL: {$taskCreationParams['pageUrl']}
			
			The highlighted text was:
		";

		$intermediateSummary = str_replace(["\r\n", "\r", "\n"], "\n", $intermediateSummary);
		$intermediateSummary = json_encode($intermediateSummary);

		$description 	= <<<EOD
		"description": {
			"version": 1,
			"type": "doc",
			"content": [
					{
							"type": "paragraph",
							"content": [
									{
											"type": "text",
											"text": {$intermediateSummary}
									}
							]
					},
					{
							"type": "codeBlock",
							"attrs": {},
							"content": [
									{
											"type": "text",
											"text": {$cleanedUpHighlightedtext}
									}
							]
					},
					{
							"type": "paragraph",
							"content": [
									{
											"type": "text",
											"text": "User's feedback:"
									}
							]
					},
					{
						"type": "codeBlock",
						"attrs": {},
						"content": [
								{
										"type": "text",
										"text": {$feedbackText}
								}
						]
				}
			]
		}
		EOD;

		$body = <<<REQUESTBODY
		{
			"fields": {
				"summary": {$summary},
				"issuetype": {
					"id": "10007"
				},
				"project": {
					"id": "10001"
				},
				$description,
				"labels":[
					"customer-feedback",
					"automated-feedback"
				]
			}
		}
		REQUESTBODY;

		Log::info(`$body `.$body);

		// Log::info(`$description ` . $description);

		// $data = [
		// 	'fields' => [
		// 		'summary' => $summary,
		// 		'issuetype' => [
		// 			'id' => '10007'
		// 		],
		// 		'project' => [
		// 			'id' => '10001'
		// 		],
		// 		"description" => [
		// 			"version" => 1,
		// 			"type" => "doc",
		// 			"content" => [
		// 				[
		// 					"type" => "paragraph",
		// 					"content" => [
		// 						[
		// 							"type" => "text",
		// 							"text" => $intermediateSummary
		// 						]
		// 					]
		// 				],
		// 				[
		// 					"type" => "codeBlock",
		// 					"attrs" => [],
		// 					"content" => [
		// 						[
		// 							"type" => "text",
		// 							"text" => $cleanedUpHighlightedtext
		// 						]
		// 					]
		// 				],
		// 				[
		// 					"type" => "paragraph",
		// 					"content" => [
		// 						[
		// 							"type" => "text",
		// 							"text" => "User's feedback:"
		// 						]
		// 					]
		// 				],
		// 				[
		// 					"type" => "codeBlock",
		// 					"attrs" => [],
		// 					"content" => [
		// 						[
		// 							"type" => "text",
		// 							"text" => $feedbackText
		// 						]
		// 					]
		// 				]
		// 			]
		// 		],
		// 		'labels' => [
		// 			'customer-feedback',
		// 			'automated-feedback'
		// 		]
		// 	]
		// ];

		// // Log::info(`data ` . implode(" ", $data));

		// $body = json_encode($data); //Body::json($data);

		// Log::info(`data ` . $body);

		// $body = json_decode($body);

		$response = Request::post(
			$config['host'] . '/rest/api/3/issue',
			$headers,
			$body
		);

		var_dump($response);
	}
}
