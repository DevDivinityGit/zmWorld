<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

use App\User;
use App\Http\Resources\User as UserResource;
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only('logout');
    }
    public function register()
    {
        $name = request()->name;
        $email = request()->email;
        $password = request()->password;
        $passwordConfirmation = request()->passwordConfirmation;
      $errors = [];
//           FORM VALIDATION
       if(empty($name)) {
           $errors['name'] = 'Name field is required';
       }
        if(empty($email)) {
            $errors['email'] = 'Email field is required';
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email is not a valid email address';

        } elseif(User::where('email', $email)->first()) {
            $errors['email'] = 'Email address already exists';

        }
        if(empty($password)) {
            $errors['password'] = 'Password field is required';
        } elseif(strlen($password) < 6) $errors['password'] = 'Password is week';

       if(empty($passwordConfirmation)) $errors['passwordConfirmation'] = 'Password confirmation field is required';
       elseif($password !== $passwordConfirmation) $errors['passwordConfirmation'] = 'Password doesnt match';


         if(!request()->agreement) $errors['agreement'] = 'You are not agree to the agreement';

        if(count($errors) > 0) return response()->json(['errors' => $errors]);
//        END FORM VALIDATION

//        CREATE USER
        $validated = [
          'name' => $name,
          'email' => $email,
          'password' => bcrypt($password),
        ];
        $user = User::create($validated);

//        END CREATING USER

//        CREATE ACCESS TOKEN
        $tokens = $user->tokens;
        if(count($tokens) > 0) {
            foreach($tokens as $token) $token->delete();
            $token = $user->createToken('Access token')->accessToken;
        } else {
            $token = $user->createToken('Access token')->accessToken;

        }
        $user->token = $token;
        return new UserResource($user);

//        END CREATING TOKEN;
//        return response()->json(['data' => ['user' => $user, 'token' => $token]]);
    }

    public function login()
    {





            $email = request()->email;
            $password = request()->password;

            $errors = [];
//           FORM VALIDATION

            if (empty($email)) {
                $errors['email'] = 'Email field is required';
            } elseif (!User::where('email', $email)->first()) {
                $errors['email'] = 'Email address doesnt exist';

            }
            if (empty($password)) {
                $errors['password'] = 'Password field is required';
            } elseif ($obj = User::where('email', $email)->first()) {
                if (!password_verify($password, $obj->password)) {
                    $errors['password'] = 'Password do not match';

                }
            }



            if(User::where('email', $email)->first()->role->name === 'admin') {


                if (count($errors) > 0) return response()->json(['errors' => $errors]);

                $user = User::where('email', $email)->first();
//       return response()->json(['data', $user]);


//        CREATE ACCESS TOKEN
                $tokens = $user->tokens;


                foreach ($tokens as $token) $token->delete();


                $token = $user->createToken('token')->accessToken;


//        END CREATING TOKEN;
//        return response()->json(['data' => ['user' => $user, 'token' => $token]]);


                $user->token = $token;
                $_SESSION['user_id'] = $user->id;


                return new UserResource($user);


            }





        }











    public function logout()
    {
//        if(isset($_SESSION['user_id'])) session_destroy();
        session_destroy();

        $tokens = auth()->user()->tokens;



        if(count($tokens) > 0) {
            foreach($tokens as $token) $token->delete();

            return response()->json(['code' => 200]);
        }

        return response()->json(['code' => 500]);



    }
}
