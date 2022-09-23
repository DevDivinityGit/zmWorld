<?php

namespace App\Http\Controllers;

use App\PromotionImage;
use Illuminate\Http\Request;



class PromotionImageController extends Controller
{

    public function getImages()
    {
        return json_encode([
            'errors' => false,
            'data' => PromotionImage::all(),
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PromotionImage::all();
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


        $fileData = json_decode(request()->imageFile);







           $length = (int)request()->imageLength;






           for($i=0; $i<$length; $i++) {


               $request = $fileData[$i];


               $folderPath = "uploads/";


               $base64Image = explode(";base64,", $request);
               $explodeImage = explode("image/", $base64Image[0]);
               $imageType = $explodeImage[1];
               $image_base64 = base64_decode($base64Image[1]);
               $file = $folderPath . uniqid() . '.' . $imageType;

               file_put_contents($file, $image_base64);



               PromotionImage::create([
                   'image' => $file,
               ]);



           }











        return 200;






        if($r->files) {


            $r->files->move('uploads/promotion_images', 'newImg.jpg');




            return 101;
        }

        return 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PromotionImage  $promotionImage
     * @return \Illuminate\Http\Response
     */
    public function show(PromotionImage $promotionImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PromotionImage  $promotionImage
     * @return \Illuminate\Http\Response
     */
    public function edit(PromotionImage $promotionImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PromotionImage  $promotionImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PromotionImage $promotionImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PromotionImage  $promotionImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PromotionImage $promotionImage)
    {
         $img = $promotionImage;

         unlink($img->image);

         if($img->delete())  {

             return PromotionImage::all();

         }



         return 0;





    }
}























