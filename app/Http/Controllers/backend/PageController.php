<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Link;
use Illuminate\Support\Str;
use App\Http\Requests\PageStoreRequest;  
use App\Http\Requests\PageUpdateRequest;   
use Illuminate\Support\Facades\File;
class PageController extends Controller
{
    public function index()
    {
        $list_page=Page::where('status','!=',0)->orderBy('created_at','desc') ->get();
        return view('backend.page.index',compact('list_page'));
    }
    public function trash()
    {
        $list_page=Page::where('status','=',0)->orderBy('created_at','desc') ->get();
        return view('backend.page.trash',compact('list_page'));
    }
    public function create()
    {
       $list_page=Page::where('status','!=',0)->get();
       $html_parent_id ='';
       $html_sort_order ='';
       foreach ( $list_page as $item)
       {
        $html_parent_id .='<option value="'.$item->id.'">'.$item->name.'</option>';
        $html_sort_order .='<option value="'.$item->sort_order.'">Sau'.$item->name.'</option>';
       }
       return view('backend.page.create',compact('html_parent_id','html_sort_order'));
    }
    public function store(PageStoreRequest $request)
    {
       $page= new page; // tạo mới
       $page->name=$request->name;
       $page->slug=Str::slug($page->name=$request->name,'-'
    );
       $page->metakey=$request->metakey;
       $page->metadesc=$request->metadesc;
       $page->parent_id=$request->parent_id;
       $page->sort_order=$request->sort_order;
       $page->status=$request->status;
       $page->created_at= date('Y-m-d H:i:s');
       $page->created_by=1;
       //Upload file
        if ($request->has('image')) {
        $path_dir = "images/page"; // nơi lưu trữ
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin 
        $filename = $page->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
        $file->move($path_dir, $filename);
        $page->image = $filename;
    }
    // End upload 
      if( $page->save())
      {
        $link = new Link();
        $link->slug =$page->id;
        $link->table_id=$page->id;
        $link->type='page';
        $link->save();
        return redirect()->route('page.index')->with('message',['type'=>'success',
        'msg'=>'Thêm mẫu tin thành công!']);
      }
      return redirect()->route('page.index')->with('message',['type'=>'danger',
        'msg'=>'Thêm không thành công!']);
    }
    public function show($id)
    {
        $page = Page::find($id);
       if($page==null)
       {
        return redirect()->route('page.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
        else
      {
        return view('backend.page.show',compact('page'));
      }
    }
    public function edit($id)
    {
        $page =Page::find($id);
        $list_page=Page::where('status','!=',0)->get();
        $html_parent_id ='';
        $html_sort_order ='';
        foreach ( $list_page as $item)
        {
         $html_parent_id .='<option value="'.$item->id.'">'.$item->name.'</option>';
         $html_sort_order .='<option value="'.$item->sort_order.'">Sau'.$item->name.'</option>';
        }
        return view('backend.page.edit',compact('page','html_parent_id','html_sort_order'));
    }
    public function update(PageUpdateRequest $request, $id)
    {
       $page=Page::find($id); //lấy mẫu tin sau đó cập nhật
       $page->name=$request->name;
       $page->slug=Str::slug($page->name=$request->name,'-');
       $page->metakey=$request->metakey;
       $page->metadesc=$request->metadesc;
       $page->parent_id=$request->parent_id;
       $page->sort_order=$request->sort_order;
       $page->status=$request->status;
       $page->updated_at= date('Y-m-d H:i:s');
       $page->updated_by=1;
        // Upload file
        if ($request->has('image')) {
          $path_dir = "images/page/";
          if (File::exists(($path_dir . $page->image))) {
              File::delete(($path_dir . $page->image));
          }
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin
          $filename = $page->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
          $file->move($path_dir, $filename);
          $page->image = $filename;
      }
      //end upload file
      if( $page->save())
      {
        $link = Link::where([['type','=','page'],['table_id','=',$id]])->first();
        $link->slug =$page->slug;
        $link->save();
        return redirect()->route('page.index')->with('message',['type'=>'success',
        'msg'=>'Thêm mẫu tin thành công!']);
      }
      else{
        return redirect()->route('page.index')->with('message',['type'=>'danger',
        'msg'=>'Thêm không thành công!']);
      }
    }
    public function destroy($id)
        {
           $page = Page::find($id);
           if($page==null)
           {
            return redirect()->route('page.trash')->with('message',['type'=>'danger',
            'msg'=>'Mẫu tin không tồn tại!']);
           }
           if( $page->delete())
           {
             $link = Link::where([['type','=','page'],['table_id','=',$id]])->first();
             
             $link->delete();
             return redirect()->route('page.trash')->with('message',['type'=>'success',
             'msg'=>'Xóa mẫu tin thành công!']);
           }
             return redirect()->route('page.trash')->with('message',['type'=>'danger',
             'msg'=>'Xóa không thành công!']);
    }
// admin page/status/1  
    public function status($id)
    {
       $page = Page::find($id);
       if($page==null)
       {
        return redirect()->route('page.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $page->status = ($page->status == 1) ? 2 : 1;
        $page->updated_at = date('Y-m-d H:i:s');
        $page->updated_by = 1;
        $page->save();
        return redirect()->route('page.index')->with('message',['type'=>'sucess',
         'msg'=>'Thay đổi trạng thái thành công!']);
    }
     //admin page/delete/1
    public function delete($id)
    {
       $page = Page::find($id);
       if($page==null)
       {
        return redirect()->route('page.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $page->status = 0;
       $page->updated_at = date('Y-m-d H:i:s');
       $page->updated_by = 1;
       $page->save();
       return redirect()->route('page.index')->with('message',['type'=>'sucess',
        'msg'=>'Đưa vào thùng rác thành công!']);
    }
    public function restore($id)
    {
       $page = Page::find($id);
       if($page==null)
       {
        return redirect()->route('page.trash')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $page->status = 2;
       $page->updated_at = date('Y-m-d H:i:s');
       $page->updated_by = 1;
       $page->save();
       return redirect()->route('page.trash')->with('message',['type'=>'sucess',
        'msg'=>'Thay đổi trạng thái thành công!']);
    }
}
