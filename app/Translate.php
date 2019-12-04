<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Translate extends Model
{
    //
	use SoftDeletes;
	protected $table = 'translate';
	protected $primaryKey = 'id';

	

	public function __construct()
	{

	}
	
}
