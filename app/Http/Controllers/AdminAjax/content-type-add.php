<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contents;
use Illuminate\Support\Facades\DB;
		$p = $request->all();
					$content = new Contents;
					$content->title = "";
					$content->slug = rand(1111111,99999999);
					$content->type = $p['type'];
					$content->kid = "main";
					$content->s = 0;
					$content->save();
		$return =  back();
		