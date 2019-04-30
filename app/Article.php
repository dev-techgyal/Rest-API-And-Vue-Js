<?php

namespace App;

use App\Uuids\Uuids;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {
	use Uuids;
	/**
	 * Indicates if the IDs are auto-incrementing.
	 *
	 * @var bool
	 */
	public $incrementing = false;

	//create mass assignable attributes
	protected $fillable = [
		'title',
		'body',
	];
}
