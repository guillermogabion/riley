<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function self()
    {
        $user = User::find(auth()->user()->id);
        $token = $user->createToken('authToken')->accessToken;
        return response(['user' => $user, 'access_token' => $token]);
    }

    public function index()
    {
        return view('users');
    }
    public function login(Request $request)
    {
        // return $request;
        $login = $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        // return $user;
        if (!Auth::attempt($login)) {
            return response(['message' => 'login Credentials are incorrect'], 401);
        }
        $token = $user->createToken('authToken')->accessToken;
        return response(['user' => Auth::user(), 'access_token' => $token]);
    }

    public function register(Request $request)
    {
        $data = new User();

        if (User::where('email', $request->email)->exists()) {
            return response()->json([
                'message' => "User Already Exist"
            ], 200);
        } elseif (User::where('contact', $request->contact)->exists()) {
            return response()->json([
                'message' => "User Already Exist"
            ], 200);
        } else {
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->birthdate = $request->birthdate;
            $data->address = $request->address;
            $data->landmark = $request->landmark;
            $data->contact = $request->contact;
            $data->user_type = 0;
            $data->email = $request->email;
            $data->password = Hash::make($request->input('password'));
            // if ($request->photo) {
            //     $image = $request->photo;  // your base64 encoded
            //     list($type, $image) = explode(';', $image);
            //     list(, $image)      = explode(',', $image);
            //     $data2 = base64_decode($image);
            //     $imageName = date("YmdHis") . '.' . 'jpeg';
            //     file_put_contents(public_path() . '/' . 'images/user/' . $imageName, $data2);
            //     $data->photo = $imageName;
            // }
            $data->save();
            return response()->json([
                'message' => "Registered",
                'info' => $data
            ]);
        }
    }

    public function updateUser(Request $request, $id)
    {
        $data = User::find($id);

        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->birthdate = $request->birthdate;
        $data->address = $request->address;
        $data->contact = $request->contact;
        // $data->user_type = 0;
        $data->email = $request->email;
        // $data->password = Hash::make($request->input('password'));
        // if ($request->photo) {
        //     $image = $request->photo;  // your base64 encoded
        //     list($type, $image) = explode(';', $image);
        //     list(, $image)      = explode(',', $image);
        //     $data2 = base64_decode($image);
        //     $imageName = date("YmdHis") . '.' . 'jpeg';
        //     file_put_contents(public_path() . '/' . 'images/user/' . $imageName, $data2);
        //     $data->photo = $imageName;
        // }
        $data->save();
        return response()->json([
            'message' => "Registered",
            'info' => $data
        ]);
    }

    public function deleteUser($id)
    {
        $data = User::where('id', $id)->delete();

        return response()->json([
            'message' => "Successfully Deleted",
        ]);
    }

    public function search()
    {
        $data = User::where('user_type', 0)->get();
        return $data;
    }

    public function getProfile()
    {
        return User::where('id', Auth::user()->id)->first();
    }
}
