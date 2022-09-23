<?php

namespace App\Http\Controllers;

use function GuzzleHttp\headers_from_lines;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
//        $this->middleware('custom.auth');
    }
    public function index()
    {
        $_SESSION['user_id'] = null;

        if($_SESSION['user_id'] === null)  {




        }



        return view('admin');
    }
}
