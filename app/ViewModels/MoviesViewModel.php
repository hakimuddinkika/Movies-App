<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
	public $popularMovies;
	public $nowPlayingMovies;
	public $genres;
	public function __construct($popularMovies,$nowPlayingMovies,$genres)
	{
		$this->popularMovies = $popularMovies;
		$this->nowPlayingMovies = $nowPlayingMovies;
		$this->genres = $genres;
	}

	public function popularMovies(){
		return $this->formatMovies($this->popularMovies);
	}

	public function nowPlayingMovies(){
		return $this->formatMovies($this->nowPlayingMovies);
	}

	public function genres(){
		return collect($this->genres)->mapWithKeys(function($genre){
			return [$genre['id'] => $genre['name']];
		});
	}

	private function formatMovies($movies){
		return collect($movies)->map(function($movie){
			$genreFormatted = collect($movie['genre_ids'])->mapwithkeys(function($value){
				return [$value => $this->genres()->get($value)];
			})->implode(', ');

			return collect($movie)->merge([
				'poster_path' => 'https://image.tmdb.org/t/p/w500'.$movie['poster_path'],
				'vote_average' => $movie['vote_average'] * 10,
				'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
				'genres' => $genreFormatted,
			])->only([
				'poster_path','id','genre_ids','title','overview','genres','vote_average','release_date',
			]);
		});
	}
}
