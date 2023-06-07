<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
class CustomerController extends Controller
{
  public function index(){
    $list_customer=Customer::where('status','!=',0)->orderBy('created_at','desc') ->get();
    return view('backend.customer.index',compact('list_customer'));
  }  
  public function trash(){
    $list_customer=Customer::where('status','=',0)->orderBy('created_at','desc') ->get();
    return view('backend.customer.trash',compact('list_customer'));
  }  
  public function show($id)
  {
      $customer = Customer::find($id);
     if($customer==null)
     {
      return redirect()->route('customer.index')->with('message',['type'=>'danger',
      'msg'=>'Mẫu tin không tồn tại!']);
     }
      else
    {
      return view('backend.customer.show',compact('customer'));
    }
  }
  public function status($id)
  {
     $customer = Customer::find($id);
     if($customer==null)
     {
      return redirect()->route('customer.index')->with('message',['type'=>'danger',
      'msg'=>'Mẫu tin không tồn tại!']);
     }
     $customer->status = ($customer->status == 1) ? 2 : 1;
      $customer->updated_at = date('Y-m-d H:i:s');
      $customer->updated_by = 1;
      $customer->save();
      return redirect()->route('customer.index')->with('message',['type'=>'sucess',
       'msg'=>'Thay đổi trạng thái thành công!']);
  }
  public function delete($id)
    {
       $customer = Customer::find($id);
       if($customer==null)
       {
        return redirect()->route('customer.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $customer->status = 0;
       $customer->updated_at = date('Y-m-d H:i:s');
       $customer->updated_by = 1;
       $customer->save();
       return redirect()->route('customer.index')->with('message',['type'=>'sucess',
        'msg'=>'Đưa vào thùng rác thành công!']);
    }
    public function restore($id)
    {
       $customer = Customer::find($id);
       if($customer==null)
       {
        return redirect()->route('customer.trash')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $customer->status = 2;
       $customer->updated_at = date('Y-m-d H:i:s');
       $customer->updated_by = 1;
       $customer->save();
       return redirect()->route('customer.trash')->with('message',['type'=>'sucess',
        'msg'=>'Thay đổi trạng thái thành công!']);
    }
  
}
