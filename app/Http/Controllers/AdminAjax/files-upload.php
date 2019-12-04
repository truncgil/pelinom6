<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contents;
use Illuminate\Support\Facades\DB;
		$post = $request->all();
		$ext = $request->file->getClientOriginalExtension();
		$name = $request->file->getClientOriginalName();
		$path = $request->file->storeAs("files/{$post['slug']}",$name);
		$path = str_replace("files/","",$path);
		$files_path = ("storage/app/files/{$post['slug']}")."/???*.*";
		$files = glob($files_path);
		print_r($files);
		DB::table("contents")
            ->where('id', $post['id'])
            ->update(["files" => implode(",",$files)]);
		
			print_r($files);
		$return = null;