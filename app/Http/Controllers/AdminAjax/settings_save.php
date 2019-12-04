<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contents;
	
		$dizi = json_encode(array(
			"url" => "url",
			"title" => "title",
			"logo" => "logo",
			"description" => "description"
			
		));
		$settings = Contents::where('slug','settings')->delete();
		$content = new Contents;
		$content -> type = "settings";
		$content -> slug = "settings";
		$content -> title = "settings";
		$content -> json = $dizi;
		$content -> save();
		$return = null;
		echo "ok";
