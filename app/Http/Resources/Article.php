<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return array
	 */
	public function toArray($request) {
		//original code
//		return parent::toArray($request);

		//doing ur own customization to the api
		return [
			'id' => $this->id,
			'title' => $this->title,
			'body' => $this->body,
		];
	}

	//return the data with something else here i.e
	public function with($request) {
		return [
			'version' => '1.0.0',
			'author-url' => url('https://mvtechzone.com'),
		];
	}
}
