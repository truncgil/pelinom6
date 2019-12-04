<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contents;
use Illuminate\Support\Facades\DB;
//print_r( $request->all());
$post = $request->all();
		/*
		Array ( [table] => contents [value] => Başlık buraya [_token] => yVfSAMNxOD6rdtIeLkZllFvm46a1TAgPtbO1fJHu [id] => 62 [name] => name )
		*/
		DB::table($post['table'])
            ->where('id', $post['id'])
            ->update([$post['name'] => $post['value']]);
			$return = back();
		echo "ok";
