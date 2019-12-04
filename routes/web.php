<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
loginhtdedwqa
*/
Auth::routes();

oturumAc();
if(oturumisset("locale")) {
	App::setLocale(oturum("locale"));
}
Route::get("/elfinder",'ElfinderController@showPopup');
Route::get('/clear-cache', function() {
	Artisan::call("vendor:publish --provider='Elfinder\ElfinderServiceProvider' --tag=views");
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('vendor:publish');
    return "Cache is cleared";
});
//Route::get("/storage/app/","files")

Route::get('/artisan-optimize', function() {
    Artisan::call('optimize');
    return "optimized";
});

Route::get('/',"ContentsController@index");
Route::get('/logout',"AdminController@logout");
Route::get('/home',"AdminController@default");
Route::get('/ajax/{var?}',"AjaxController@index");
Route::match(['get', 'post'],'/admin-ajax/{var?}',"AdminAjaxController@index");

$hash="admin";
Route::get('/'.$hash,"AdminController@default");
Route::get("/$hash/contents","AdminController@default");
Route::get("/$hash/{id}","AdminController@default");
Route::get("/$hash/new/{type}","AdminController@new");
Route::match(['get', 'post'],'/admin/action/{action}/{type}',"AdminController@action2");
Route::get("/$hash/{type}/{id}","AdminController@default");
Route::match(['get', 'post'],"/$hash/{type}/{id}/{action}","AdminController@action");


Route::get('/l-{lang?}/',"ContentsController@default_lang");
Route::get('/l-{lang?}/{slug?}',"ContentsController@default_lang");
Route::get('/l-{lang?}/',"ContentsController@index");

Route::match(['get', 'post'],'/{slug?}',"ContentsController@default");




