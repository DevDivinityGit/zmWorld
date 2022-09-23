<?php

namespace App\Http\Controllers;

use App\DownloadApi;
use Illuminate\Http\Request;

class DownloadApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DownloadApi::first();
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
        $attr = [];
        $attr['android_link'] = $r->android_link;
        $attr['iso_link'] = $r->iso_link;
        $attr['text'] = $r->text;

        foreach($attr as $key => $val) {
            if(empty($attr[$key])) {
                return 500;
            }



        }








        if(DownloadApi::first()) {

            DownloadApi::first()
                ->update([
                       'android_link' => $attr['android_link'],
                       'iso_link' => $attr['iso_link'],
                       'text' => $attr['text'],
                   ]);




        } else {

            DownloadApi::create([
                'android_link' => $attr['android_link'],
                'iso_link' => $attr['iso_link'],
                'text' => $attr['text'],
            ]);


        }















        return 200;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DownloadApi  $downloadApi
     * @return \Illuminate\Http\Response
     */
    public function show(DownloadApi $downloadApi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DownloadApi  $downloadApi
     * @return \Illuminate\Http\Response
     */
    public function edit(DownloadApi $downloadApi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DownloadApi  $downloadApi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DownloadApi $downloadApi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DownloadApi  $downloadApi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DownloadApi $downloadApi)
    {
        return $downloadApi;
    }
}
