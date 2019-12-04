<?php use App\Contents; ?>
@extends('layouts.app')
@section("title",__('Title'))
@section('content')
<!-- Slider -->
	<section class="owl-carousel owl-theme h-auto" id="mainSlider2">
		<?php $k = 0; $slider = Contents::where("type","Slider")->where("y","1")->get(); foreach($slider AS $s) {
		$j  = json_decode($s->json,true);
		?>
		<div class="item">
			<a href="{{__($s->slug)}}" class="w-full-h-auto">
				<img class="w-full-h-auto" src="{{url('storage/app/files/'.$s->cover)}}" alt="{{__(@$j['Title_1'])}}">
			</a>
			<div class="container-fluid">
				<div class="row">
					<div class="col-10 offset-1 col-md-10 offset-md-1 slider-texts">
						<a href="{{__($s->slug)}}" class="w-full-h-auto">
							<h3 class="first-line color-white white-text-shadow t-left fs-3rem w-full animated slideInRight">
								{{__(@$j['Title_1'])}}
							</h3>
							<h3 class="second-line color-white white-text-shadow t-left fs-2rem w-full animated slideInRight delay-1s">
								{{__(@$j['Title_2'])}}
							</h3>
							<h3 class="third-line color-white white-text-shadow t-left fs-1rem w-full animated slideInRight delay-1s">
								{{__(@$j['Title_3'])}}
							</h3>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php $k++; } ?>
	</section>



	<!-- Services -->
	<section class="default-section large">
		<div class="container">
			<div class="row">
				<h1 class="t-center fs-5rem w-full">{{__('Services')}}</h1>
				<p class="tr-fancy-subtitle w-full t-center">
					<span>{{__('Our Services')}}</span>
				</p>
				<?php
				$services = Contents::where("kid","services")->take(4)->get();
				foreach($services AS $s)
				{
					$j = json_decode($s['json'],true);
				?>
				<div class="col-12 col-sm-6 col-md-3 mt-10-xs-else-md">
					<div class="tr-card">

						<img class="w-full-h-auto card-img" src="{{url('storage/app/files/'.$s->cover)}}" alt="TR-CARD">

						<h3 class="w-full-h-auto mt-10 t-center">
							{{__($s->title)}}
						</h3>
						<p class="w-full-h-auto t-justify card-p">
							{{__(@$j['Description'])}}
						</p>
						<a href="{{url($s->slug)}}" class="btn btn-info border-radius-5 color-white m-0-auto bg-color-2">{{__('Explore')}}</a>
					</div>
				</div>
				<?php
				}
				?>
			</div>
				<a href="{{url('services')}}" class="btn btn-info border-radius-5 color-white bg-color-2 mt-50 m-0-auto plr-30">{{__('Explore All')}}</a>
		</div>
	</section>
	<!-- Services -->

	<section class="parallax-section h-70vh" style="background-image: url(storage/app/files/2019/10/sliders-consulting-011658.jpeg);"></section>

	<!-- Descriptions -->
	<section class="default-section large bg-e">
		<div class="container">
			<div class="row">
				<h1 class="t-center fs-5rem w-full color-1-site">SHS</h1>
				<p class="tr-fancy-subtitle w-full t-center">
					<span class="bg-e-i color-2">Training</span>
				</p>
				<div class="col-12 col-md-6">
					<ul class="tick-icon w-full">
						<li>
							<h3>{{__('Training Title 1')}}</h3>
							<p class="t-justify">
								{{__('Training 1 Description')}}
							</p>
						</li>
						<li>
							<h3>{{__('Training Title 2')}}</h3>
							<p class="t-justify">
								{{__('Training 2 Description')}}
							</p>
						</li>
						<li>
							<h3>{{__('Training Title 3')}}</h3>
							<p class="t-justify">
								{{__('Training 3 Description')}}
							</p>
						</li>
						<li>
							<h3>{{__('Training Title 4')}}</h3>
							<p class="t-justify">
								{{__('Training 4 Description')}}
							</p>
						</li>
						<li>
							<h3>{{__('Training Title 5')}}</h3>
							<p class="t-justify">
								{{__('Training 5 Description')}}
							</p>
						</li>
					</ul>
				</div>
				<div class="col-12 col-md-6 mt-10-xs-else-md">
					<p class="w-full t-justify">
						{!! __('Training <br /> Right Description') !!}
					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- /Desctiptions -->

	<!-- Parallax -->
	<section class="parallax-section-with-height" style="background-image: url(assets/images/parallax-section.jpg)">
		<h1 class="parallax-section-title color-white white-text-shadow w-full t-center pl-0">
			{{__('You are precious')}}
		</h1>
	</section>
	<!-- /Parallax -->

	<!-- Schedule -->
	<section class="default-section large">
		<div class="container">
			<div class="row">

				<h1 class="t-center fs-5rem w-full color-1-site">{{__('Schedule')}}</h1>
				<p class="tr-fancy-subtitle w-full t-center mb-50">
					<span class="bg-f color-3">{{__('Plan')}}</span>
				</p>
				<div class="col-12 col-md-4">
					<div class="row">
						<div class="col-12 calendar cal-light">
							<div class="calendar_header">
								<h1 class="header_title">SHS Training</h1>
								<p class="header_copy"> Calendar Plan</p>
							</div>
							<?php $son = Contents::where("kid","courses")
							->orderBy("json->Course_Date","ASC")
							->first();
							$js = j($son->json);
							?>
							<div class="calendar_plan">
								<div class="cl_plan">
									<div class="cl_title">{{__('Soon')}}</div>
									<div class="cl_copy">{{$son->title}} <br /><small>{{$js['Course_Date']}}</small></div>
									<a href="{{url($son->slug)}}" class="cl_add">
										<i class="fas fa-plus"></i>
									</a>
								</div>
							</div>
							<div class="calendar_events">
								<p class="ce_title">{{__('Upcoming Events')}}</p>
								<?php $diger = Contents::where("kid","courses")
								->where("y",1)
								->orderBy("json->Course_Date","ASC")
								->take(5)
								->get();
								foreach($diger AS $d) {
										$j = j($d->json);
										?>
								<div class="event_item">
									<div class="ei_Dot dot_active"></div>
									<div class="ei_Title">{{$j['Course_Date']}}  {{ date('D', strtotime($j['Course_Date'])) }}</div>
									<div class="ei_Copy">{{$d->title}}</div>
								</div>
									<?php } ?>

							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-8 mt-10-xs-else-md">
					<div class="row">
						<div class="col-12 offset-md-2 col-md-10">
							<h3 class="section-title color-333">
								{{$js['Course_Date']}}  {{ date('D', strtotime($js['Course_Date'])) }}
							</h3>
							<h4 class="section-title color-a">
								{{$son->title}}

							</h4>
							<p class="w-full t-justify">
								{!! $son->html !!}
							</p>
						</div>
					</div>

				</div>


			</div>
		</div>
	</section>
	<!-- /Schedule -->

	<!-- Testimonials -->
	<section class="default-section bg-e">
		<div class="container">
			<div class="row">
				<h1 class="t-center fs-5rem w-full color-1-site">{{__('Our Customers')}}</h1>
				<p class="tr-fancy-subtitle w-full t-center mb-50">
					<span class="bg-e-i color-3">{{__('SHS')}}</span>
				</p>
			</div>
			<div class="row owl-carousel owl-theme" id="testimonialsCarousel">
<?php $testimonials = Contents::where("kid","Testimonials")->get(); foreach($testimonials AS $t) {
$j = j($t->json);
?>
				<div class="item">
					<div class="row" style="padding: 20px">
						<button style="border: none;">
							<i class="fas fa-quote-left testimonial_fa" aria-hidden="true"></i>
						</button>
						<p class="testimonial_para mt-20">
							{{strip_tags($t->html)}}
						</p>
							<br>
						<div class="col-12">
							<div class="row mt-20">
								<div class="col-4 col-md-1">
									<img src="{{url('cache/small/'.$t->cover)}}" alt="{{$j['Author_Name']}}" class="img-responsive" style="width: 80px">
								</div>
								<div class="col-8 col-md-11">
									<h4><strong>{{$j['Author_Name']}}</strong></h4>
									<p class="testimonial_subtitle">
										<span>{{$j['Job_Title']}}</span>
										<br>
										<span>{{$j['Company_Name']}}</span>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
<?php } ?>


			</div>
		</div>
	</section>
	<!-- /Testimonials -->

	<!-- Quizes -->
	<section class="default-section large">
		<div class="container">
			<div class="row">
				<h1 class="t-center fs-5rem w-full color-1-site">Quizes</h1>
				<p class="tr-fancy-subtitle w-full t-center mb-50">
					<span class="bg-f color-3">Training</span>
				</p>
				<?php
				$quiz = Contents::where("type","Quiz")->get();
				foreach($quiz AS $q){
				?>
				<div class="col-12 col-sm-6 col-md-3 mt-10 mt-md-20">
					<div class="tr-card">
						<h4 class="w-full-h-auto mt-10 t-center">
							{{$q->title}}
						</h4>
						<p class="w-full-h-auto t-justify fs-0p8rem">
							{{strip_tags($q->html)}}
						</p>
						<a href="{{url($q->slug)}}" class="btn btn-info border-radius-5 color-white m-0-auto bg-color-2">Go to Quiz</a>
					</div>
				</div>
				<?php
				}
				?>
			</div>
		</div>
	</section>
	<!-- Quizes -->

	<section class="default-section large">
		<div class="container">
			<div class="row">
				<h1 class="t-center fs-5rem w-full color-1-site">{{__('Blogs')}}</h1>
				<p class="tr-fancy-subtitle w-full t-center mb-50">
					<span class="bg-f color-3">{{__('Latest Blog Posts')}}</span>
				</p>
				<?php 
				$con = new Contents;
				$blog = $con->where('type','Blog')->take(6)->get();
				foreach($blog AS $b){
				?>
				<div class="col-12 col-sm-6 col-md-4 mt-10 mt-10-else-md">
					<a href="#" class="w-full t-center card-link">
					<div class="row p-10">
						<div class="col-12 bg-cover rect-box" style="background-image: url(cache/large/2019/09/menu-blog-buraya-blog-basligini-yazalim-021247.jpg);"></div>
					</div>
					<p class="w-full t-center">{{$b->title}}</p>
					<p class="w-full card-short-desc t-justify">
						Lorem ipsum dolor sit amet epictetus, amias. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. 
						
					</p>
					<a href="#" class="w-full t-center">>>More</a>
					</a>
				</div>
				<?php
				}
				?>
			</div>
			<div class="row">
				<a href="#" class="btn btn-info border-radius-5 color-white m-0-auto bg-color-2 mt-40 plr-30">
					All Blogs
				</a>
			</div>
		</div>
	</section>


@endsection
