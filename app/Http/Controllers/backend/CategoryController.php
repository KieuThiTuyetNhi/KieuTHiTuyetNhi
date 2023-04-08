<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Link;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    
    public function index()
    {
        $list_category=Category::where('status','!=',0)->orderBy('created_at','desc') ->get();
        return view('backend.category.index',compact('list_category'));
    }

    
    public function create()
    {
        $list_category=Category::where('status','!=',0)->get();
       $html_parent_id ='';
       $html_sort_order ='';
    
       foreach ( $list_category as $item)
       {
        $html_parent_id .='<option value="'.$item->id.'">'.$item->name.'</option>';
        $html_sort_order .='<option value="'.$item->sort_order.'">Sau'.$item->name.'</option>';

       }
       return view('backend.category.create',compact('html_parent_id','html_sort_order'));
    }

    
    public function store(Request $request)
    {
       $category= new Category;
       $category->name=$request->name;
       $category->slug=Str::slug($category->name=$request->name,'-'
    );
       $category->metakey=$request->metakey;
       $category->metadesc=$request->metadesc;
       $category->parent_id=$request->parent_id;
       $category->sort_order=$request->sort_order;
       $category->status=$request->status;
       $category->created_at= date('Y-m-d H:i:s');
       $category->created_by=1;
      if( $category->save())
      {
        $link = new Link();
        $link->slug =$category->id;
        $link->table_id=$category->id;
        $link->type='category';
        $link->save();
        return redirect()->route('category.index')->with('message',['type'=>'success',
        'msg'=>'Thêm mẫu tin thành công!']);
      }
      else{
        return redirect()->route('category.index')->with('message',['type'=>'danger',
        'msg'=>'Thêm không thành công!']);
      }
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
// admin category/status/1  
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
//    admin category/delete/1
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
