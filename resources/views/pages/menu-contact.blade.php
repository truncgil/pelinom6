<section class="default-section parallax-section banner pos-relative" style="background-image: url({{$pic}});">
		<span class="pos-absolute" style="bottom: 10px; right: 10px; color:{{@$j['Photo_Title_Color']}}; text-shadow: 1px 1px #444;">{{@$j['Photo_Title']}}</span>
		
	</section>
	<section class="default-section medium">
		<div class="container">
			<div class="row">
				@if(postisset("email"))
					<?php 
				
					$new = ekle([
						"title" => post("name") . " " . post("email"),
						"slug" => rand(11111,99999),
						"type" => "Contact Form",
						"html" => post("message"),
						"json" => json_encode_tr($_POST)
					]); 
					
					?>
					<div class="col-12">
					<div class="alert alert-success">{{__('Thanks for your message.')}}</div>
					</div>
				@endif
				<div class="col-12">
					<h1 class="col-12 section-title w-full t-left t-bold t-oswald" style="font-size: 3rem; font-weight: 800;">
					{{__($c->title)}}
				</h1>
				</div>
				<div class="col-12 col-md-6">
					<form action="" method="post" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="slug" value="{{$c->slug}}" class="form-control" required id="" />
						{{__('First Name')}}:
						<input type="text" name="firstname" class="form-control" required id="" />
						{{__('Last Name')}}:
						<input type="text" name="lastname" class="form-control" required id="" />
						{{__('Firm')}}:
						<input type="text" name="firm" class="form-control" required id="" />
						{{__('Phone')}}:
						<input type="text" name="phone" class="form-control" required id="" />
						{{__('E-Mail')}}:
						<input type="email" name="email" class="form-control" required id="" />
						{{__('Message')}} : 
						<textarea name="message" id="" cols="30" rows="10" required class="form-control"></textarea>
						<br />
						<button class="btn btn-primary">{{_('Send')}}</button>
					</form>
				</div>
				<div class="col-12 col-md-6 t-justify ul-fancy-chevron">
					{!! __($c->html) !!}
					
				</div>
				
			</div>
		</div>
	</section>