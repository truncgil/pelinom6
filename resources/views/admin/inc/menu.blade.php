<?php use App\Translate; ?>
 <div class="content-side content-side-full">
                    
                    <ul class="nav-main">
                        <li>
                            <a class="active" href="{{url('admin/')}}"><i class="si si-cup"></i><span
                                    class="sidebar-mini-hide">{{__('Özet')}}</span></a>
                        </li>
					
						<li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span
                                class="sidebar-mini-hidden">{{__('İçerik Türleri')}}</span></li>
								
						 @foreach($types AS $c)
							@if(in_array($c->title,$permissions))
                                <li>
                                    <a href="{{ url('admin/types/'. $c->slug) }}"><i class="fa fa-{{$c->icon}}"></i><span>{{__($c->title)}}</span></a>
                                </li>
							@endif
						@endforeach
                        @if(in_array("contents",$permissions))
						<li class="nav-main-heading "><span class="sidebar-mini-visible">UI</span><span
                                class="sidebar-mini-hidden">{{__('Ana İçerikler')}}</span></li>
						 @foreach($contents AS $c)
							@if($c->title!="")
                                <li class="contents-tree">
                                    <a id="{{$c->slug}}" class="nav-submenu" data-toggle="nav-submenu"><span onclick="location.href='{{ url('admin/contents/'. $c->slug) }}'">{{__($c->title)}}</span></a>
                                </li>
							@endif
						@endforeach
						<script type="text/javascript">
						$(function(){
							$(".contents-tree a").on("click",function(){
								console.log("ok");
								var bu = $(this).parent();
								bu.children().html("{{__('Bekleyiniz...')}}"); 
								$.get('{{url('admin-ajax/contents-tree?id=')}}'+$(this).attr("id"),function(d){
									bu.html(d);
								});
							});
						});
						</script>
						<style type="text/css">
						.contents-tree * {
							cursor:pointer;
						}
						</style>
						@endif 
						@if(in_array("new",$permissions))
						<li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span
                                class="sidebar-mini-hidden">{{__('İçerik Yönetimi')}}</span></li>
                        <li>
                            <a class="nav-submenu" href="{{url('admin/new/contents')}}"><i class="si si-grid"></i><span
                                    class="sidebar-mini-hide">{{__("İçerikler")}}</span></a>
                          
                        </li>
                        <li>
                            <a class="nav-submenu" href="{{ url('admin/new/types') }}"><i
                                    class="si si-layers"></i><span class="sidebar-mini-hide">{{__('Türler')}}</span></a>
                            
                        </li>
                        <li>
                            <a class="nav-submenu" href="{{url('admin/fields')}}"><i class="si si-list"></i><span
                                    class="sidebar-mini-hide">{{__('Alanlar')}}</span></a>
                           
                        </li>
						@endif
						@if(in_array("users",$permissions))
						 <li class="nav-main-heading"><span class="sidebar-mini-visible">KL</span><span
                                class="sidebar-mini-hidden">{{__('Kullanıcı Yönetimi')}}</span></li>
                        <li>
                            <a class="nav-submenu" href="{{url('admin/users')}}"><i class="si si-users"></i><span
                                    class="sidebar-mini-hide">{{__('Kullanıcılar')}}</span></a>                        
                        </li>

						@endif
						@if(in_array("languages",$permissions))
                        <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span
                                class="sidebar-mini-hidden">{{__('Dil Ayarları')}}</span></li>
							
							<?php 	$diller = explode(",",__('Diller')); foreach($diller AS $d) { ?>
							<li>
									<a href="{{ url('admin/languages/'. $d) }}"><i class="fa fa-language"></i><span>{{__($d)}}</span></a>
								</li>
							<?php } ?>
						@endif
                    </ul>

                </div>