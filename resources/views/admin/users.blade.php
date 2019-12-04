@extends('admin.master')
@section("title","Kullanıcılar")
@section("desc","Sistemde yer alan kullanıcıları bu bölümden yönetebilirsiniz")
@section('content')
@php
	use Illuminate\Support\Facades\Request;
	use Illuminate\Support\Facades\Input;
	use App\Contents;
	use App\Types;
	use App\Fields;
	use App\User;
	try{
		$seviye = Contents::where("slug","user-level")->first();
		$seviye = strip_tags($seviye->html);
		$seviye = explode(",",$seviye);
	} catch (Exception $e) {
		
	}
	$request = null;
	if(Input::has("q")) {
		  $request = Request::all();
		  $q = $request['q'];
			
		  $searchFields = ['name','surname','email','phone','permissions'];
		  $users = User::where(function($query) use($request, $searchFields){
			$searchWildcard = '%' . $request['q'] . '%';
			foreach($searchFields as $field){
			  $query->orWhere($field, 'LIKE', $searchWildcard);
			}
		  })
		  ->simplePaginate(10);

	} else {
		$users = User::orderBy("id","DESC")->simplePaginate(10);
	}
	
	$types = Types::all();
	
@endphp
<div class="content">
<div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">
			
				<form action="" method="get">
					<div class="row">
						<div class="col-md-6">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-secondary">
										<i class="fa fa-search"></i>
									</button>
								</div>
								<input type="text" class="form-control"  name="q" value="{{$request['q']}}" placeholder="Kullanıcı Adı">
							</div>
						</div>
					</div>
				</form>
			
			</h3>
            <div class="block-options">
                <div class="block-options-item">
                    <a href="{{ url('admin-ajax/user-add') }}" class="btn btn-default"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
		

        <div class="block-content">
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped">
					<tr>
						<td>Adı</td>
						<td>Soyadı</td>
						<td>Seviye</td>
						<td>E-Mail</td>
						<td>Telefon</td>
						<td>Yetkiler</td>
						<td>Şifre</td>
						<td>Kurtarma Şifresi</td>
						<td>İşlem</td>
					</tr>
					@foreach($users AS $u)
						@php
							$permissions = explode(",",$u->permissions);
						@endphp
					<tr>
						<td><input type="text" name="name" value="{{$u->name}}" table="users" id="{{$u->id}}" class="name{{$u->id}} form-control edit" /></td>
						<td><input type="text" name="surname" value="{{$u->surname}}" table="users" id="{{$u->id}}" class="surname{{$u->id}} form-control edit" /></td>
						<td>
							<select name="level" id="{{$u->id}}" table="users" class="form-control edit">
							@if($seviye!=null)
								@foreach($seviye AS $l)
									<option value="{{$l}}" @if($u->level==$l) selected @endif>{{$l}}</option>
								@endforeach
							@endif
							</select>
						</td>
						<td><input type="text" name="email" value="{{$u->email}}" table="users" id="{{$u->id}}" class="email{{$u->id}} form-control edit" /></td>
						<td><input type="text" name="phone" value="{{$u->phone}}" table="users" id="{{$u->id}}" class="phone{{$u->id}} form-control edit" /></td>
						<td>
			<?php // print_r( $permissions); ?>
						<form action="{{url('admin-ajax/permission-update')}}" method="post">
							@csrf
							<select name="permissions[]" multiple id="" class="select2" style="width:250px">
							@if($types!=null)
							@foreach($types AS $t)
								<option value="{{$t->title}}" @if(in_array($t->title,$permissions)) selected @endif>{{$t->title}}</option>
							@endforeach
							@endif
							@foreach(diger_ayarlar() AS $d) 
								<option value="{{$d}}" @if(in_array($d,$permissions)) selected @endif>{{$d}}</option>
							@endforeach
							</select>
							<input type="hidden" name="id" value="{{$u->id}}" />
							<button class="btn btn-default" title="{{__('Kullanıcının yetkilerini güncelle')}}"><i class="fa fa-sync"></i></button>
						</form>
						</td>
						<td><a href="{{url('admin-ajax/password-update?id='.$u->id)}}" title="{{__('Kullanıcının şifresini sıfırla')}}" class="btn btn-default"><i class="fa fa-sync"></i> Şifre Sıfırla</button></td>
						<td>{{$u->recover}}</td>
						<td>
						<div class="dropdown">
						  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							İşlemler
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Giriş Yap</a>
							<a class="dropdown-item" teyit="{{$u->adi}} {$u->soyadi} Kullanıcısını silmek istediğinizden emin misiniz?" href="{{url('admin-ajax/user-delete?id='.$u->id)}}">
							<i class="fa fa-times"></i>
							Sil</a>
						  </div>
						</div>
						</td>
					</tr>
					@endforeach
				</table>
				{{$users->fragment('users')->links() }}
			</div>
		</div>
@endsection
