<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contents;
use Illuminate\Support\Facades\DB;
		$p = $request->all();
		if(isset($p['contents'])) {
			$id = $p['kid'];
			print_R($p['contents']);
			print_R($p['type']);
			$breadcrumb = Contents::getBreadcrumbs($id,"{title} / ");
			$tree = Contents::getTree($id);
			$c =  Contents::where("slug",$id)->first();		
			
			foreach($p['contents'] AS $title) {
				
				$content = new Contents;
				$content->title = $title;
				$content->tkid = json_encode($tree);
				$content->breadcrumb = $breadcrumb;
				$content->slug = str_slug($breadcrumb . $title);
				$content->type = $p['type'];					
				$content->kid = $id;
				$content->save();
				
			}	
		}
		$return =  back();
		
		
		