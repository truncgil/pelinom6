<?php use App\Translate; ?>
@extends('admin.master')
@section("title")
	{{$c->title}}
@endsection
@section("desc")
	<div class="container">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{url('admin/new/contents')}}"><i class="fa fa-home"></i></a></li>
			{!! $breadcrumb !!}
			<li class="breadcrumb-item active" aria-current="page">{{$c->title}}</li>
		  </ol>
		</nav>
		
	</div>
@endsection
@section('content')


<div class="content">
<div class="block">
	<div class="block-header block-header-default">
		<h3 class="block-title">{{$c->title}} {{__('İçeriğini Düzenle')}}</h3>
		<div class="block-options">
			<button type="button" class="btn-block-option" onclick="$('.ana-icerik').toggleClass('hidden');">
				<i class="si si-eye"></i>
			</button>
		</div>
	</div>
	<div class="block-content block-content-full ana-icerik">
		
		<form action="{{url('admin-ajax/cover-upload')}}" class="hidden-upload" id="f{{$c->id}}" enctype="multipart/form-data" method="post">
							<input type="file" name="cover" id="c{{$c->id}}" onchange="$('#f{{$c->id}}').submit();" required />
							<input type="hidden" name="id" value="{{$c->id}}" />
							
							<input type="hidden" name="slug" value="{{$c->slug}}" />
							{{csrf_field()}}
						</form>
		<form action="{{url('admin-ajax/content-update?back')}}" method="post">
		{{csrf_field()}}
			<div class="row">
				<div class="col-md-9">
					{{__('Başlık')}}
					<input type="hidden" name="id" value="{{$c->id}}" />
					<input type="hidden" name="kid" value="{{$c->kid}}" />
					<input type="hidden" name="oldslug" value="{{$c->slug}}" />
					<input type="text" name="title" id="title" value="{{$c->title}}" class="form-control" />
					
					{{__('URL')}} <div class="btn btn-default" onclick="$.get('{{url('admin-ajax/slug?title='.$c->breadcrumb)}}'+$('#title').val(),function(d){
						$('#slug').val(d)
					})"><i class="si si-refresh"></i></div>
					<input type="text" name="slug" id="slug" value="{{$c->slug}}" class="form-control" />
					
					{{__('İçerik Tipi')}}
					<select name="type" id="{{$c->id}}" class="form-control edit" table="contents" >
						<option value="">Tip Seçiniz</option>
					@foreach(@$types AS $t)
						<option value="{{$t->title}}" @if($t->title==$c->type) selected @endif>{{$t->title}}</option>
					@endforeach
					</select>
					
					{{__('İçerik')}}
					<textarea class="" id="editor" name="html">{{$c->html}}</textarea>
					
					@include("admin.inc.fields")
				</div>
				<div class="col-md-3 text-center">
				@if($c->cover!='')
					<div class="js-gallery">
						<a href="{{url('cache/large/'.$c->cover)}}" class="img-link img-link-zoom-in img-thumb img-lightbox"  target="_blank" >
							<img src="{{url('cache/small/'.$c->cover)}}" alt="" />
						</a>
					</div>
						<hr />
						@else 
								<i class="fa fa-image" style="    display: block;
    font-size: 150px;
    color: #f3f3f3;"></i>
						@endif
						<div class="btn-group">
						<button type="button" class="btn  btn-secondary btn-sm" onclick="$('#c{{$c->id}}').trigger('click');" title="{{__('Resim Yükle')}}"><i class="fa fa-upload"></i> {{__('Kapak Resmi Yükle')}}</button>
						@if($c->cover!='')
						<a teyit="{{__('Resmi kaldırmak istediğinizden emin misiniz')}}" title="{{__('Resmi kaldır')}}" href="{{url('admin-ajax/cover-delete?id='.$c->id)}}" class="btn btn-secondary btn-sm "><i class="fa fa-times"></i></a>
						<a title="{{__('Resmi indir')}}" href="{{url('cache/download/'.$c->cover)}}" class="btn btn-secondary btn-sm"><i class="fa fa-download"></i></a>
						@endif
						</div>
						
				</div>
			</div>
			
			
			<hr />
			<div class="right-fixed">
				<a href="{{url($c->slug)}}" target="_blank" class="btn btn-danger"><i class="fa fa-globe"></i> {{__($c->title)}} {{__('İçeriğini Web\'de Gör')}}</a>
				<button class="btn btn-primary">{{__('Değişiklikleri Kaydet')}}</button>
			</div>
		</form>
		<form action="{{url('admin-ajax/files-upload')}}" id="files{{$c->id}}" class="dropzone" id="dropzone" enctype="multipart/form-data" method="post">
							<div class="fallback">
								<input name="file" type="file" multiple />
								
							  </div>
							  @if($c->files!="") 
								  @php
									$files = explode(",",$c->files);
								  @endphp
								  @foreach(@$files AS $f)
								  <div file="{{$f}}" class="dz-preview dz-file-preview dz-processing dz-error dz-complete">  
									  <div class="dz-image"><img data-dz-thumbnail="" onerror='$(this).hide();' src="{{url($f)}}" width="100%"></div>  <div class="dz-details">    
									  <div class="dz-filename"><span data-dz-name="">{{$f}}</span></div>  </div>  
									  <div class="dz-success-mark">   
									  <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">      
									  <title>Check</title>      
									  <defs></defs>      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">       
									  <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>      </g>    </svg>  </div>  
										<div class="btn-group">
											<div  class="btn btn-default delete"><i class="fa fa-times"></i></div>								  
											<a href="{{url($f)}}" target="_blank" class="btn btn-default "><i class="fa fa-download"></i></a>								  
										</div>
								  </div>
								  @endforeach
							  @endif
							  <div class="dz-message" data-dz-message><span>{{__('İçeriğin dosyalarını buraya bırakarak veya tıklayarak yükleyebilirsiniz')}}</span></div>
							  <input type="hidden" name="id" value="{{$c->id}}" />
							<input type="hidden" name="slug" value="{{$c->slug}}" />
							{{csrf_field()}}
						</form>
						<script type="text/javascript">
						$(function(){
							$(".dz-preview .delete").on("click",function(){
								var bu = $(this).parent().parent();
								bu.fadeTo(0.5);
								$.post("{{url('admin-ajax/delete-file')}}",{
									file:bu.attr("file"),
									slug : "{{$c->slug}}",
									id : "{{$c->id}}",
									_token : "{{csrf_token()}}"
								},function(d){
									bu.fadeOut();
								});
								$(".dz-message").html("")
								
							}).css("cursor","pointer");
							
						});
						</script>
						<style type="text/css">
						
						</style>
	</div>
</div>
<div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{__('Çeviriler')}}</h3>
            <div class="block-options">
                
            </div>
        </div>
		

        <div class="block-content block-content-full">
				<?php $diller = explode(",",__('Diller')); foreach($diller AS $d) { ?>
					<?php $ceviri = Translate::where("dil",$d)->where("kr",md5($c->html))->first();
					if(!$ceviri) {
						$tr = new Translate;
						$tr->icerik = $c->html;
						$tr->kr = md5($c->html);
						$tr->dil = $d;
						$tr->ceviri = $c->html;
						$tr->save();
						$ceviri = Translate::where("dil",$d)->where("kr",md5($c->html))->first();
					}
					?>
					<form action="{{url('admin-ajax/input-edit')}}" method="post">
					@csrf
						<label>{{__($d)}}</label>
						<input type="hidden" name="id" value="{{@$ceviri->id}}" />
						<input type="hidden" name="table" value="translate" />
						<input type="hidden" name="name" value="ceviri" />
						<textarea name="value" id="" cols="30" rows="10" class="ckeditor">{{@$ceviri->ceviri}}</textarea>
						<br />
						<button class="btn btn-primary">{{__('Değişiklikleri Kaydet')}}</button> <br /> 
						<hr />
						<br />
					</form>
				<?php } ?>
		</div>
</div>
<div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{__('Çoklu İçerik Ekle')}}</h3>
            <div class="block-options">
                
            </div>
        </div>
		

        <div class="block-content block-content-full">
			<form action="{{url('admin-ajax/content-multi-add?kid='.$c->slug)}}" method="post">
			@csrf
			<div class="row">
				<div class="col-md-6">
					{{__('Bu kutuya birden fazla başlık yazarak bu alana çoklu olarak içerik ekleyebilirsiniz:')}}
					<select name="contents[]" id="" class="select2 form-control" multiple>
						<option value=""></option>
					</select>
					
					
				</div>
				<div class="col-md-6">
					{{__('Tip Seçiniz')}}
					<select name="type"  class="form-control" >
						@foreach($types AS $t)
							<option value="{{$t->title}}">{{$t->title}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-12">
					<br />
					<button class="btn btn-primary">{{__('Ekle')}}</button>
				</div>
			</div>
			
			</form>
		</div>
</div>
@include("admin.inc.sub-content")
</div>


@endsection
