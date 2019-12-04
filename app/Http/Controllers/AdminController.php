<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Schema\Blueprint; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Contents;
use App\Types;
use App\Fields;
use App\User;
class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$contents = Contents::where("kid","main")
		->orderBy("s","ASC")
		->get(); // tüm içeriklerdeki ana içerikler gelecek
		$types = Types::get(); // tüm tipler
		
	}

    public function logout() {
		Auth::logout();
		return redirect('loginhtdedwqa');
	}
    
    public function action2(string $action="",string $type ="") {
		if($type=="types") {
			$types = new Types;
			$types->title = "";
			$types->slug = "";
			$types->save();
			return back();		
					
			
		}
	}
    public function action(string $type="",string $id="",string $action ="") {
		$this->middleware('auth');
		if($type=="contents") {
			switch($action) {
				case "add" : 
					$c =  Contents::where("slug",$id)->first();			
					$content = new Contents;
					$content->title = "";
					$content->slug = rand(1111111,99999999);
					$content->tkid = json_encode(Contents::getTree($id));
					$content->breadcrumb = Contents::getBreadcrumbs($id,"{title} / ");
					if(isset($c->type)) {
						$content->type = $c->type;
					}
					
					$content->kid = $id;
					$content->save();
					return redirect("admin/$type/$id");
				break;
				case "delete":		
					$content = Contents::where('slug', $id)->orWhere("id",$id)->delete();
					return back();
				break;
				
			}	
		}
		if($type=="types") {
			switch($action) {
				;
				case "delete":		
					$content = Types::where('id', $id)->delete();
					return back();
				break;
				
			}
		}
		
		
	}
	public function new(string $type="") {
		$this->middleware('auth');
		$contents = Contents::where("kid","main")
		->orderBy("s","ASC")
		->get(); // tüm içeriklerdeki ana içerikler gelecek
		$types = Types::get(); // tüm tipler
		$var = [
			'type'	=> $type,
			'contents'	=> $contents,
			"types" 	=> $types
		];
		try {    
			return view("admin/new/$type",$var);
		} catch (\Exception $e) {
			return abort(404);
		}
	}
	public function default(string $type="",string $id="",Request $request)
    {
		$this->middleware('auth');
		$p = $request -> all();
		$contents = Contents::where("kid","main")
		->orderBy("s","ASC") // s alanı sıralama alanıdır. 
		->get(); // tüm içeriklerdeki ana içerikler gelecek
		$types = Types::get(); // tüm tipler
		$alt = null;
		$fields = null;
		$content_fields = null;
		$c = null;
		$j = null;
		$breadcrumb = null;
		$ust = null;
		$q = null;
		$search_contents = null;
		$seviye = null;
		$users = null;
		if(oturumisset("miktar")) {
			$miktar = oturum("miktar");
		} else {
			$miktar = 10;
		}
		if(isset($p['m'])) {
			$miktar = $p['m'];
			oturum("miktar",$p['m']);
		} 
		switch($type) {
			case "users" : 
			
			break;
			case "search" : 
			
			  $q = $p['q'];
			
			  $searchFields = ['title','html','json','tkid','kid','type'];
			  $search_contents = Contents::where(function($query) use($request, $searchFields){
				$searchWildcard = '%' . $request->q . '%';
				foreach($searchFields as $field){
				  $query->orWhere($field, 'LIKE', $searchWildcard);
				}
			  })
			  ->get();
			break;
			//ilgili type ın ne olduğuna bakmak gerekli 
			case "types":
				$c = Types::where("slug",$id)->first();
				if(isset($p['q'])) {
					
				}
				$q = get("q");
				$searchFields = ['title','html','json','tkid','kid','breadcrumb'];
				$alt = Contents::where("type",$c->title) 
				->where(function($query) use($request, $searchFields){
					$searchWildcard = '%' . $request->q . '%';
					foreach($searchFields as $field){
					  $query->orWhere($field, 'LIKE', $searchWildcard);
					}
				})
				
				->orderBy("id","DESC")
				->simplePaginate($miktar);;
			break;
			case "contents":
			//content alanında çalışacak şeyler öncelikle ilgili itemin içeriği ve onun alt içerikleri
					if($id=="") $view = "index"; 
					else {
						$c = Contents::where("slug",$id)->orWhere("id",$id)->first();
						if($c->kid!="") {
							$breadcrumb = Contents::getBreadcrumbs($c->kid);
							$tree = Contents::getTree($id);
							$breadcrumb2 = Contents::getBreadcrumbs($id,"{title} / ");
						}else {
							$breadcrumb = "";
							$tree = "";
							$breadcrumb2 = "";
						}
						
						$ust = Contents::where("slug",$c->kid)->first();
						$j = @json_decode($c->json,true);
						$alt = Contents::where("kid",$id)->orWhere("kid",$c->slug)->orderBy("s","ASC")->simplePaginate($miktar);
						if($c->type!="") {
							$content_type = Types::where("title",$c->type)->first(); // content type
							$content_type = @explode(",",$content_type->fields);
						}
						if($c->tkid=="") {
							DB::table("contents")
								->where('id', $id)
								->update([
									'tkid' => json_encode($tree),
									'breadcrumb' => $breadcrumb2
									]);
							
						}
						if($c->type!="") {
							$fields = Fields::get();
							$fields = json_decode($fields,true);
							$fields2 = array();
							
							//burada ilgili içerik tipine ait alanların değerleri ve tip sistemini alıyoruz. Bunu dinamik form sisteminde kullanacağız
							foreach(@$fields AS $r) {
								if(in_array($r['title'],$content_type)) {
									$fields2[$r['title']] = array(
										"values" => explode(",",$r['values']),
										"type" => $r['input_type'] 
									);
								}
								
							}
							$fields = $fields2;
							if(isset($ct->fields)) {
								$content_fields = explode(",",$ct->fields); // içerik alanları
							}
						}
					} // if
					
							
				
				
			break;
			
			//bir içerik tipine ait olan alanların input type larının tutulduğu bir tablo bu sistem types tablosuna girilen fieldsları otomatik oluşturuyor.
			case "fields" : 
				//input_type alanı boş olanları silelim
				Fields::where('input_type', '=', '')
				->orWhereNull('input_type')
				->delete();
				
				//tekrar oluşturalım tüm alanları
				foreach($types AS $t) {
					$fields = explode(",",$t->fields);
					foreach($fields AS $r) {
						$r = trim($r);
						$c = Fields::where("title",$r)->first();
						
						if($r!="") {
							if($c == "") {
								$row = new Fields();
								$row->title = $r;
								$row->type	= $t->title;
								$row->save();	
							}
						}
					}
					
				}
				$fields = Fields::get();
			break;
			default:
				$alt = null;
				$c = null;
			break;
			
		}
		
		//eğer anasayfa geldi ise index gelmedi ise default
		if($id=="" || $id=="index") {
			$view = "index";
		} else {
			$view = "default";
		}
		
		//tüm değişkenleri bir dizi olarak aktarıyoruz gönderdiklerimiz mutlaka tanımlanmış olmalı ondan dolayı bazılarında null tanımını verdim yukarıda
		$var = [
			'q'	=> $q,
			'miktar'	=> $miktar,
			'type'	=> $type,
			'users'	=> $users,
			'seviye'	=> $seviye,
			'breadcrumb'	=> $breadcrumb,
			'search_contents'	=> $search_contents,
			'content_fields'	=> $content_fields,
			'fields'	=> $fields,
			'alt'	=> $alt,
			'id'	=> $id,
			'c'	=> $c,
			'ust'	=> $ust,
			'j'	=> $j,
			'contents'	=> $contents,
			"types" 	=> $types
		];
		//try catch hayat kurtarır. Adminde ilgili tipdeki blade lere yönlendiriir yoksa default veya indexe yönlendirir. 
		$permissions = explode(",",Auth::user()->permissions);
		$permissions2 = array();
		foreach($permissions AS $p) {
			array_push($permissions2,str_slug($p));
		}
		$permissions = $permissions2;
		
		if($type=="types") {
			$alan = $id;
		} else {
			$alan = $type;
		}
		
		if($alan=="" && $id!="") {
			
			return view('admin/'.$view, $var);
		} else {
			try {    
			//echo "$view $type $alan"; 
				if(($view=="index") && $type=="") {
				
					return view('admin/'.$view, $var);
				} else {
						
					if(in_array($alan,$permissions)) {
						
							return view("admin/$type",$var);
					
						
					} else {
						return view("admin/yetki-yok",$var);
					}	
				}
				
			} catch (\Exception $e) {
				
				return view('admin/'.$view, $var);
			}	
		}
		
       
    }
}
