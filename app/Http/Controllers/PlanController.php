<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Plan::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        if($this->checkEmptyFields($r->name, $r->description, $r->limit, $r->price, $r->task_price)) {
            return 401;
        }


        $p = Plan::create([
           'name' => $r->name,
           'description' => $r->description,
           'price' => $r->price,
           'limit' => $r->limit,
            'task_price' => $r->task_price,
        ]);

        if($p) {
            return 200;
        }


        return 500;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        return $plan;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Plan $plan)
    {

        $p = $plan->update([
           'name' => $r->name,
           'limit' => $r->limit,
           'price' => $r->price,
           'description' => $r->description,
            'task_price' => $r->task_price,




        ]);


        if($p) {
            return 200;
        }


        return 500;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        if($plan->delete()) return Plan::all();
        return 500;
    }

    public function checkEmptyFields(...$args) {
        foreach($args as $arg) {
            if(empty($arg)) return true;
        }


        return false;



    }



}
