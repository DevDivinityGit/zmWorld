<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;
class UserController extends Controller
{



    public function updateUserByAdmin($id)
    {

        $user = User::find($id);

        $r =  request();

        if(!empty($r->name)) {
            $user->update(['name' => $r->name]);
        }


        if(!empty($r->email)) {
            $user->update(['email' => $r->email]);
        }
        if(!empty($r->password)) {
            $user->update(['password' => $r->password]);
        }




        if($r->image) {
            $imageName = time().'.'.$r->image->getClientOriginalExtension();
            $r->image->move('uploads/images/', $imageName);
            unlink($user->image);

            $user->update(['image' => 'uploads/images/'.$imageName]);
        }











        return 200;





    }


    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }


    public function register()
    {



        $name = request()->name;
//        $image = request();
        $email = request()->email;
        $password = request()->password;

        $errors = [];
//           FORM VALIDATION

        if(empty($name)) {
            $errors['name'] = 'Email field is required';
        }





        if(empty($email)) {
            $errors['email'] = 'Email field is required';
        }
        if(empty($password)) {
            $errors['password'] = 'Password field is required';
        }


//        IMAGE UPLOAD

          $request = request();

        if ($request->image) {
        $folderPath = "uploads/";

        $base64Image = explode(";base64,", $request->image);
        $explodeImage = explode("image/", $base64Image[0]);
        $imageType = $explodeImage[1];
        $image_base64 = base64_decode($base64Image[1]);
        $file = $folderPath . uniqid() . '.'.$imageType;

        file_put_contents($file, $image_base64);




    }
//        END IMAGE UPLOAD


        if(User::where('email', $email)->first()) {

            $errors['email'] = 'Email address already exists';




        }










        if(count($errors) > 0) {


            return json_encode(['errors' => true, 'data' => $errors]);





        }


//        CREATE USER
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'image' => isset($file) ? $file : 'uploads/images/avatar.jpg',
            'invitation_code' => $this->generateRandomString(),


        ]);


//        END CREATE USER


       $token = $user->createToken('the token')->accessToken;




        unset($user->tokens);


        return json_encode(['errors' => false, 'data' => $user, 'token' => $token]);


    }


    public function login ()
    {





        $email = request()->email;
        $password = request()->password;

        $data = [];
//           FORM VALIDATION

        if(empty($email)) {
            $data['email'] = 'Email field is required';
        }elseif(!User::where('email', $email)->first()) {
            $data['email'] = 'Email address doesnt exist';

        }
        if(empty($password)) {
            $data['password'] = 'Password field is required';
        } elseif($obj = User::where('email', $email)->first()) {
            if(!password_verify($password, $obj->password)) {
                $data['password'] = 'Password do not match';

            }
        }

        if(count($data) > 0) {

            return json_encode(['errors' => true, 'data' => $data]);









        }




        $user = User::where('email', $email)->first();
//       return response()->json(['data', $user]);




//        CREATE ACCESS TOKEN
        $tokens = $user->tokens;
        if(count($tokens) > 0) {
            foreach($tokens as $token) $token->delete();
            $token = $user->createToken('Access token')->accessToken;
        } else {
            $token = $user->createToken('Access token')->accessToken;

        }



            unset($user->tokens);


        $user->token = $token;

        return json_encode(['errors' => false, 'data' => $user]);
















    }


    public function index ()
    {

        if(Gate::allows('is-admin')) {

            return User::where('role_id', '!=', 1)->get();


        }

        return [];

    }

    public function destroy($id)
    {

        $user = User::find($id);
        if($user->delete()) {
            return User::where('role_id', '!=', 1)->get();
        }

        return 0;
    }


    public function store()
    {
        $r = request();
        if(empty($r->name) || empty($r->email) || empty($r->password)) {
            return 500;
        }




        if($r->image) {
            $imageName = time().'.'.$r->image->getClientOriginalExtension();
            $r->image->move('uploads/images/', $imageName);
        }

        $user = User::create([
            'name' => $r->name,
            'email' => $r->email,
            'password' => bcrypt($r->password),
            'image' => isset($imageName) ? 'uploads/images/'.$imageName : 'uploads/images/avatar.jpg',
            'invitation_code' => $this->generateRandomString(),
        ]);

        if($user) {
            return 200;
        }





        return 500;
    }



    public  function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }










}
