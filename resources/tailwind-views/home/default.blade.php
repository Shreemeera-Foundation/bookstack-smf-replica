{{-- @extends('layouts.simple')

@section('body')
		<div class="container px-xl py-s">
				<div class="grid half">
						<div>
								<div class="icon-list inline block">
										@include('home.parts.expand-toggle', [
												'classes' => 'text-muted text-primary',
												'target' => '.entity-list.compact .entity-item-snippet',
												'key' => 'home-details',
										])
								</div>
						</div>
						<div class="text-m-right">
								<div class="icon-list inline block">
										@include('common.dark-mode-toggle', [
												'classes' => 'text-muted icon-list-item text-primary',
										])
								</div>
						</div>
				</div>
		</div>
		<div class="container  smf-mt-4" id="home-default">
				<div class="carousel-parent smf-flex smf-flex-row smf-gap-x-16">

						<div class="recents smf-basis-3/12 smf-space-y-6 ">
							@include('home.parts.sidebar')
						</div>

						<div class="smf-carousel-with-progress smf-basis-9/12">
								@include('books.parts.list', ['books' => $books, 'view' => 'grid'])
						</div>

				</div>
		</div>
@stop --}}


@extends('layouts.simple')

@section('body')

		<div class="container px-xl py-s">
				<div class="grid half">
						{{-- <div>
                <div class="icon-list inline block">
                    @include('home.parts.expand-toggle', ['classes' => 'text-muted text-primary', 'target' => '.entity-list.compact .entity-item-snippet', 'key' => 'home-details'])
                </div>
            </div>
            <div class="text-m-right">
                <div class="icon-list inline block">
                    @include('common.dark-mode-toggle', ['classes' => 'text-muted icon-list-item text-primary'])
                </div>
            </div> --}}
				</div>
		</div>

		<div class="container" id="home-default">
				<div class="grid third gap-xxl no-row-gap">
						<div id="home-column-01">
								@if (count($favourites) > 0)
										<div id="top-favourites" class="card mb-xl">
												<h3 class="card-title">{{ trans('entities.my_most_viewed_favourites') }}</h3>
												<div class="px-m">
														@include('entities.list', [
																'entities' => $favourites,
																'style' => 'compact',
														])
												</div>
												<a href="{{ url('/favourites') }}" class="card-footer-link">{{ trans('common.view_all') }}</a>
										</div>
								@endif


								<div id="{{ auth()->check() ? 'recently-viewed' : 'recent-books' }}" class="card mb-xl">
										<h3 class="card-title">{{ trans('entities.' . (auth()->check() ? 'my_recently_viewed' : 'books_recent')) }}</h3>
										<div class="px-m">
												@include('entities.list', [
														'entities' => $recents,
														'style' => 'compact',
														'emptyText' => auth()->check() ? trans('entities.no_pages_viewed') : trans('entities.books_empty'),
												])
										</div>
								</div>
						</div>

						<div id="home-column-02">
								<div id="recent-pages" class="card mb-xl">
										<h3 class="card-title">{{ trans('entities.recently_updated_pages') }}</h3>
										<div id="recently-updated-pages" class="px-m">
												@include('entities.list', [
														'entities' => $recentlyUpdatedPages,
														'style' => 'compact',
														'emptyText' => trans('entities.no_pages_recently_updated'),
												])
										</div>
										<a href="{{ url('/pages/recently-updated') }}" class="card-footer-link">{{ trans('common.view_all') }}</a>
								</div>

								@if (count($new) > 0)
										<div id="new-books" class="card mb-xl">
												<h3 class="card-title">{{ trans('entities.books_new') }}</h3>
												<div id="recently-new-books" class="px-m">
														@include('entities.list', [
																'entities' => $new,
																'style' => 'compact',
																'emptyText' => trans('entities.books_new_empty'),
														])
												</div>
										</div>
								@endif

						</div>

						<div id="home-column-03">
								@if (count($draftPages) > 0)
										<div id="recent-drafts" class="card mb-xl">
												<h3 class="card-title">{{ trans('entities.my_recent_drafts') }}</h3>
												<div class="px-m">
														@include('entities.list', ['entities' => $draftPages, 'style' => 'compact'])
												</div>
										</div>
								@endif

								@if (!isOnlyViewer())
										<div id="recent-activity">
												<div class="card mb-xl">
														<h3 class="card-title">{{ trans('entities.recent_activity') }}</h3>
														@include('common.activity-list', ['activity' => $activity])
												</div>
										</div>
								@else
										{{-- <div>
											NOT AN ADMIN
										</div> --}}
								@endif
						</div>

				</div>
		</div>

@stop
