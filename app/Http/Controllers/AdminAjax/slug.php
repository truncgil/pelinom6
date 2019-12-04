<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contents;
use Illuminate\Support\Facades\DB;
		$post = $request->all();
		$return = null;
		echo str_slug($post['title'],"-");
		