@extends('layouts.main')

@section('content')
	<!-- Start Movie Info -->
	<div class="movie-info border-b border-gray-800">
		<div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
			<img src="{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="w-64 lg:w-96">
			<div class="md:ml-24">
				<h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
				<div class="flex flex-wrap items-center text-gray-400 text-sm">
					<span>
						<svg class="fill-current text-yellow-500 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
					</span>
					<span class="ml-1">{{ $movie['vote_average'] }}%</span>
					<span class="mx-2">|</span>
					<span>{{ $movie['release_date'] }}</span>
					<span class="mx-2">|</span>
					<span> {{ $movie['genres'] }}</span>
				</div>

				<p class="text-gray-300 mt-8">
					{{ $movie['overview'] }}
				</p>

				<div class="mt-12">
					<h4 class="text-white font-semibold">Featured Crew</h4>
					<div class="flex mt-4">
						@foreach ($movie['crew'] as $crew)
							<div class="mr-8">
								<div>{{ $crew['name'] }}</div>
								<div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
							</div>
						@endforeach
					</div>
				</div>

				<div x-data="{ isOpen:false}">
					@if (count($movie['videos']['results']) > 0)
						<div class="mt-12">
							<button
								@click="isOpen = true"
								class="flex inline-flex items-center bg-yellow-500 rounded font-semibold px-5 py-4 hover:bg-yellow-600 transition ease-in-out duration-150"
							>
								<svg class="w-6 fill-current " viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play-circle"><circle cx="12" cy="12" r="10"/><path d="M10 8l6 4-6 4V8z"/></svg>
								<span class="ml-2 text-gray-900"> Play Trailer</span>
							</button>
						</div>
					@endif

					<div
						style="background-color: rgba(0, 0, 0, 0.5);"
						class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
						x-show.transtion.opacity="isOpen"
					>
						<div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
							<div class="bg-gray-900 rounded">
								<div class="flex justify-end pr-4 pt-2">
									<button
										@click="isOpen = false"
										class="text-3xl leading-none hover:text-gray-300"
									>&times;</button>
								</div>
								<div class="modal-body px-8 py-8">
									<div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
										<iframe width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full"
										src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" allow="autoplay; encrypted-media" allowfullscreen></iframe>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End Movie Info -->

	<!-- Start Movie Cast -->
	<div class="movie-cast border-b border-gray-800">
		<div class="container mx-auto px-4 py-16">
			<h2 class="text-4xl font-semibold">Cast</h2>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
				@foreach ($movie['cast'] as $cast)

					<div class="mt-8">
						<a href="{{ route('actors.show', $cast['id']) }}">
							<img src="{{ 'https://image.tmdb.org/t/p/w300'.$cast['profile_path'] }}" alt="{{ $cast['name'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
						<div class="mt-2">
							<a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
							<div class="text-white">
								{{ $cast['character'] }}
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- End Movie Cast -->

	<!-- Start Movie Images -->
	<div class="movie-images" x-data="{ isOpen: false, image: ''}">
		<div class="container mx-auto px-4 py-16">
			<h2 class="text-4xl font-semibold">Images</h2>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-16">
				@foreach ($movie['images'] as $backdrop)
					<div class="mt-8">
						<a
							href="#"
							@click.prevent="
								isOpen = true
								image = '{{ 'https://image.tmdb.org/t/p/original/'.$backdrop['file_path'] }}'
							"
						>
							<img src="{{ 'https://image.tmdb.org/t/p/w500/'.$backdrop['file_path'] }}" alt="Movie1" class="hover:opacity-75 transition ease-in-out duration-150">
						</a>
					</div>
				@endforeach
			</div>

			<div
				style="background-color: rgba(0, 0, 0, 0.5);"
				class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
				x-show="isOpen"
				@keydown.escape.window="isOpen = false"
			>
				<div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
					<div class="bg-gray-900 rounded">
						<div class="flex justify-end pr-4 pt-2">
							<button
								@click="isOpen = false"
								class="text-3xl leading-none hover:text-gray-300"
							>&times;</button>
						</div>
						<div class="modal-body px-8 py-8">
							<img :src="image" alt="Image">
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	<!-- End Movie Images -->
@endsection
