<form action="{{ url('/register') }}" method="POST" id="register-form" class="smf-space-y-4 md:smf-space-y-6">
		{!! csrf_field() !!}
		<div>
			<label for="email">{{ trans('auth.name') }}</label>
			@include('form.text', ['name' => 'name'])
		</div>
		<div>
			<label for="email">{{ trans('auth.email') }}</label>
			@include('form.text', ['name' => 'email'])
		</div>
		<div>
				<label for="mobile">{{ trans('auth.mobile') }}</label>
				@include('form.number', ['name' => 'mobile', 'min' => 1000000000, 'max' => 999999999999999])
		</div>
		<div>
			<label for="password">{{ trans('auth.password') }}</label>
			@include('form.password', ['name' => 'password', 'placeholder' => trans('auth.password_hint')])
		</div>

		<p class="smf-mb-6 smf-max-w-2xl smf-font-light smf-text-gray-500 dark:smf-text-gray-400 md:smf-text-xs lg:smf-mb-8 lg:smf-text-sm">
				By creating an account, I agree to the <a>Terms</a> and <a>Privacy Policy.</a>
		</p>

		<button type="submit"
				class="smf-w-full smf-rounded-lg smf-bg-primary-600 smf-px-5 smf-py-2.5 smf-text-center smf-text-sm smf-font-medium smf-text-white hover:smf-bg-primary-700 focus:smf-outline-none focus:smf-ring-4 focus:smf-ring-primary-300 dark:smf-bg-primary-600 dark:hover:smf-bg-primary-700 dark:focus:smf-ring-primary-800">{{ Str::title(trans('auth.create_account')) }}</button>

</form>
