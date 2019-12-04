<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contents extends Model
{
    //
	use SoftDeletes;
	protected $table = 'contents';
	protected $primaryKey = 'id';
	public $incrementing = true;
	public $timestamps = true;
	

	public function __construct()
	{

	}
	public function getRouteKeyName(): string
    {
        return 'slug';
    }
	public static function getTree(string $slug, array $tree = []): array
    {
        $lowestLevel = Contents::where('slug', $slug)->select("title","slug","id","kid")->first();

        if (!$lowestLevel) {
            return $tree;
        }

        $tree[] = $lowestLevel->toArray();

        if ($lowestLevel->kid !== 0) {
            $tree = Contents::getTree($lowestLevel->kid, $tree);
        }
		
        return $tree;
 
    }
	public static function type(string $type,int $take=10) {
		return Contents::where("type",$type)->take($take)->get();
	}
	public static function getBreadcrumbs(string $slug, $model="<li class='breadcrumb-item'><a href='{slug}'>{title}</a></li>"): string
    {
		$tree = Contents::getTree($slug);
        $tree = array_reverse($tree);
		$breadcrumbs = "";
		foreach($tree AS $alan => $deger) {
			$sonuc = str_replace("{slug}",$deger['slug'],$model);
			$sonuc = str_replace("{title}",$deger['title'],$sonuc);
			$breadcrumbs .= $sonuc;
		}
		return $breadcrumbs;

    }
}
