@extends('layouts.signup-signin-layout')
@section('content')
	<div class="px-8 grid grid-cols-1 gap-4 lg:grid-cols-12 lg:gap-8 md:grid-cols-8 md:gap-4 m-32">
		<div class="col-span-6 rounded-md flex items-center justify-center">
			{{-- START: Left panel with SMF Petals logo --}}
			<div class="flex w-full h-full" >
					<div 
						class="flex bg-no-repeat bg-contain bg-center items-center justify-center m-32" 
						style="background-image: url('https://shreemeera.org/wp-content/uploads/2019/08/cropped-67538685_2347594382014334_5679116748763168768_o-300x106.jpg');">
					</div>
		</div>
			{{-- END: Left panel with SMF Petals logo --}}
		</div>
		<div class="col-span-6 bg-gray-50 rounded-md flex items-center justify-center">
			{{-- START: Right panel with signup / signin form --}}
			<div class="px-4 md:px-0 lg:w-6/12">
				<div class="md:mx-6 md:p-12">
					<div class="text-center">
							<h1 class="list-heading">{{ Str::title(trans('auth.log_in')) }}</h1>
							@include('auth.parts.login-message')

							@include('auth.parts.login-form-' . $authMethod)

							@if (count($socialDrivers) > 0)
									<hr class="my-l">
									@foreach ($socialDrivers as $driver => $name)
											<div>
													<a id="social-login-{{$driver}}" class="button outline svg" href="{{ url("/login/service/" . $driver) }}">
															@icon('auth/' . $driver)
															<span>{{ trans('auth.log_in_with', ['socialDriver' => $name]) }}</span>
													</a>
											</div>
									@endforeach
							@endif

							@if (setting('registration-enabled') && config('auth.method') === 'standard')
									<div class="text-center pb-s">
											<hr class="my-l">
											<a href="{{ url('/register') }}">{{ trans('auth.dont_have_account') }}</a>
									</div>
							@endif
					</div>
				</div>
			</div>
			{{-- END: Right panel with signup / signin form --}}
		</div>
	</div>
@stop
