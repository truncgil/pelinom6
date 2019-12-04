<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
		$p = $request->all();
		$user = Auth::user();
			
		try {
			$profile = User::where(['id'=>$p['id']])->first();
			$profile->permissions = implode(",",$p['permissions']);

			$profile->update();
			$return =  back()->with("mesaj","Yetkiler başarıyla güncellendi");
		} catch(\Exception $e) {
			$hata = substr($e,0,100);
			$return = back()->with("hata","Yetkiler kaydedilmedi. Hata kodu: $hata");
		}
		
		