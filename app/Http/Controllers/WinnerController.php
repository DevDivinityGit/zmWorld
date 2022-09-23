<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WinnerController extends Controller
{
    public function generate()
    {






        $results = [];



        for($i=0; $i<30; $i++) {


            $digits = 4;
            $digit = rand(pow(10, $digits - 1), pow(10, $digits) - 1);





            $min = 1200;
            $limit = 46;
            $rand = rand(1, 46);


            $min +=  $rand*50;



            $data = [];
             $data['code'] = $digit;
             $data['price'] = $min;


             array_push($results, $data);














        }















        return json_encode(['errors' => false, 'data' => $results]);








    }
}
