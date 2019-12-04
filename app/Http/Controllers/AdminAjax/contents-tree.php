<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contents;
use Illuminate\Support\Facades\DB;
$p = $request->all();
$bu = Contents::where("slug",$p['id'])->first();
$contents = Contents::where("kid",$p['id'])
				->where("title","<>",'')
				->select("title","kid","slug","id")
				->get();
	?>
	<?php if($contents->count()!=0) { ?>
	<li class="open">
		<a class="nav-submenu" data-toggle="nav-submenu"><span onclick="location.href='<?php echo url('admin/contents/'. $bu->slug) ?>'"><?php echo _($bu->title) ?></span></a>
		<?php	
			echo "<ul>";
		foreach($contents AS $c) {
			if($c->title!="") {
			?>
			<li>
				<a id='<?php echo $c->slug; ?>' class="nav-submenu" data-toggle="nav-submenu"><span onclick="location.href='<?php echo url('admin/contents/'. $c->slug) ?>'"><?php echo __($c->title) ?></span></a>
			</li>
			<?php
			}
			
		}
		 echo "</ul>";
		 ?>
	
	</li>
	<?php } else { ?>
		<li>
			<a ><span onclick="location.href='<?php echo url('admin/contents/'. $bu->slug) ?>'"><?php echo __($bu->title) ?></span></a>
	
		</li>
	<?php } ?>
<script type="text/javascript">
						$(function(){
							$(".contents-tree a").on("click",function(){
								console.log("ok");
								var bu = $(this).parent(); 
								//bu.children().html("Bekleyiniz...");
								$.get('<?php echo url('admin-ajax/contents-tree?id=') ?>'+$(this).attr("id"),function(d){
									bu.html(d);
								});
							});
						});
						</script>
 <?php
$return = null;
 ?>