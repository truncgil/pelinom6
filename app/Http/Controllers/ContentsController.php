<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Contents;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR
use Artesaos\SEOTools\Facades\SEOTools;

class ContentsController extends Controller
{
	
    public function index()
    {
		$url = env("APP_URL");
		$title = __('Web Site Title');
		
		$twitter = env("twitter");
		$facebook = env("facebook");
		SEOMeta::setTitle($title,false);
		SEOMeta::setDescription(env("APP_DESCRIPTION"));
		SEOMeta::setCanonical("$url");

		OpenGraph::setDescription(env("APP_DESCRIPTION"));
		OpenGraph::setTitle($title,false);
		OpenGraph::setUrl("$url");
		OpenGraph::addProperty('type', 'articles');

		TwitterCard::setTitle($title,false);
		TwitterCard::setSite($twitter);

		JsonLd::setTitle($title,false);
		JsonLd::setDescription(env("APP_DESCRIPTION"));
		JsonLd::addImage(env("APP_LOGO"));
		SEOTools::setTitle($title,false);
		SEOTools::setDescription(env("APP_DESCRIPTION"));
		SEOTools::opengraph()->setUrl("$url");
		SEOTools::setCanonical("$url");
		SEOTools::opengraph()->addProperty('type', 'articles');
		SEOTools::twitter()->setSite($twitter);
		SEOTools::jsonLd()->addImage("$url");
		return view('index');

    }
	
	
	public function store(Request $request) {
		
		$content = new Contents;
		$content -> slug = str_slug($request->title,"-");
		$content -> title = $request->title;
		$content -> html = $request -> html;
		$content -> uid = session("uid");
		$content -> json = $request;
		$content -> cover = $cover;
		$content -> pics = $pics;
		
	}
    public function default_lang(Request $request, string $lang="tr",string $slug) {
		//App::setLocale($lang);
		return ContentsController::default($request,$slug,$lang);
	}
    public function default(Request $request, string $slug,string $lang="tr")
    {
		if($slug =="/" || $slug == "index" || $slug=="home" || $slug=="") {
			$view = "index";
			
		} else {
			$view = "default";
		}
	
		$c = Contents::where('slug', $slug)->first();
		$url = __('URL');
		$twitter = __('twitter');
		$facebook = __('facebook');
		$menu = Contents::where('kid','menu')
		->orderBy("s","ASC")
		->get();
		
		try {    
			$c->title = __($c->title);
			$c->html = __($c->html);
			SEOMeta::setTitle($c->title,false);
			SEOMeta::setDescription(substr(strip_tags($c->html),0,150));
			SEOMeta::setCanonical("$url/{$c->slug}");

			OpenGraph::setDescription(substr(strip_tags($c->html),0,150));
			OpenGraph::setTitle($c->title);
			OpenGraph::setUrl("$url/{$c->slug}");
			OpenGraph::addProperty('type', 'articles');

			TwitterCard::setTitle($c->title,false);
			TwitterCard::setSite($twitter);

			JsonLd::setTitle($c->title,false);
			JsonLd::setDescription(substr(strip_tags($c->html),0,150));
			JsonLd::addImage("$url/{$c->cover}");
			SEOTools::setTitle($c->title,false);
			SEOTools::setDescription(substr(strip_tags($c->html),0,150));
			SEOTools::opengraph()->setUrl("$url/{$c->slug}");
			SEOTools::setCanonical("$url/{$c->slug}");
			SEOTools::opengraph()->addProperty('type', 'articles');
			SEOTools::twitter()->setSite($twitter);
			SEOTools::jsonLd()->addImage("$url/{$c->cover}");
		} catch (\Exception $e) {
		}
		$language = Contents::where("type","Diller")->get();
		$var = [
					'language' => $language,
					'c' => "",
					'slug'=>$slug,
					'menu'=>$menu
				];
		try{
			return view($slug,$var);
		} catch(\Exception $e) {
			 if($c=="") {
				return abort(404);
			} else {
				$var = [
					'language' => $language,
					'c' => $c,
					'slug'=>$slug,
					'menu'=>$menu
				];
				try{
					return view($c->slug,$var);
				} catch(\Exception $e) {
					try {    
						return view(str_slug($c->type,"-"),$var);
					} catch (\Exception $e) {
						return view($view, $var);
					}	
				}
				
			}	
		}

        
        
    }
    
}
