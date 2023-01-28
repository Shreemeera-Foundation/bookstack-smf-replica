@extends('layouts.simple')

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
		<div class="container" id="home-default">
				<div class="carousel-parent smf-flex smf-flex-row smf-gap-x-16">

						<div class="recents smf-basis-3/12 smf-space-y-6 ">
							@include('home.parts.sidebar')
						</div>

						{{-- Start: Carousel --}}
						<div class="smf-carousel-with-progress smf-basis-9/12">
								@include('books.parts.list', ['books' => $books, 'view' => 'grid'])
						</div>
						{{-- End: Carousel --}}

				</div>
		</div>
@stop
