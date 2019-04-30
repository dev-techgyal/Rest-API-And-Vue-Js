<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\Article as ArticleResource;
use Illuminate\Http\Request;

class ArticleController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
	 */
	public function index() {
		//fetch articles
		$articles = (new Article())->newQuery()->paginate(15);
		//return articles as collection of resource
		return ArticleResource::collection($articles);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return void
	 */
	public function create() {
		//not used for this tests O_o
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return ArticleResource
	 */
	public function store(Request $request) {
		//here check if the method is put else create new article
		$article = $request->isMethod('put') ? Article::query()->findOrFail($request->article_id) : new Article();

		//get article_id
		$article->id = $request->input('article_id');
		$article->title = $request->input('title');
		$article->body = $request->input('body');

		if ($article->save())
			return new ArticleResource($article);

		return response()->json([
			'Bad GateWay',
		], 501);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return ArticleResource
	 */
	public function show($id) {
		//fetch single article
		$article = (new Article())->newQuery()->findOrFail($id);

		//return the article as a resource
		return new ArticleResource($article);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return void
	 */
	public function edit($id) {
		//not used for this tests O_o
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return void
	 */
	public function update(Request $request, $id) {
		//not used for this tests O_o
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return ArticleResource
	 */
	public function destroy($id) {
		//fetch single article
		$article = (new Article())->newQuery()->findOrFail($id);

		if ($article->delete())
			return new ArticleResource($article);

		return response()->json([
			'Bad GateWay',
		], 501);
	}
}
