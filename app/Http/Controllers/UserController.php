<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function register(request $request) {
        $user = new User;
        $user->nama = $request->input("nama");
        $user->email = $request->input("email");
        $user->password = Hash::make($request->input("password"));
        $user->save();
        return $user;
        // return $request->input();
    }

    function login(Request $request){
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return ["error" => "Maaf Email atau Password salah"];
        }
        return $user;
    }
}
