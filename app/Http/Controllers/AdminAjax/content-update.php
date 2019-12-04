<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contents;
use Illuminate\Support\Facades\DB;
		$p = $request->all();
		DB::table("contents")
            ->where('id', $p['id'])
            ->update([
				"title" => $p['title'],
				"kid" => $p['kid'],
				"slug" => $p['slug'],
				"html" => $p['html'],
				'tkid' => json_encode(Contents::getTree($p['kid']),JSON_UNESCAPED_UNICODE),
				'breadcrumb' => Contents::getBreadcrumbs($p['kid'],"{title} / "),
				"json" => json_encode($p,JSON_UNESCAPED_UNICODE)
				
				]);
				//alt itemleri de güncelle
		DB::table("contents")
            ->where('kid', $p['oldslug'])
            ->update([
				"kid" => $p['slug']
				
				]);
		$return =  redirect("admin/contents/{$p['slug']}")->with("mesaj","Değişiklikler Kaydedildi");
		