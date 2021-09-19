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

    function login(){
        return "login berhasil";
    }
}
