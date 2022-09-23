<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;

class MailController extends Controller
{
    public function send(Request $request)
    {


        $email = request()->email;

        if($email) {
            $user = User::where('email', $email)->first();



        } else {
            return 404;
        }


        if($user) {


            $GLOBALS['email'] = $email;


            $digits = 5;
            $rand = rand(pow(10, $digits - 1), pow(10, $digits) - 1);

            $_SESSION['current_code'] = $rand;
            $_SESSION['current_email'] = $email;


            Mail::send("mail", ['name' => 'BANG'], function ($msg) {

                $msg->to("hasnain@coderightway.com")
                    ->subject('the subject');
                $msg->from($GLOBALS['email']);


            });

            return 200;

        }

        return 401;


    }


    public function verifyCode()
    {

        $code = (int)request()->code;


        if($_SESSION['current_code'] === $code) {
//            unset($_SESSION['current_code']);

            return 200;
        }

        return 404;








    }


    public function changePassword ()
    {
        $pass = request()->pass;

        if($_SESSION['current_code']) {
            $user = User::where('email', $_SESSION['current_email'])->first();


           $updateUser = $user->update([
              'password' => bcrypt($pass),
           ]);
           if($updateUser) {

            unset($_SESSION['current_code']);
            unset($_SESSION['current_email']);

               return 200;
           }
        }


        return 500;
    }



}
