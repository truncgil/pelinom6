<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contents;
use Illuminate\Support\Facades\DB;
		$post = $request->all();
		$ext = $request->cover->getClientOriginalExtension();
		$path = $request->cover->storeAs('files/'.date("Y")."/".date("m"),$request['slug']."-".date("his").'.'.$ext);
		$path = str_replace("files/","",$path);
		DB::table("contents")
            ->where('id', $post['id'])
            ->update(["cover" => $path]);
		$return = back();
		