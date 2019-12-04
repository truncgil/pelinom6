<?php use App\Contents; ?>
@if(isset($c))
	
@extends('layouts.app')
@section("title",__($c->title))
@section('content')
<?php $slug = str_slug($c->type); ?>
<?php 

if($c->cover == "") {
	$pic = url('assets/images/banner-bg.jpg');
} else {
	$pic = url('cache/large/'.$c->cover);
} 
$bc = str_replace("Menü / ","",$c->breadcrumb);
$bc = explode(" / ",$bc);
$ust = Contents::where("slug",$c->kid)->first();
$j = j($c->json);

?>
@if(View::exists("types.$slug"))
	@include("types.$slug")
@elseif(View::exists("pages.".$c->slug))
	@include("pages.".$c->slug)
@else
	<?php 
$class="";
if($c->kid=="services") {
	$class = "";
	$pic = "assets/services.jpg";
}
?>
	<section class="default-section parallax-section  pos-relative banner <?php echo $class ?> " style="background-image: url({{$pic}});">
		<span class="pos-absolute" style="bottom: 10px; right: 10px; color:{{@$j['Photo_Title_Color']}}; text-shadow: 1px 1px #444;">{{@$j['Photo_Title']}}</span>
	
	</section>
	<section class="default-section medium">
		<div class="container">
			<div class="row">
					
				<h1 class="col-12 section-title w-full t-left t-bold t-oswald" style="font-size: 3rem; font-weight: 800;">
					{{__($c->title)}}
				</h1>
				
				@if($c->type=="Blog")
					<p class="col-12" style="font-size: .8rem; color: #555;"><i class="far fa-calendar-alt"></i> 
					Posted on <span class="t-italic">{{$j['Blog_Date']}}</span>
				@endif
				
				</p>
				<div class="col-12 t-justify t-italic short-intro">
					{{@$j['Short_Intro']}}
				</div>
				<div class="col-12 t-justify ul-fancy-chevron icerik">
					{!! __($c->html) !!}
					@include("inc.files")
				</div>
				

			</div>
			@if(getisset("name"))
				<?php 
			/*
			print_r($_GET);exit();
				Mail::send("mail",["mesaj"=>get("mesaj")], function ($message){
						$message->subject ('Contact Form');
						$message->from (urldecode(get("mail")), get("name"));
						$message->to(__('Admin Mail Address'), __('Başlık'));
					});
					
					*/
					 ekle([
						"title" => get("name") . " " . get("mail"),
						"slug" => rand(11111,99999),
						"type" => "Contact Form",
						"html" => get("message"),
						"json" => json_encode_tr($_POST)
					]); 
			?>
				<div class="alert alert-success">{{__('Your message has been sent. You will be contacted as soon as possible.')}}</div>
			@endif
			@if(strpos($c->breadcrumb,"Academy")!==false)
				<div class="card">
					<div class="card-body">
						<form action="" method="get">
							{{__('Name:')}}
							<input type="text" name="name" id="" class="form-control" />
							{{__('Mail Address:')}}
							<input type="email" name="mail" id="" class="form-control" />
							{{__('Message:')}}
							<textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
							<br /><button class="btn btn-info">Send</button>
						</form>
					</div>
				</div>
			@endif
			
		</div>
	</section>

@endif 
@endsection
@else 
	
@endif