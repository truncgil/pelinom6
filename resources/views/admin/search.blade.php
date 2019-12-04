@extends('admin.master')
@section("title")
	{{$q}} {{__('Arama Sonuçları')}}
@endsection
@section("desc")
<div class="container">
	<form action="{{url("admin/search")}}" method="get">
		<div class="form-group row">
			<div class="col-lg-12">
				<div class="input-group">
					<div class="input-group-prepend">
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-search"></i> Ara
						</button>
					</div>
					<input type="text" required class="form-control" value="{{$q}}" id="" name="q" placeholder="Ara...">
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@section('content')
<div class="content">
<div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{$q}} {{__('Arama Sonuçları')}}</h3>
            <div class="block-options">
                <div class="block-options-item">
                </div>
            </div>
        </div>
		

        <div class="block-content">
			<div class="js-gallery ">
			@if($search_contents->isEmpty()) 
				<div class="alert alert-info">Herhangi bir şey bulunamadı</div>
			@else
			<div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">{{__("Resim")}}</th>
                        <th>{{__("Başlık")}}</th>
                        <th>{{__("URL")}}</th>
                        <th>{{__("Kategorisi")}}</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">{{__("Tip")}}</th>
						<th>{{__("Durum")}}</th>
						<th>{{__("Sıra")}}</th>
                        <th class="text-center" style="width: 100px;">{{__("İşlemler")}}</th>
                    </tr>
                </thead>
                <tbody>
				
				@foreach($search_contents AS $a)
					<tr class="">
                        <th class="text-center cover" scope="row">
						@if($a->cover!='')
						<a href="{{url('cache/large/'.$a->cover)}}" class="img-link img-link-zoom-in img-thumb img-lightbox"  target="_blank" >
							<img src="{{url('cache/small/'.$a->cover)}}" alt="" />
						</a>
						<hr />
						@endif
						<div class="btn-group">
						<button type="button" class="btn  btn-secondary btn-sm" onclick="$('#c{{$a->id}}').trigger('click');" title="{{__('Resim Yükle')}}"><i class="fa fa-upload"></i></button>
						@if($a->cover!='')
						<a teyit="{{__('Resmi kaldırmak istediğinizden emin misiniz')}}" title="Resmi kaldır" href="{{url('admin-ajax/cover-delete?id='.$a->id)}}" class="btn btn-secondary btn-sm "><i class="fa fa-times"></i></a>
						<a title="{{__('Resmi indir')}}" href="{{url('cache/download/'.$a->cover)}}" class="btn btn-secondary btn-sm"><i class="fa fa-download"></i></a>
						@endif
						</div>
						<form action="{{url('admin-ajax/cover-upload')}}" id="f{{$a->id}}"  class="hidden-upload" enctype="multipart/form-data" method="post">
							<input type="file" name="cover" id="c{{$a->id}}" onchange="$('#f{{$a->id}}').submit();" required />
							<input type="hidden" name="id" value="{{$a->id}}" />
							<input type="hidden" name="slug" value="{{$a->slug}}" />
							{{csrf_field()}}
						</form>
						</th>
                        <td class="text-center">
							<input type="text" name="title" value="{{$a->title}}" table="contents" id="{{$a->id}}" class="title{{$a->id}} form-control edit" />
							<small>{{$a->breadcrumb}}</small>
						</td>
						<td>
						<div class="input-group">
							<div class="input-group-prepend">
									<div class="btn btn-default" onclick="$.get('{{url('admin-ajax/slug?title=')}}'+$('.title{{$a->id}}').val(),function(d){
										$('.slug{{$a->id}}').val(d).blur(); location.reload();
									})"><i class="si si-refresh"></i></div>
								</div>
								<input type="text" name="slug" value="{{$a->slug}}" table="contents" id="{{$a->id}}" class="slug{{$a->id}} form-control edit" />
							</div>
							
						</td>
						<td><input type="text" name="kid" value="{{$a->kid}}" table="contents" id="{{$a->id}}" class="form-control edit" /></td>
                        <td class="d-none d-sm-table-cell">
                          
							<select name="type" id="{{$a->id}}" class="select2 form-control edit" table="contents" >
							@foreach($types AS $t)
								<option value="{{$t->title}}" @if($t->title==$a->type) selected @endif>{{$t->title}}</option>
							@endforeach
							</select>
                        </td>
						<td>
							<select name="y" id="{{$a->id}}" class="select2 form-control edit" table="contents" >
								<option value="0" @if($a->y==0) selected @endif>{{__("Yayında Değil")}}</option>
								<option value="1" @if($a->y==1) selected @endif>{{__("Yayında")}}</option>
							</select>
						</td>
 						<td><input type="number" name="s" value="{{$a->s}}" table="contents" id="{{$a->id}}" class="form-control edit" /></td>
                       <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ url('admin/contents/'. $a->slug) }}" class="btn btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ url('admin/contents/'. $a->slug .'/delete') }}" teyit="{{$a->title}} içeriğini silmek istediğinizden emin misiniz?" title="{{$a->title}} Silinecek!" class=" btn  btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
				@endforeach
				
                                     
                                    </tbody>
            </table>
			</div>
			@endif
			</div>
        </div>
		
    </div>
</div>
@endsection
