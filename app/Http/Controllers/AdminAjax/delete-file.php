<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contents;
use File;
use Illuminate\Support\Facades\DB;
		$post = $request->all();
		/*
		$ext = $request->file->getClientOriginalExtension();
		$path = $request->file->storeAs("files/{$post['slug']}",$post['slug']."-".$post['id']."-".rand(111,999).'.'.$ext);
		$path = str_replace("files/","",$path);
		
		*/
		echo "ok";
		$destinationPath = $post['file'];
		echo $destinationPath;
		File::delete($destinationPath);
		
		$files_path = ("storage/app/files/{$post['slug']}")."/???*.*";
		$files = glob($files_path);
		DB::table("contents")
            ->where('id', $post['id'])
            ->update(["files" => implode(",",$files)]);
		
			print_r($files);
		$return = null;