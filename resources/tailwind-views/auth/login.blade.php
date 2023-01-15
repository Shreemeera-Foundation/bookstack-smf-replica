@extends('layouts.simple')

{{-- @section('content')

    <div class="container very-small">

        <div class="my-l">&nbsp;</div>

        <div class="card content-wrap auto-height">
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

@stop --}}

{{-- @section('content')
   <div class="flex flex-row">
       <div class="debug basis-1/2">
           Image
       </div>
       <div class="debug basis-1/2 flex justify-center">
           signup
       </div>
   </div>
@stop --}}

@section('content')
	<section class="gradient-form h-full bg-gray-200 h-screen">
		<div class="container h-full py-12 px-6">
			<div class="g-6 flex h-full flex-wrap items-center justify-center text-gray-800">
				<div class="xl:w-10/12">
					<div class="block rounded-lg bg-white shadow-lg">
						<div class="g-0 lg:flex lg:flex-wrap">
							<div class="flex items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none">
								<div class="px-4 py-6 text-white md:mx-6 md:p-12">
									<img src="https://shreemeera.org/wp-content/uploads/2019/08/cropped-67538685_2347594382014334_5679116748763168768_o-300x106.jpg" />
									{{-- <h4 class="mb-6 text-xl font-semibold">We are more than just a company</h4>
									<p class="text-sm">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat.
									</p> --}}
								</div>
							</div>
							<div class="px-4 md:px-0 lg:w-6/12">
								<div class="md:mx-6 md:p-12">
									<div class="text-center">
										<img class="mx-auto w-48" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" alt="logo" />
										<h4 class="mt-1 mb-12 pb-1 text-xl font-semibold">We are The Lotus Team</h4>
									</div>
									<form>
										<p class="mb-4">Please login to your account</p>
										<div class="mb-4">
											<input
												type="text"
												class="form-control m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
												id="exampleFormControlInput1"
												placeholder="Username"
											/>
										</div>
										<div class="mb-4">
											<input
												type="password"
												class="form-control m-0 block w-full rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none"
												id="exampleFormControlInput1"
												placeholder="Password"
											/>
										</div>
										<div class="mb-12 pt-1 pb-1 text-center">
											<button
												class="mb-3 inline-block w-full rounded px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
												type="button"
												data-mdb-ripple="true"
												data-mdb-ripple-color="light"
												style="background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593)"
											>
												Log in
											</button>
											<a class="text-gray-500" href="#!">Forgot password?</a>
										</div>
										<div class="flex items-center justify-between pb-6">
											<p class="mb-0 mr-2">Don't have an account?</p>
											<button
												type="button"
												class="inline-block rounded border-2 border-red-600 px-6 py-2 text-xs font-medium uppercase leading-tight text-red-600 transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
												data-mdb-ripple="true"
												data-mdb-ripple-color="light"
											>
												Danger
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop
