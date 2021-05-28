<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class ActorsViewModel extends ViewModel
{
	public $popularActors;
	public $page;

	public function __construct($popularActors, $page)
	{
		$this->popularActors = $popularActors;
		$this->page = $page;
	}

	public function popularActors()
	{
		//return $this->popularActors;

		return collect($this->popularActors)->map(function($popularActor){
			return collect($popularActor)->merge([
				'profile_path' => $popularActor['profile_path']
					? 'https://image.tmdb.org/t/p/w235_and_h235_face'.$popularActor['profile_path']
					: 'https://ui-avatars.com/api/?size=235&name='.$popularActor['name'],
				'known_for' => collect($popularActor['known_for'])->where('media_type','movie')->pluck('title')->union(
					collect($popularActor['known_for'])->where('media_type','tv')->pluck('name')
				)->implode(', ')
			])->only([
				'profile_path','id','name','known_for'
			])->dump();
		});
	}

	public function previous(){
		return $this->page > 1 ? $this->page - 1 : null;
	}

	public function next(){
		return $this->page < 500 ? $this->page + 1 : null;
	}
}
