<div component="pointer"
     option:pointer:page-id="{{ $page->id }}"
     id="pointer"
     class="pointer-container">
    <div class="pointer anim smf-flex smf-flex-col" >
				<div class="smf-w-full smf-mb-2">
					<form component="ajax-form"
						option:ajax-form:local-storage-property='currentPointerSelectionText,currentPermalink'
						option:ajax-form:success-message="{{ trans('components.feedback_sent_success') }}"
						option:ajax-form:method="post"
						option:ajax-form:url="{{ url('/ajax/page/'.$page->id.'/sendFeedback') }}">

						<div class="form-group stretch-inputs">
							@include('form.textarea', ['name' => 'feedbackText'])
						</div>
						<div class="grid half">
								<div	>
								</div>
								<div class="text-right">
										<button type="submit" class="button icon outline">{{ trans('common.feedback_send') }}</button>
								</div>
						</div>
					</form>
				</div>
				<div class="smf-w-full">
					<span class="icon mr-xxs">@icon('link') @icon('include', ['style' => 'display:none;'])</span>
					<div class="input-group inline block">
							<input readonly="readonly" type="text" id="pointer-url" placeholder="url">
							<button class="button outline icon" data-clipboard-target="#pointer-url" type="button" title="{{ trans('entities.pages_copy_link') }}">@icon('copy')</button>
					</div>
					@if(userCan('page-update', $page))
							<a href="{{ $page->getUrl('/edit') }}" id="pointer-edit" data-edit-href="{{ $page->getUrl('/edit') }}"
								class="button primary outline icon heading-edit-icon ml-s px-s" title="{{ trans('entities.pages_edit_content_link')}}">@icon('edit')</a>
					@endif
				</div>
    </div>
</div>