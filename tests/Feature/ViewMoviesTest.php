<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewMoviesTest extends TestCase
{
	/** @test */
	public function the_main_page_shows_correct_info()
	{

		Http::fake([
			'https://api.themoviedb.org/3/movie/popular' => $this->fakePopularMovies(),
			'https://api.themoviedb.org/3/movie/now_playing' => $this->fakeNowPlayingMovies(),
			'https://api.themoviedb.org/3/movie/list' => $this->fakeGenres(),
		]);
		$response = $this->get(route('movies.index'));

		$response->assertSuccessful();
		$response->assertSee('Popular Movies');
		$response->assertSee('Fake Movie');

		$response->assertSee('Now Playing');
		$response->assertSee('Fake Now Playing');
	}

	private function fakePopularMovies()
	{
		return Http::response([
			"results" => [
				[
					"adult" => false,
					"backdrop_path" => "/fPGeS6jgdLovQAKunNHX8l0avCy.jpg",
					"genre_ids" => [
						0 => 28,
						1 => 12,
						2 => 53,
						3 => 10752,
					],
					"id" => 567189,
					"original_language" => "en",
					"original_title" => "Fake Movie",
					"overview" => "An elite Navy SEAL uncovers an international conspiracy while seeking justice for the murder of his pregnant wife.",
					"popularity" => 2983.338,
					"poster_path" => "/rEm96ib0sPiZBADNKBHKBv5bve9.jpg",
					"release_date" => "2021-04-29",
					"title" => "Fake Movie",
					"video" => false,
					"vote_average" => 7.3,
					"vote_count" => 895,
				]
			]
		],200);
	}

	private function fakeNowPlayingMovies()
	{
		return Http::response([
			"results" => [
				[
					"adult" => false,
					"backdrop_path" => "/6ELCZlTA5lGUops70hKdB83WJxH.jpg",
					"genre_ids" =>  [
						0 => 28,
						1 => 14,
						2 => 12,
					],
					"id" => 460465,
					"original_language" => "en",
					"original_title" => "Fake Now Playing",
					"overview" => "Washed-up MMA fighter Cole Young, unaware of his heritage, and hunted by Emperor Shang Tsung's best warrior, Sub-Zero, seeks out and trains with Earth's greatest champions as he prepares to stand against the enemies of Outworld in a high stakes battle for the universe.",
					"popularity" => 2612.747,
					"poster_path" => "/nkayOAUBUu4mMvyNf9iHSUiPjF1.jpg",
					"release_date" => "2021-04-07",
					"title" => "Fake Now Playing",
					"video" => false,
					"vote_average" => 7.6,
					"vote_count" => 2497,
				]
			]
		],200);
	}

	private function fakeGenres()
	{
		return Http::response([
			"genres" => [
				[
					"id" => 28,
					"name" => "Action"
				],
				[
					"id" => 12,
					"name" => "Adventure"
				]
			]
		],200);
	}
}
