<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
    function login(Request $req)
    {
        // try{
        // return  User::where(['email' => $req->email])->first();
        // }
        // catch(\Illuminate\Database\QueryException $ex)
        // {
        //     dd($ex->getMessage()); 
        // }
        
        $user =  User::where(['email' => $req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "Email or Password not found.";
        }
        else
        {
            $req->session()->put('user',$user);
            return redirect('/');
        }

        // return $req->input();
    }
}
