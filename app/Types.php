<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    //
	//use SoftDeletes;
	protected $table = 'types';
	protected $primaryKey = 'id';
	public $incrementing = true;
	public $timestamps = true;
	

	
	public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
