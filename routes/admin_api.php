<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// ADMIN LOGIN REGISTER


Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::post('/logout', 'AuthController@logout');


Route::get('/send-mail', 'MailController@send');
Route::get('/verify-code', 'MailController@verifyCode');
Route::get('/change-password', 'MailController@changePassword');



// END ADMIN LOGIN REGISTER









// ADMIN CONTROLS

// USER CRUD

Route::get('/users', 'UserController@index')->middleware('auth:api');
Route::delete('/users/{id}', 'UserController@destroy');
Route::post('/users', 'UserController@store');

Route::get('/users/{id}/edit', 'UserController@show');
Route::post('/users/update/{id}', 'UserController@updateUserByAdmin');

// END USER CRUD





// PLAN CRUD
Route::resource('/plans', 'PlanController');
// END PLAN CRUD



//  TASK CRUD

Route::resource('/tasks', 'TaskController');

Route::get('/tasks/acceptance/{id}', 'TaskController@acceptance');
Route::get('/tasks/rejection/{id}', 'TaskController@rejection');
Route::get('/tasks/restore/{id}', 'TaskController@restore');

//  END TASK CRUD




// END ADMIN CONTROLS



// PROMOTION IMAGES

Route::resource('/promotion-images', 'PromotionImageController');


Route::resource('/guid-api', 'GuidApiController');
Route::resource('/download-api', 'DownloadApiController');
Route::resource('/videos', 'VideoController');



// END PROMOTION IMAGES










