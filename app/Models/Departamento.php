<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Departamento extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'departamentos';

	protected $fillable = [
		'nome', 'codigo','descricao'
	];
}
