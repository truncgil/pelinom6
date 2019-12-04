<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contents;
use Illuminate\Support\Facades\DB;
		$p = $request->all();
		$id = $p['id'];
		$c =  Contents::where("slug",$id)->first();			
					$content = new Contents;
					$content->title = "";
					$content->tkid = json_encode(Contents::getTree($id));
					$content->breadcrumb = Contents::getBreadcrumbs($id,"{title} / ");
					$content->slug = rand(1111111,99999999);
					$content->type = $p['type'];
					/*
					if(isset($c->type)) {
						$content->type = $c->type;
					} else {
						$content->type = "";
						
					}
					*/
					$content->kid = $id;
					$content->save();
		$return =  redirect("admin/new/contents");
		