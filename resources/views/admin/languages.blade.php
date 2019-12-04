<?php use App\Translate; ?>
@extends('admin.master')
@section("title",__($id)." ".__("Çevirisini Düzenle"))
@section("desc",__($id)." ".__(" Çevirisini bu sayfadan düzenleyebilirsiniz"))
@section('content')

<script>
$(document).ready(function(){
  $("#ceviri-ara").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#ceviri-table tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<style type="text/css">
.tek-satir {
	white-space:nowrap;
	max-width:250px;
	text-overflow:ellipsis;
	overflow:hidden
}

</style>
	
	<div class="content">
		<div class="block">
				 <div class="block-header block-header-default">
					<h3 class="block-title">{{__($id)}}</h3>
					<div class="block-options">
					<script type="text/javascript">
					$(function(){
						$(".satir-olustur").on("click",function(){
							var bu = $(this); bu.html('İşlem yapılıyor. Bu işlem biraz sürebilir...'); 
							$.get('{{url('admin-ajax/lang-cache/?dil='.$id)}}',function(d){
							bu.html('Tüm içeriklerin satırları oluşturuldu');
								window.setTimeout(function(){
									location.reload();
								},1000);
								
							});
						});
					});
					</script>
					<?php $isim = explode(".",$id); ?>
						<div class="block-options-item">
						<div class="btn btn-primary satir-olustur" onclick="">{{__('Tüm İçeriklerin Satırlarını Oluştur')}}</div>
						<div class="btn btn-info" onclick="$.get('{{url('ajax/set-locale?l='.$isim[0])}}',function(){location.reload();})">{{__('Dili Şu Şekilde Değiştir:')}} {{$isim[0]}}</div>
						</div>
					</div>
				</div>
				<?php 
					$diller = Translate::where("dil",$id)->whereRaw("LENGTH(icerik) < 1000");
					if(getisset("q")) {
						$diller = $diller -> where("icerik","like","%{$_GET['q']}%");
					}
					
					$diller =$diller->orderBy("id","DESC")->simplePaginate(10);
				?>
				<div class="block-content">
				<form action="" method="get">
					<input type="text" name="q" class="form-control" value="{{get("q")}}"  placeholder="Ara..."  /> <br />
				</form>
						@csrf
						<input type="hidden" name="{{base64_encode('json')}}" value="{{$id}}" />
						
						<table class="table table-bordered table-hover table-striped " id="ceviri-table">
							<thead>
								<tr>
									<th>{{__("İçerik")}}</th>
									<th>{{__("Çeviri")}}</th>
									<th>{{__("İşlem")}}</th>
								</tr>
							</thead>
							
							<tbody>
							@foreach($diller AS $d)
								
							@if(is_html($d->icerik))
								<tr>
									<td>
										<div style="width:500px;height:150px;overflow:auto">
											{!! $d->icerik !!}
										</div>
									</td>
									<td>
										<form action="{{url('admin-ajax/input-edit')}}" class="ajax-form" method="post">
										@csrf
											<input type="hidden" name="id" value="{{$d->id}}" />
											<input type="hidden" name="table" value="translate" />
											<input type="hidden" name="name" value="ceviri" />
											<?php //{{base64_encode($d->icerik)}} ?>
												<textarea name="value" class="form-control ckeditor" id="editor" cols="30" rows="10">{!! $d->ceviri !!}</textarea>
										</form>
									</td>
								
								
							@else
								<tr>
									<td><div class="tek-satir">{{$d->icerik}}</div></td>
									<td>
									<textarea name="ceviri" table="translate" id="{{$d->id}}" cols="30" rows="1" class="edit form-control">{{$d->ceviri}}</textarea>
									</td>
								
							@endif
								<td>
									<a href="" onclick="$(this).parent().parent().remove(); return false" class="btn btn-danger" title="{{__('Bu satırı sil')}}"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							@endforeach
							</tbody>
						</table>
						{{$diller->appends($_GET)->links()}}
				</div>
		</div>
	</div>
<script type="text/javascript">
$(function(){
	$("textarea.ckeditor_textarea").each(function(){
    var textarea_id = $(this).attr("id");
    CKEDITOR.instances[textarea_id].updateElement();
    ckeditor_blur_event(textarea_id)
});

});


</script>
@endsection


