<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$arr['popularMovies'] = Http::withToken(env('TMDB_TOKEN'))
									->get('https://api.themoviedb.org/3/movie/popular')
									->json()['results'];


		$arr['nowPlayingMovies'] = Http::withToken(env('TMDB_TOKEN'))
									->get('https://api.themoviedb.org/3/movie/now_playing')
									->json()['results'];

		$arr['genres'] = Http::withToken(env('TMDB_TOKEN'))->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres'];

		// $arr['genres'] = collect($generArray)->mapWithKeys(function($genre){
		// 	return [$genre['id'] => $genre['name']];
		// });

		//dump($arr);

		$viewModel = new MoviesViewModel(
			$arr['popularMovies'],
			$arr['nowPlayingMovies'],
			$arr['genres']
		);

		return view('index',$viewModel);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$arr['movie'] = Http::withToken(env('TMDB_TOKEN'))
									->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
									->json();
		$viewModel = new MovieViewModel($arr['movie']);

		return view('show',$viewModel);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
