@extends('admin.master')



@section("title",__("Alanlar"))
@section("desc",__("Bir türe ait girilen tüm alanların yönetildiği bölüm"))
@section('content')
<div class="content">
	<div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Mevcut Alanlar</h3>
            <div class="block-options">
                <div class="block-options-item">
                </div>
            </div>
        </div>
        <div class="block-content">

	
            <table class="table table-striped table-hover table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th>{{__("Title")}}</th>
                        <th>{{__("Form Tipi")}}</th>
                        <th>{{__("İçerik Tipi")}}</th>
                        <th>{{__("Ön Tanımlı Değerler")}}</th>
                    </tr>
                </thead>
                <tbody>
				@foreach($fields AS $a)
					<tr>
                        <td>{{$a->title}}</td>
                        <td><input type="text" name="input_type" value="{{$a->input_type}}" table="fields" id="{{$a->id}}" class="form-control  edit" /></td>
                        <td>{{$a->type}}</td>
                        <td>
						<input type="text" name="values" value="{{$a->values}}" table="fields"  id="{{$a->id}}" class=" js-tags-input form-control edit" /></td>
						
                       
                       
                    </tr>
				@endforeach
                                     
                                    </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
