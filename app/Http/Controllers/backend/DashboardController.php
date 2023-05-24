<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index()
    {
        return view('backend.dashboard.index');
    }

    public function getlogin(){
         return view ('backend.auth.login');
    }
    public function postlogin(Request $req){
        $this->validate($req,[
            'username'=>'required|exists:KTTN_user',
            'password'=>'required|min:3|max:32',
       ],[         
             'password.required'=>'Bạn chưa nhập mật khẩu',
             'password.min'=>'Mật khẩu có ít nhất 3 kí tự',
             'password.max'=>'Mật khẩu tối đa 32 kí tự',
             'username.required'=>'Bạn chưa nhập tên tài khoản',
            
      
       ]);
                $username =$req->username;
                $password = $req->password;     
                {
                  $data=['username'=>$username,'password'=>$password];
                }     
                if(Auth::attempt($data)){
                    // echo bcrypt($password);
                  return redirect()->route('admin.dashboard')->with('message', ['type' => 'success', 'msg' => 'Đăng nhập tài khoản thành công!']);
                }
                else{
                    // echo "thất bại";
                 return redirect('login');
            //    echo bcrypt($password);
                }
      
   }
   public function logout()
   {
    if(Auth::check()){
        Auth::logout(); 
     return redirect('login');
    }
    else
    {
     return redirect('login');
    }
   }
}
