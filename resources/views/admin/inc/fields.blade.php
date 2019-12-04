@if($fields!=null) 
						@foreach(@$fields AS $a => $d)
							{{__($a)}}
							@if($d['type']=="textarea")
								<textarea name="{{$a}}" id="" cols="30" fields="10" class="form-control">{{json_field($j,$a)}}</textarea>
							@elseif($d['type']=="select")
								<select name="{{$a}}" id="" class="form-control select2">
									<option value="">Seçiniz</option>
									@foreach($d['values'] AS $v)
										<option value="{{$v}}" @if($v ==json_field($j,$a)) selected @endif>{{$v}}</option>
									@endforeach
								</select>
							@elseif($d['type']=="select-dynamic")
							@php
								$sorgu = DB::table($d['values'][0])->get();
								$title = explode("-",$d['values'][1]);
							@endphp
								<select name="{{$a}}" id="" class="form-control select2">
									<option value="">Seçiniz</option>
									@foreach($sorgu AS $s)
										@php
											$value = $s->{$d['values'][2]};
										@endphp
										<option value="{{ $value }}"  @if($value ==json_field($j,$a)) selected @endif>
										@foreach($title AS $t)
										{{ $s->{$t} }} 
										@endforeach
										</option>
									@endforeach
								</select>
							@elseif($d['type']=="select-multiple-dynamic")
							@php
								$sorgu = DB::table($d['values'][0])->get();
								$title = explode("-",$d['values'][1]);
							@endphp
								<select name="{{$a}}[]" id="" class="form-control select2" multiple>
									<option value="">Seçiniz</option>
									@foreach($sorgu AS $s)
										@php
											$value = $s->{$d['values'][2]};
										@endphp
										<option value="{{ $value }}"  @if(@in_array($value,json_field($j,$a))) selected @endif>
										@foreach($title AS $t)
										{{ $s->{$t} }} 
										@endforeach 
										</option>
									@endforeach
								</select>
							@elseif($d['type']=="select-multiple")
								<select name="{{$a}}[]" id="" class="form-control select2" multiple>
									<option value="">Seçiniz</option>
									
									@foreach($d['values'] AS $v)
										@if($v!="")
											<option value="{{$v}}" @if(@in_array($v,json_field($j,$a))) selected @endif>{{$v}}</option>
										@endif
									@endforeach
									@if(is_array(json_field($j,$a)))
										@foreach(json_field($j,$a) AS $v)
											<option value="{{$v}}" selected>{{$v}}</option>
										@endforeach
									@endif
								</select>
							@elseif($d['type']=="radio") <br />
								@foreach($d['values'] AS $v)
								
									<label><input type="{{$d['type']}}" name="{{$a}}" value="{{$v}}" @if($v ==json_field($j,$a)) checked @endif id="" /> {{$v}}</label> <br />
								@endforeach
							@elseif($d['type']=="checkbox")  <br />
								@foreach($d['values'] AS $v)
									<label><input type="{{$d['type']}}" name="{{$a}}[]" value="{{$v}}" @if(@in_array($v,json_field($j,$a))) checked @endif id="" /> {{$v}}</label> <br />
								@endforeach
							@else
								<input type="{{$d['type']}}" step="any" class="form-control" name="{{$a}}" value="{{json_field($j,$a)}}" id="" />
							@endif
							
							
						@endforeach
					@endif