@php
	$permissions = @explode(",",Auth::user()->permissions);
@endphp

<!DOCTYPE HTML>
<html lang="tr">

<head>	

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{!! strip_tags($__env->yieldContent('title','Pelinom6')) !!}</title>
    <meta name="description" content="Trunçgil Pelinom 6">
    <meta name="author" content="Truncgil Technology">
    <meta property="og:title" content="Trunçgil Pelinom 6">
    <meta property="og:site_name" content="https://www.truncgil.com.tr/">
    <meta property="og:description" content="Truncgil Pelinom 6">
    <meta property="og:type" content="website">
    <meta property="og:url" content>
    <meta property="og:image" content>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/favicon.png')}}">


		<!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/dropzonejs/dist/dropzone.css') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/admin/css/pelinom6.min.css') }}">
	
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <script src="{{ asset('assets/admin/js/pelinom6.core.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pelinom6.app.min.js') }}"></script>
	<link rel="stylesheet" href="{{asset('assets/admin/css/custom.css?'.rand(1111,9999))}}" />
</head>

<body> 
@guest
	@yield("content")
@else
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-glass side-trans-enabled">
       
		
		<aside id="side-overlay">
            <div class="content-header content-header-fullrow">
                <div class="content-header-section align-parent">
                    <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <div class="content-header-item">
                        <img class="img-avatar img-avatar32" src="{{asset('assets/img/user.jpg')}}" alt="">
                        <a class="align-middle link-effect text-primary-dark font-w600"
                            href="#">
							
                           {{ Auth::user()->name }}  {{ Auth::user()->surname }}
						   
						   <small>{{ Auth::user()->level }}</small>
                            <!-- Müşteri/Admin ismi -->
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-side">
				<div class="block pull-r-l">
                    <div class="block-header bg-body-light">
                        <h3 class="block-title">
                            <i class="fas fa-file"></i>
                            {{__('Profil Ayarları')}}
                        </h3>
                        <div class="block-options">
                            
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                        </div>
                    </div>
                    <div class="block-content">
						<form action="{{url('admin-ajax/profile-update')}}" method="post">
							@csrf
							{{__('Adı')}}
								<input type="text" name="name" required id="" class="form-control" value="{{Auth::user()->name}}" />
							{{__('Soyadı')}}
								<input type="text" name="surname" required id="" class="form-control" value="{{Auth::user()->surname}}" />
							{{__('E-Mail')}}
								<input type="text" name="email" required id="" class="form-control" value="{{Auth::user()->email}}" />
							{{__('Telefon')}}
								<input type="text" name="phone" required id="" class="form-control" value="{{Auth::user()->phone}}" />
							{{__('Şifre')}} <small>{{__('(Değiştirmek istemiyorsanız boş bırakın)')}}</small>
								<input type="text" name="password" id="" class="form-control" value="" />
							<br />
							<button class="btn btn-primary">{{__('Bilgilerimi Güncelle')}}</button>

						</form>
                    </div>
                </div>
               
                
                
                
            </div>
        </aside>

        
        <nav id="sidebar">
            <div class="sidebar-content">
                <div class="content-header content-header-fullrow px-15">
                    <div class="content-header-section sidebar-mini-visible-b">
                        <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                            <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                        </span>
                    </div>
                    <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                        <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r"
                            data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>
                        <div class="content-header-item">
                            <a class="link-effect font-w700" href="#">
                                <img id="mainLogo" width="100%" style="    max-width: 300px;" data-theme="light" src="{{asset('assets/img/logo.svg')}}" class="h-full-w-auto" alt="Trunçgil Teknoloji">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="content-side">
                   
                    <div class="sidebar-mini-hidden-b text-center">
                        
                        <ul class="list-inline mt-10">
                            <li class="list-inline-item">
                                <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase"
                                    href="#"> {{ Auth::user()->name }}  {{ Auth::user()->surname }}</a>
                                    <!-- İsmin ilk harfi ve Soyisim -->
                            </li>
                           
                        </ul>
                    </div>
                </div>
               @include("admin.inc.menu");
            </div>
        </nav>

        
        <header id="page-header">
            <div class="content-header">
                <div class="content-header-section">
                    <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                        data-action="header_search_on">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <div class="content-header-section">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
                            <!-- Kullanıcı adı -->
                            <i class="fa fa-angle-down ml-5"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right min-width-200"
                            aria-labelledby="page-header-user-dropdown">
                            <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">{{ Auth::user()->name }} {{ Auth::user()->surname }}</h5>
                           
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{url('logout')}}">
                                <i class="si si-logout mr-5"></i> {{__('Çıkış Yap')}}
                            </a>
                            <!-- Çıkış Yap -->
                        </div>
                    </div>

					<a href="{{ url('./') }}" target="_blank" class="btn btn-circle"><i class="fa fa-globe"></i> {{__('Siteye Dön')}}</a>
                   <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                        data-action="side_overlay_toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
            <div id="page-header-search" class="overlay-header">
                <div class="content-header content-header-fullrow">
                    <form action="{{url('admin/search')}}" method="get">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-secondary" data-toggle="layout"
                                    data-action="header_search_off">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control" value="{{@$q}}" placeholder="Ara..."
                                id="q" required  name="q">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="page-header-loader" class="overlay-header bg-primary">
                <div class="content-header content-header-fullrow text-center">
                    <div class="content-header-item">
                        <i class="fa fa-sun-o fa-spin text-white"></i>
                    </div>
                </div>
            </div>
        </header>
		
		<div class="main-container">
			<div class="">
				
				@if (View::hasSection('title'))
				<div class="bg-image" >
					<div class="bg-white-op-90">
						<div class="content content-full content-top">
							<h1 class="text-center">@yield("title")<br /> </h1>
							<div class="text-center">@yield("desc")</div>
						</div>
					</div>
				</div>
				@endif
				@yield("content")
			</div>
		</div>
		<div class="clearfix"></div>
        <footer id="page-footer" class="opacity-0 t-center">
            <div class="content py-20 font-size-xs clearfix m-0-auto">
                <div class="m-0-auto">
                    Created by <a class="truncgil" href="https://www.truncgil.com.tr/">Truncgil Technology</a>. All rights reserved.
                </div>
                
            </div>
        </footer>
    </div>
	@endguest
    
    <script src="{{ asset('assets/admin/js/plugins/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/slick/slick.min.js') }}"></script>
	<!-- include summernote css/js -->
	<script src="{{ asset('assets/admin/js/plugins/summernote/summernote-bs4.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/summernote/summernote-bs4.css') }}">

	<script src="{{ asset('assets/admin/js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

	<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/magnific-popup/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/js/plugins/slick/slick.css') }}">
	
	<!-- Page JS Plugins -->
        <script src="{{ asset('assets/admin/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/masked-inputs/jquery.maskedinput.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/dropzonejs/dropzone.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js') }}"></script>

        <script src="{{ asset('assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
		<!--
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
-->
<script src="{{asset('assets/admin/js/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">

CKEDITOR.replace( 'editor', {
    language: '{{App::getLocale()}}',
	removePlugins: 'image',
	extraPlugins: 'base64image'
  
});
$(".ckeditor").each(function(){
	var id = "editor"+Math.floor(Math.random() *1000);
	$(this).attr("id",id);
	
});

$(".ckeditor").each(function(){
	CKEDITOR.replace( $(this).attr("id"), {
		language: '{{App::getLocale()}}',
		extraPlugins: 'base64image'
	  
	});
});


</script>
<script>jQuery(function(){ Codebase.helpers('magnific-popup','notify','datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs'); });</script>

<script type="text/javascript">
$(document).ready(function() {

	

	
	//$('.table').DataTable();
	@if (\Session::has('mesaj'))
	Codebase.helpers('notify', {
		align: 'center',             // 'right', 'left', 'center'
		from: 'bottom',                // 'top', 'bottom'
		type: 'info',               // 'info', 'success', 'warning', 'danger'
		icon: 'fa fa-info mr-5',    // Icon class
		message: '{!! __(\Session::get('mesaj')) !!}'
	});
	@endif
	@if (\Session::has('hata'))
	Codebase.helpers('notify', {
		align: 'center',             // 'right', 'left', 'center'
		from: 'bottom',                // 'top', 'bottom'
		type: 'danger',               // 'info', 'success', 'warning', 'danger'
		icon: 'fa fa-info mr-5',    // Icon class
		message: "{!! __(\Session::get('hata')) !!}"
	});
	@endif
	
  $('#summernote,.editor').summernote({
	  height: 200,
	  width:800
  });
  $("[teyit]").on("click",function(){
	 $("#modal-popin .block-title").html($(this).attr("title")); 
	 $("#modal-popin .block-content").html($(this).attr("teyit")); 
	 $("#modal-popin .tamam").prop("href",$(this).attr("href")); 
	 $("#modal-popin").modal(); 
	 return false;
	  
  });
  $(".edit").on("blur",function(){
	  var bu = $(this);
	  bu.prop("disabled",true);
	 $.post("{{ url('admin-ajax/input-edit') }}",{
		 table 	: bu.attr("table"),
		 value 	: bu.val(),
		 _token : "{{ csrf_token() }}",
		 id 	: bu.attr("id"),
		 name	: bu.attr("name")
		 
	 },function(){
		 bu.prop("disabled",false);
		 
	 }); 
	  
  });
  $(".tags").tagsInput();
  $(".select2").select2({
	  tags: true,
	  tokenSeparators: [',',' ']
  });
  $("form").on("submit",function(event){
//	 Codebase.layout('header_loader_on')
	 $(this).find(":submit").html("{{__('İşlem yapılıyor...')}}").prop("disabled",true); 
	  
  });
  $(".ajax-form").on("submit", "form", function(event)
	{
		alert("ok");
		event.preventDefault();

		var url=$(this).attr("action");
		$.ajax({
			url: url,
			type: $(this).attr("method"),
			dataType: "JSON",
			data: new FormData(this),
			processData: false,
			contentType: false,
			success: function (data, status)
			{

			},
			error: function (xhr, desc, err)
			{


			}
		});        

	});
	$(".btn")
		.addClass("btn-noborder")
		.addClass("btn-rounded");
	$(".input-group-append .btn, .input-group-prepend .btn")
		.removeClass("btn-noborder")
		.removeClass("btn-rounded");
		
	function loadDoc(url, cFunction) {
	  var xhttp;
	  xhttp=new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			
			$("body").html(xhttp.responseText);
			window.history.pushState('url',Math.random() , url);
			cFunction(this);
		}
	 };
	  xhttp.open("GET", url, true);
	  xhttp.send();
	}
	$("a").on("click",function(){
		/* 
		loadDoc($(this).attr("href"),sonuc);
		return false;
		*/
	});
	function sonuc() {
		console.log("sonuc");
	}
});
</script>
<style type="text/css">
		.hidden {
			display:none !important;
		}
		.visible {
			display:block !important;
		}
		.hidden-upload {
			display:none;
			
		}
		.dz-filename {
							white-space:normal !important;
							    height: 74px;
							
						}
		</style>
<div class="modal fade" id="modal-popin" tabindex="-1" role="dialog" aria-labelledby="modal-popin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title"></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                </div>
            </div>
            <div class="modal-footer">
                <button  class="btn btn-alt-secondary" data-dismiss="modal">{{__('Hayır')}}</button>
                <a href="#" class="btn btn-alt-success tamam" >
                    <i class="fa fa-check"></i> {{__('Evet')}}
                </a>
            </div>
        </div>
    </div>
</div>

</body>

</html>
<style type="text/css">
.cke_button__easyimageupload {
	display:none !important;
}
</style>