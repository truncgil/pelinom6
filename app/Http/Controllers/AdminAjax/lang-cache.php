<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contents;
use Illuminate\Support\Facades\DB;

//bir dil dosyasına ait tüm içerikleri json işlemini yapar.
		$p = $request->all();
		$dizi = array();
		$contents = Contents::get();
		$k=0;
		$p['dil'] = str_replace(".json","",$p['dil']);
		foreach($contents AS $c) {
			$k++;
			file_get_contents(url("l-".$p['dil']."/".$c->slug));
			
		}
		echo "Toplam $k içeriğin {$p['dil']} içerikleri cachelendi";
		$return = null;
	
		
		