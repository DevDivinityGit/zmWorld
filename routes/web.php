<?php
use Illuminate\Support\Facades\Route;





//$min = 1200;
//$limit = 46;
//$rand = rand(1, 46);
//
//
//$min +=  $rand*50;
//
//
//echo $min;









Route::get('{any}', 'AdminController@index')->where('any', '.*');










