@extends('admin.master')
@section("title","İçerik Türleri")
@section("desc","Bu sayfada içerik türlerini yönetebilirsiniz")
@section('content')
<div class="content">
	<div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{__('Mevcut Tipler')}}</h3>
            <div class="block-options">
                <div class="block-options-item">
                    <a href="{{ url('admin/action/add/types') }}" class="btn btn-default"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-striped table-hover table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th>{{__("İkon")}}</th>
                        <th>{{__("İkon")}}</th>
                        <th>{{__("Başlık")}}</th>
                        <th>{{__("URL")}}</th>
                        <th>{{__("Alanlar")}} <small>{{__('Virgüllerle ayırın')}}</small></th>
                        <th class="text-center" style="width: 100px;">{{__("İşlemler")}}</th>
                    </tr>
                </thead>
                <tbody>
				@foreach($types AS $a)
					<tr>
						<td class="text-center"><i class="fa fa-{{$a->icon}} fa-2x"></i></td>
                        <td>
						
						<input type="text" name="icon" value="{{$a->icon}}" table="types" id="{{$a->id}}" class="icon form-control edit" /></td>
                        <td><input type="text" name="title" value="{{$a->title}}" table="types" id="{{$a->id}}" class="title{{$a->id}} form-control edit" /></td>
                        <td>
						<div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="btn btn-default" onclick="$.get('{{url('admin-ajax/slug?title='.$a->breadcrumb)}}'+$('.title{{$a->id}}').val(),function(d){
															$('.slug{{$a->id}}').val(d).blur();
														})"><i class="si si-refresh"></i></div>
                                                    </div>
                                                    <input type="text" name="slug" value="{{$a->slug}}" table="types" id="{{$a->id}}" class="slug{{$a->id}} form-control edit" />
                                                </div>
							
							</td>
                        <td>
							<textarea name="fields" table="types" id="{{$a->id}}" class="form-control edit" cols="30" rows="2">{{$a->fields}}</textarea>
						</td>
                       
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ url('admin/types/'. $a->slug) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-link"></i>
                                </a>
                                <a href="{{ url('admin/types/'. $a->id.'/delete') }}" type="button" teyit="{{$a->title}} tipini silmek istediğinizden emin misiniz?" title="{{$a->title}} Silinecek!" class=" btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
				@endforeach
				</tbody>
            </table>
        </div>
    </div>
</div>
@endsection
