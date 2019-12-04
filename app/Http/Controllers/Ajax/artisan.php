<?php 
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('vendor:publish');
    echo "Cache is cleared";
	$return =null;
 ?>