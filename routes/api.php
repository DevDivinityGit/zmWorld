<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include __DIR__.'/admin_api.php';








// USER LOGIN REGISTER
Route::post('/registration', 'UserController@register');
Route::post('/signin', 'UserController@login');

// END USER LOGIN REGISTER
















Route::middleware(['auth:api'])->group(function() {






// GET PLANS
Route::get('/get-plans', 'UserPlanController@getPlans');
Route::get('/get-current-plan', 'UserPlanController@getCurrentPlan');

// END GET PLANS


// UPDATE PLAN
Route::post('/get-plan-update', 'UserPlanController@updated');

// END UPDATE PLAN

// TASKS

Route::post('/get-tasks', 'UserTaskController@getTasks');
Route::post('/submit-task', 'UserTaskController@submitTask');


Route::get('/get-submitted-tasks', 'UserTaskController@getSubmittedTasks');



// END TASKS

Route::get('/get-promotion-images', 'PromotionImageController@getImages');






Route::get('/winner-generate', 'WinnerController@generate');
Route::get('/tasks-history', 'UserTaskController@getHistory');




//RESET PASSWORD
    Route::post('/reset-password', 'UserMailController@reset');
    Route::post('/user-verify-code', 'UserMailController@verify');
    Route::post('/user-change-password', 'UserMailController@changPassword');









});







