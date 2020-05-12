<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\UserModel;
use App\FollowModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // method for user sign up
    public function signUp(Request $request)
    {
        $name = trim($request->input('name'));
        $password = $request->input('password');
        $date_of_birth = $request->input('date_of_birth');
        $email = trim($request->input('email'));
        // Checking email is exists or not
        $checkEmail = UserModel::where('email', $email)->count();
        if ($checkEmail <= 0) {
            $result = UserModel::insert([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'date_of_birth' => $date_of_birth,
            ]);
            if ($result) {
                $token = $this->generateToken($email);
                return response()->json([
                    'error' => false,
                    'status' => 'Sign up successful!',
                    'token' => $token
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'status' => 'Sign up failed!'
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'status' => 'Email already registered!'
            ]);
        }
    }

    // method for user login
    public function signIn(Request $request)
    {
        $password = $request->input('password');
        $email = $request->input('email');

        $checkEmail = UserModel::where('email', $email)->first();
        if ($checkEmail) {
            if (Hash::check($password, $checkEmail->password)) {
                $token = $this->generateToken($email);
                return response()->json([
                    'error' => false,
                    'status' => 'User login successful!',
                    'token' => $token
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'status' => 'Password incorrect!'
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'status' => 'User does not exists!'
            ]);
        }
    }

    // get user details
    public function getUserDetails(Request $request){
        $id = $request->input('id');
        $user = UserModel::find($id);
        $following = FollowModel::where('user_id', $id)->count();
        $followers = FollowModel::where('following_id', $id)->count();

        return response()->json([
           'user'=> $user,
           'followers'=> $followers,
           'following'=> $following
        ]);
    }

    // change password
    public function changePassword(Request $request)
    {
        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');
        $email = $request->input('email');

        $checkPassword = UserModel::where('email', $email)->first();
        if (Hash::check($old_password, $checkPassword->password)) {
            $result = UserModel::where('id', $checkPassword->id)->update([
                'password' => Hash::make($new_password)
            ]);
            if ($result) {
                return response()->json([
                    'error' => false,
                    'status' => 'Password changed successfully!'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'status' => 'Password change Failed!'
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'status' => 'Current password is wrong!'
            ]);
        }
    }

    // change password
    public function changeUserName(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        $result = UserModel::where('email', $email)->update('name', $name);
        if ($result) {
            return response()->json([
                'error' => false,
                'status' => 'Username changed successfully!'
            ]);
        } else {
            return response()->json([
                'error' => true,
                'status' => 'Username change Failed!'
            ]);
        }

    }

    // change profile image
    public function chageProfileImage(Request $request)
    {
        $image = $request->file('image');
        $email = $request->input('email');

        // write code for upload image
    }

    private function generateToken($email){
        $key = env('API_KEY');
        $payload = array(
            "email" => $email,
            "com" => "pirox.com",
        );
        return JWT::encode($payload, $key);
    }

}
