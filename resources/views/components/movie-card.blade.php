<div class="mt-8">
	<a href="{{ route('movies.show', $movie['id']) }}">
		<img src="{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
	</a>
	<div class="mt-2">
		<a href="{{ route('movies.show', $movie['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $movie['title'] }}</a>

		<div class="flex items-center text-gray-400 text-sm mt-1">
			<span>
				<svg class="fill-current text-yellow-500 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
			</span>
			<span class="ml-1">{{ $movie['vote_average'] }}%</span>
			<span class="mx-2">|</span>
			<span>{{ $movie['release_date'] }}</span>
		</div>
		<div class="text-gray-400 text-sm">
			{{-- @foreach ($movie['genre_ids'] as $genre)
				{{ $genres->get($genre) }}@if (!$loop->last){{ ',' }}@endif
			@endforeach --}}

			{{ $movie['genres'] }}
		</div>
	</div>
</div>
