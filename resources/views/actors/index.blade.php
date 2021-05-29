@extends('layouts.main')

@section('content')
	<div class="container mx-auto px-4 py-16">

		{{-- Start Popular Actors --}}
		<div class="popular-actors">
			<h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Popular Actors</h2>

			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
				@foreach($popularActors as $actor)
					<div class="actors mt-8">
						<a href="{{ route('actors.show', $actor['id']) }}">
							@if($actor['profile_path'])
								@php $profile_path = $actor['profile_path']; @endphp
							@else
								@php $profile_path = 'https://via.placeholder.com/235'; @endphp
							@endif
							<img src="{{ $profile_path }}" alt="{{ $actor['name'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
						<div class="mt-2">
							<a href="{{ route('actors.show', $actor['id']) }}" class="text-lg hover:text-gray-300">
								{{ $actor['name'] }}
							</a>
							<div class="text-sm truncate text-gray-400">{{ $actor['known_for'] }}</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		{{-- End Popular Actors --}}

		{{-- Start Pagination --}}
		{{-- <div class="flex justify-between mt-16">
			@if($previous)
				<a href="/actors/page/{{ $previous }}">Previous</a>
			@else
				<div></div>
			@endif

			@if($next)
				<a href="/actors/page/{{ $next }}">Next</a>
			@else
				<div></div>
			@endif
		</div> --}}
		{{-- End Pagination --}}

		<!-- status is at bottom of scroll -->
		<div class="page-load-status">
			<div class="flex justify-center">
				<div class="infinite-scroll-request spinner my-8 text-4xl text-white">&nbsp;</div>
			</div>

			<p class="infinite-scroll-last">End of content</p>
			<p class="infinite-scroll-error">No more pages to load</p>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
	<script>
		let elem = document.querySelector('.grid');
		let infScroll = new InfiniteScroll( elem, {
		// options
			path: '/actors/page/@{{#}}',
			append: '.actors',
			status: '.page-load-status'
			// history: false,
		});
	</script>
@endsection
