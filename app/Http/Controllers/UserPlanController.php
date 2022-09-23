<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Plan;

class UserPlanController extends Controller
{
    public function getPlans()
    {

        return Plan::all();
    }

    public function updated()
    {

       $errors = [];

        if(empty(request()->plan_id)) {
            $errors[] = 'plan key is not sent';
        }


        if(count($errors)>0) {
            return json_encode(['errors' => true, 'data' => $errors]);

        }




        $plan = Plan::find(request()->plan_id);




        $user = User::find(request()->user()->id);



        if($user->update(['plan_id' => $plan->id])) {
            return json_encode(['errors' => false, 'data' => $plan]);
        }





    }


    public function getCurrentPlan()
    {

        return json_encode([
           'errors' => false,
           'data' => request()->user()->plan,

        ]);


    }

















}
