<nav class="smf-bg-white smf-px-2 sm:smf-px-4 smf-py-2.5 dark:smf-bg-gray-900 smf-fixed smf-w-full smf-z-20 smf-top-0 smf-left-0 smf-border-b smf-border-gray-200 dark:smf-border-gray-600">

	<div class="container smf-flex smf-flex-wrap smf-justify-between smf-mx-auto">
		<a href="/" class="smf-flex smf-items-center">
			<img src="https://shreemeera.org/wp-content/uploads/2019/08/cropped-67538685_2347594382014334_5679116748763168768_o-300x106.jpg" class="smf-h-6 smf-mr-3 sm:smf-h-9" alt="Flowbite Logo">
			<span class="smf-self-center smf-text-xl smf-font-semibold smf-whitespace-nowrap dark:smf-text-white">Petals</span>
		</a>

	
		<div  class="smf-flex smf-flex-row ">
			<button data-collapse-toggle="navbar-dropdown" type="button" 
			class="smf-inline-flex smf-items-center smf-p-2 smf-ml-3 smf-text-sm smf-text-gray-500 smf-rounded-lg md:smf-hidden hover:smf-bg-gray-100 focus:smf-outline-none focus:smf-ring-2 focus:smf-ring-gray-200 dark:smf-text-gray-400 dark:hover:smf-bg-gray-700 dark:focus:smf-ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
				<span class="smf-sr-only">Open main menu</span>
				<svg class="smf-w-6 smf-h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
			</button>
			<div class="smf-items-center smf-justify-between smf-hidden smf-w-full md:smf-block md:smf-w-auto" id="navbar-dropdown">
				<ul class="smf-flex smf-flex-col smf-p-4 smf-mt-4 smf-border smf-items-center smf-border-gray-100 smf-rounded-lg smf-bg-gray-50 md:smf-flex-row md:smf-space-x-8 md:smf-mt-0 md:smf-text-sm md:smf-font-medium md:smf-border-0 md:smf-bg-white dark:smf-bg-gray-800 md:dark:smf-bg-gray-900 dark:smf-border-gray-700">
				@if (hasAppAccess())
					<li>
						<a href="/search" class="smf-block smf-py-2 smf-pl-3 smf-pr-4 smf-text-white smf-bg-blue-700 smf-rounded md:smf-bg-transparent md:smf-text-primary-700 md:smf-p-0 dark:smf-text-white" aria-current="page">@icon('search'){{ trans('common.search') }}</a>
					</li>
					@if(userCanOnAny('view', \BookStack\Entities\Models\Bookshelf::class) || userCan('bookshelf-view-all') || userCan('bookshelf-view-own'))
						<li>
							<a href="/shelves"  data-shortcut="shelves_view" class="smf-block smf-py-2 smf-pl-3 smf-pr-4 smf-text-gray-700 smf-rounded hover:smf-bg-gray-100 md:hover:smf-bg-transparent md:hover:smf-text-primary-700 md:smf-p-0 md:dark:hover:smf-text-white dark:smf-text-gray-400 dark:hover:smf-bg-gray-700 dark:hover:smf-text-white md:dark:hover:smf-bg-transparent dark:smf-border-gray-700">@icon('bookshelf'){{ trans('entities.shelves') }}</a>
						</li>
					@endif
					<li>
						<a href="/books" data-shortcut="books_view" class="smf-block smf-py-2 smf-pl-3 smf-pr-4 smf-text-gray-700 smf-rounded hover:smf-bg-gray-100 md:hover:smf-bg-transparent md:hover:smf-text-primary-700 md:smf-p-0 md:dark:hover:smf-text-white dark:smf-text-gray-400 dark:hover:smf-bg-gray-700 dark:hover:smf-text-white md:dark:hover:smf-bg-transparent dark:smf-border-gray-700">@icon('books'){{ trans('entities.books') }}</a>
					</li>
					@if(signedInUser() && userCan('settings-manage'))
						<li>
							<a href="/settings" data-shortcut="settings_view" class="smf-block smf-py-2 smf-pl-3 smf-pr-4 smf-text-gray-700 smf-rounded hover:smf-bg-gray-100 md:hover:smf-bg-transparent md:hover:smf-text-primary-700 md:smf-p-0 md:dark:hover:smf-text-white dark:smf-text-gray-400 dark:hover:smf-bg-gray-700 dark:hover:smf-text-white md:dark:hover:smf-bg-transparent dark:smf-border-gray-700">@icon('settings'){{ trans('settings.settings') }}</a>
						</li>
                    @endif
                    @if(signedInUser() && userCan('users-manage') && !userCan('settings-manage'))
						<li>
							<a href="{{ url('/settings/users') }}" data-shortcut="settings_view" class="smf-block smf-py-2 smf-pl-3 smf-pr-4 smf-text-gray-700 smf-rounded hover:smf-bg-gray-100 md:hover:smf-bg-transparent md:hover:smf-text-primary-700 md:smf-p-0 md:dark:hover:smf-text-white dark:smf-text-gray-400 dark:hover:smf-bg-gray-700 dark:hover:smf-text-white md:dark:hover:smf-bg-transparent dark:smf-border-gray-700">@icon('users'){{ trans('settings.users') }}</a>
						</li>
                    @endif

					@if(!signedInUser())
						@if(setting('registration-enabled') && config('auth.method') === 'standard')
							<li>
								<a href="{{ url('/register') }}" class="smf-block smf-py-2 smf-pl-3 smf-pr-4 smf-text-gray-700 smf-rounded hover:smf-bg-gray-100 md:hover:smf-bg-transparent md:hover:smf-text-primary-700 md:smf-p-0 md:dark:hover:smf-text-white dark:smf-text-gray-400 dark:hover:smf-bg-gray-700 dark:hover:smf-text-white md:dark:hover:smf-bg-transparent dark:smf-border-gray-700">@icon('new-user'){{ trans('auth.sign_up') }}</a>
							</li>
						@endif
						<li>
							<a href="{{ url('/login') }}" class="smf-block smf-py-2 smf-pl-3 smf-pr-4 smf-text-gray-700 smf-rounded hover:smf-bg-gray-100 md:hover:smf-bg-transparent md:hover:smf-text-primary-700 md:smf-p-0 md:dark:hover:smf-text-white dark:smf-text-gray-400 dark:hover:smf-bg-gray-700 dark:hover:smf-text-white md:dark:hover:smf-bg-transparent dark:smf-border-gray-700">@icon('login'){{ trans('auth.log_in') }}</a>
						</li>
               		@endif

					@if(signedInUser())
						<?php $currentUser = user(); ?>
						<li>
							<button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="smf-flex smf-items-center smf-justify-between smf-w-full smf-py-2 smf-pl-3 smf-pr-4 smf-font-medium smf-text-gray-700 smf-rounded hover:smf-bg-gray-100 md:hover:smf-bg-transparent md:smf-border-0 md:hover:smf-text-blue-700 md:smf-p-0 md:smf-w-auto dark:smf-text-gray-400 dark:hover:smf-text-white dark:focus:smf-text-white dark:smf-border-gray-700 dark:hover:smf-bg-gray-700 md:dark:hover:smf-bg-transparent">
								<span class="user-name py-s hide-under-l" refs="dropdown@toggle"
									aria-haspopup="true" aria-expanded="false" aria-label="{{ trans('common.profile_menu') }}" tabindex="0">
									<img class="avatar" src="{{$currentUser->getAvatar(30)}}" alt="{{ $currentUser->name }}">
									<span class="name">{{ $currentUser->getShortName(9) }}</span> @icon('caret-down')
                        		</span> 
							</button>
						
							<!-- Dropdown menu -->
							<div id="dropdownNavbar" class="smf-z-10 smf-hidden smf-font-normal smf-bg-white smf-divide-y smf-divide-gray-100 smf-rounded-lg smf-shadow smf-w-44 dark:smf-bg-gray-700 dark:smf-divide-gray-600">
								<div>
									<ul class="smf-py-2 smf-text-sm smf-text-gray-700 dark:smf-text-gray-400" aria-labelledby="dropdownLargeButton">
										<li>
											<a href="{{ url('/favourites') }}" data-shortcut="favourites_view" class="smf-block smf-px-4 smf-py-2 hover:smf-bg-gray-100 dark:hover:smf-bg-gray-600 dark:hover:smf-text-white">
												@icon('star')
												{{ trans('entities.my_favourites') }}
											</a>
										</li>
										<li>
											<a href="{{ $currentUser->getProfileUrl() }}" data-shortcut="profile_view" class="smf-block smf-px-4 smf-py-2 hover:smf-bg-gray-100 dark:hover:smf-bg-gray-600 dark:hover:smf-text-white">  @icon('user')
												{{ trans('common.view_profile') }}
											</a>
										</li>
										<li>
											<a href="{{ $currentUser->getEditUrl() }}" class="smf-block smf-px-4 smf-py-2 hover:smf-bg-gray-100 dark:hover:smf-bg-gray-600 dark:hover:smf-text-white"> @icon('edit')
												{{ trans('common.edit_profile') }}
											</a>
										</li>
										<li>
											<a href="#" class="smf-block smf-px-4 smf-py-2 hover:smf-bg-gray-100 dark:hover:smf-bg-gray-600 dark:hover:smf-text-white">
												@icon('logout')
														{{ trans('auth.logout') }}
												<form action="{{ url(config('auth.method') === 'saml2' ? '/saml2/logout' : '/logout') }}"
													method="post" style="height: 0px;">
													{{ csrf_field() }}
													<button class="" data-shortcut="logout">
														
													</button>
												</form>
											</a>
										</li>
									</ul>
								</div>
								<div class="smf-py-1 smf-border-t-1 smf-border-solid">
									<ul>
										<li>
											<a href="{{ url('/preferences/shortcuts') }}" class="smf-block smf-px-4 smf-py-2 smf-text-sm smf-text-gray-700 hover:smf-bg-gray-100 dark:hover:smf-bg-gray-600 dark:smf-text-gray-400 dark:hover:smf-text-white">
												@icon('shortcuts')
												{{ trans('preferences.shortcuts') }}
											</a>
										</li>
										<li>
											<a href="{{ url('/preferences/shortcuts') }}" component="reading-font-resizer" option:reading-font-resizer:name="increaseFont"
											option:reading-font-resizer:font="increase" class="smf-block smf-px-4 smf-py-2 smf-text-sm smf-text-gray-700 hover:smf-bg-gray-100 dark:hover:smf-bg-gray-600 dark:smf-text-gray-400 dark:hover:smf-text-white">
												@icon('magnifying-glass-plus-solid') {{ trans('common.increase_reading_font_size') }}
											</a>
										</li>
										<li>
											<a href="{{ url('/preferences/shortcuts') }}" component="reading-font-resizer" option:reading-font-resizer:name="decreaseFont"
											option:reading-font-resizer:font="decrease" class="smf-block smf-px-4 smf-py-2 smf-text-sm smf-text-gray-700 hover:smf-bg-gray-100 dark:hover:smf-bg-gray-600 dark:smf-text-gray-400 dark:hover:smf-text-white">
												@icon('magnifying-glass-minus-solid') {{ trans('common.decrease_reading_font_size') }}
											</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
					@endif


				@endif
				</ul>
			</div>		
			
		</div>

	</div>
  </nav>