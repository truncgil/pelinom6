<div class="row">
					<?php $dosya = explode(",",@$c->files); if(is_array($dosya)) { foreach($dosya AS $d) { 
					if($d!="") { 
					$isim = explode("/",$d);
					$isim = explode(".",$isim[4]);
					$ext = $isim[1];
					
					?>
					
					<?php if($ext == 'pdf'){ ?>
						<a href="{{url($d)}}" target="_blank" style="color: #333;" class="col-12 col-md-3">
							<div style="width: 200px;" class="t-center">
								<img src="assets/images/pdf.png" style="width: 80px; height: auto; display: block; margin: 0 auto;" alt="{{@$isim[0]}}">
								<p>{{@$isim[0]}}</p>
							</div>
						</a>
					<?php } elseif($ext == 'xls' || $ext == 'xlsx'){ ?>
						<a href="{{url($d)}}" target="_blank" style="color: #333;" class="col-12 col-md-3">
							<div style="width: 200px;" class="t-center">
								<img src="assets/images/xls.png" style="width: 80px; height: auto; display: block; margin: 0 auto;" alt="{{@$isim[0]}}">
								<p>{{@$isim[0]}}</p>
							</div>
						</a>
					<?php } elseif($ext == 'doc' || $ext == 'docx'){ ?>
						<a href="{{url($d)}}" target="_blank" style="color: #333;" class="col-12 col-md-3">
							<div style="width: 200px;" class="t-center">
								<img src="assets/images/doc.png" style="width: 80px; height: auto; display: block; margin: 0 auto;" alt="{{@$isim[0]}}">
								<p>{{@$isim[0]}}</p>
							</div>
						</a>
					<?php } elseif($ext == 'ppt' || $ext == 'pptx'){ ?>
						<a href="{{url($d)}}" target="_blank" style="color: #333;" class="col-12 col-md-3">
							<div style="width: 200px;" class="t-center">
								<img src="assets/images/ppt.png" style="width: 80px; height: auto; display: block; margin: 0 auto;" alt="{{@$isim[0]}}">
								<p>{{@$isim[0]}}</p>
							</div>
						</a>
					<?php } else{ ?>
						<a href="{{url($d)}}" target="_blank" style="color: #333;" class="col-12 col-md-3">
							<div style="width: 200px;" class="t-center">
								<img src="assets/images/file.png" style="width: 80px; height: auto; display: block; margin: 0 auto;" alt="{{@$isim[0]}}">
								<p>{{@$isim[0]}}</p>
							</div>
						</a>
					<?php } ?>
					
						
					<?php } ?>
					<?php } ?>
					<?php } ?>
					</div>