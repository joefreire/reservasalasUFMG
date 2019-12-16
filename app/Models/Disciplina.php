<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Reserva extends Eloquent
{
	use SoftDeletes;
	protected $connection = 'mongodb';
	protected $collection = 'reservas';
	protected $guarded = [
		'_id'
	];

}
