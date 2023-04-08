<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        $list_category=Category::where('status','!=',0)->get();
        return view('backend.category.index',compact('list_category'));
    }

    
    public function create()
    {
       echo "đến đây";
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        $category = Category::find($id);
       if($category==null)
       {
        return redirect()->route('category.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
        else
      {
        return view('backend.category.show',compact('category'));
      }

    }

    
    public function edit($id)
    {
        echo"edit";
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
       echo "xóa";
    }
    #GET:admin category/status/1
    public function status($id)
    {
       $category = Category::find($id);
       if($category==null)
       {
        return redirect()->route('category.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
        else
       {
        $category->status = ($category->status == 1) ? 2 : 1;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = 1;
        $category->save();
        return redirect()->route('category.index')->with('message',['type'=>'sucess',
         'msg'=>'Thay đổi trạng thái thành công!']);
       }
    }
    #GET:admin category/delete/1
    public function delete($id)
    {
       $category = Category::find($id);
       if($category==null)
       {
        return redirect()->route('category.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
        else
       {
        $category->status = 0;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = 1;
        $category->save();
        return redirect()->route('category.index')->with('message',['type'=>'sucess',
         'msg'=>'Đưa vào thùng rác thành công!']);
       }
    }
}
