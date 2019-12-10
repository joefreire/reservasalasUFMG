<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Sala extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'salas';

	protected $fillable = [
		'nome', 'local'
	];
}
