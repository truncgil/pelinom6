
<section class="default-section parallax-section banner pos-relative" style="background-image: url({{$pic}});">
		<span class="pos-absolute" style="bottom: 10px; right: 10px; color:{{@$j['Photo_Title_Color']}}; text-shadow: 1px 1px #444;">{{@$j['Photo_Title']}}</span>
		@if(isset($ust))
		<div class="text-center">
				
				<a class="bre-first" href="{{$ust->slug}}">{{$ust->title}}</a> /
			{{__($c->title)}}
		</div>
		@endif
	</section>
	<div class="modal" id="jobmodal">
	  <div class="modal-dialog">
		<div class="modal-content">

		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title">{{_('Make an application')}}</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>

		  <!-- Modal body -->
		  <div class="modal-body">
	
			<form action="" method="post" enctype="multipart/form-data">
				@csrf
				{{__('Name')}}:
				<input type="hidden" name="slug" value="{{$c->slug}}" class="form-control" required id="" />
				<input type="text" name="name" class="form-control" required id="" />
				{{__('E-Mail')}}:
				<input type="email" name="email" class="form-control" required id="" />
				{{__('Phone Number')}}:
				<input type="text" name="phone" class="form-control" required id="" />
				{{__('CV')}}:
				<input type="file" name="file" class="form-control" required id="" />
				<br />
				<br />
				<button class="btn btn-primary">{{_('Send')}}</button>
			</form>
		  </div>

		  <!-- Modal footer -->
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		  </div>

		</div>
	  </div>
	</div>	
	<section class="default-section medium">
		<div class="container">
			<div class="row">
				@if(postisset("email"))
					<?php 
				$html = "
					Name : {$_POST['name']} <br />
					E-Mail: {$_POST['email']} <br />
					Phone Number: {$_POST['email']} <br />
					Job Name: {$_POST['slug']} <br />
					
					
				";
					$new = ekle([
						"title" => post("name") . " " . post("email"),
						"html" => $html,
						"slug" => rand(11111,99999),
						"type" => "Application Form",
						"files" => upload("file","application-form"),
						"json" => json_encode_tr($_POST)
					]); 
					
					?>
					<div class="col-12">
					<div class="alert alert-success">{{__('We will contact you as soon as possible.')}}</div>
					</div>
				@endif
				<div class="col-12">
					<h1 class=" section-title w-full t-left t-bold ">
							<div class="float-right">
								<button onclick="$('#jobmodal').modal();" class="btn btn-primary">{{__('Apply Now')}}</button>
							</div>
						
						{{__($c->title)}}
						
					</h1>
				</div>
				<div class="col-12 t-justify ul-fancy-chevron">
					{!! __($c->html) !!}
					@include("inc.files")
				</div>
			</div>
		</div>
	</section>