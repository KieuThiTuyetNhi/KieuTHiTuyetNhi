<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function login()
    {
        return view('frontend.login.dangnhap'); 
    } 
    function postlogin(Request $request)
    {
        $username=$request->username;
        $password=$request->password;
        if(filter_var($username, FILTER_VALIDATE_EMAIL))
        {
            $data=['email' => $username, 'password' => $password];
            
        }
        else
        {
            $data=['name' => $username, 'password' => $password];
        }
        if(Auth::attempt($data))
        {
            return redirect('/');
            
        }
        else
        {
            return redirect('dang-nhap');
        }
      
        
        
    }
    function logout()
    {
        Auth::logout();
        return redirect('dang-nhap');
    }

}
