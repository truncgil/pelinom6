<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contents;
use Illuminate\Support\Facades\DB;

//bir dil dosyasını günceller
		$p = $request->all();
		$dizi = array();
		
		foreach($p AS $alan => $deger) {
			if(validBase64($alan)) {
				$alan2 = base64_decode($alan);
				$dizi[$alan2] = $deger;
			}
			
			
			
		}
		$file =  $p[base64_encode('json')];
		unset($dizi['json']);
		print_r($dizi); 
		$json = json_encode($dizi,JSON_UNESCAPED_UNICODE);
		echo $json;
		//exit();
	//	exit();
		if(isJSON($json)) {
			file_put_contents("resources/lang/$file",$json);			
			$return = back()->with("mesaj","$file çevirisi değiştirildi");
		} else {
			$return = back()->with("hata","Veri sorunundan dolayı $file da güncelleme yapılamadı. Bazı alanlar sorun çıkarıyor.");
		}
		
		