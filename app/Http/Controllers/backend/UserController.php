<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
class UserController extends Controller
{
  public function index(){
    $list_user=User::where('status','!=',0)->orderBy('created_at','desc') ->get();
    return view('backend.user.index',compact('list_user'));
  }  
  public function trash(){
    $list_user=User::where('status','=',0)->orderBy('created_at','desc') ->get();
    return view('backend.user.trash',compact('list_user'));
  }  
  public function show($id)
  {
      $user = user::find($id);
     if($user==null)
     {
      return redirect()->route('user.index')->with('message',['type'=>'danger',
      'msg'=>'Mẫu tin không tồn tại!']);
     }
      else
    {
      return view('backend.user.show',compact('user'));
    }
  }
  public function status($id)
  {
     $user = user::find($id);
     if($user==null)
     {
      return redirect()->route('user.index')->with('message',['type'=>'danger',
      'msg'=>'Mẫu tin không tồn tại!']);
     }
     $user->status = ($user->status == 1) ? 2 : 1;
      $user->updated_at = date('Y-m-d H:i:s');
      $user->updated_by = 1;
      $user->save();
      return redirect()->route('user.index')->with('message',['type'=>'sucess',
       'msg'=>'Thay đổi trạng thái thành công!']);
  }
  public function delete($id)
    {
       $user = user::find($id);
       if($user==null)
       {
        return redirect()->route('user.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $user->status = 0;
       $user->updated_at = date('Y-m-d H:i:s');
       $user->updated_by = 1;
       $user->save();
       return redirect()->route('user.index')->with('message',['type'=>'sucess',
        'msg'=>'Đưa vào thùng rác thành công!']);
    }
    public function restore($id)
    {
       $user = user::find($id);
       if($user==null)
       {
        return redirect()->route('user.trash')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $user->status = 2;
       $user->updated_at = date('Y-m-d H:i:s');
       $user->updated_by = 1;
       $user->save();
       return redirect()->route('user.trash')->with('message',['type'=>'sucess',
        'msg'=>'Thay đổi trạng thái thành công!']);
    }
  
}
