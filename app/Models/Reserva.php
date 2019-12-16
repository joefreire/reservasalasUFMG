<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Disciplina extends Eloquent
{
	use SoftDeletes;
	protected $connection = 'mongodb';
	protected $collection = 'disciplinas';
	protected $guarded = [
		'_id'
	];

}
