@extends('admin.master')

@section('content')
  <!-- Page Content -->
                <div class="bg-primary">
                    <div class="hero bg-black-op-5">
                        <div class="hero-inner">
                            <div class="content content-full text-center">
                                <h1 class="display-4 font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeIn">
								<img class="img-fluid" src="{{asset('assets/img/logo-2.svg')}}" alt="" />
								</h1>
                                <h2 class="font-w400 text-white-op mb-50 invisible" data-toggle="appear" data-class="animated fadeIn" data-timeout="250">{{__('Basit İçerik Yönetim Sistemi')}}</h2>
								<a class="btn btn-hero btn-noborder btn-rounded btn-alt-danger invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="300" href="{{url('admin/new/contents')}}">
                                    <i class="si si-grid mr-10"></i> {{__('İçerikler')}}
                                </a>
								<a class="btn btn-hero btn-noborder btn-rounded btn-alt-info invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="300" href="{{url('admin/new/types')}}">
                                    <i class="si si-layers mr-10"></i> {{__('Türler')}}
                                </a>
								<a class="btn btn-hero btn-noborder btn-rounded btn-alt-success invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="300" href="{{url('admin/fields')}}">
                                    <i class="si si-list mr-10"></i> {{__('Alanlar')}}
                                </a>
                            </div>
                        </div>
                    </div>
					
                </div>
				<div class="container" style="margin-top:50px">
						<div class="row">
						@if($types!=null)
						@foreach($types AS $t)
							<div class="col-sm-4">
								<div class="block block-bordered block-rounded js-appear-enabled animated fadeIn" data-toggle="appear">
									<div class="block-content block-content-full">
										<div class="py-30 text-center">
										<a href="{{url('admin/types/'.$t->slug)}}">
											<div class="item item-2x item-circle bg-primary text-white mx-auto">
												<i class="fa fa-{{$t->icon}}"></i>
											</div>
											<div class="h4 pt-20 mb-0">{{__($t->title)}}</div>
										</a>
										</div>
									</div>
								</div>
							</div>
						@endforeach
						@endif
				
						</div>
					</div>
                <!-- END Page Content -->
				<script type="text/javascript">
				$(function(){
					$("#page-container").addClass("page-header-inverse");
				});
				</script>
@endsection
