<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fields extends Model
{
    //
	//use SoftDeletes;
	protected $table = 'fields';
	protected $primaryKey = 'id';
	public $incrementing = true;
	public $timestamps = true;
	


}
