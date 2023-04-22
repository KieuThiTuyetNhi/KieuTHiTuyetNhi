<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Link;
use Illuminate\Support\Str;
use App\Http\Requests\BrandStoreRequest;  
use App\Http\Requests\BrandUpdateRequest;   
use Illuminate\Support\Facades\File;
class BrandController extends Controller
{
    public function index()
    {
        $list_brand=Brand::where('status','!=',0)->orderBy('created_at','desc') ->get();
        return view('backend.brand.index',compact('list_brand'));
    }
    public function trash()
    {
        $list_brand=Brand::where('status','=',0)->orderBy('created_at','desc') ->get();
        return view('backend.brand.trash',compact('list_brand'));
    }
    public function create()
    {
       $list_brand=Brand::where('status','!=',0)->get();
      
       $html_sort_order ='';
       foreach ( $list_brand as $item)
       {
        
        $html_sort_order .='<option value="'.$item->sort_order.'">Sau'.$item->name.'</option>';
       }
       return view('backend.brand.create',compact('html_sort_order'));
    }
    public function store(brandStoreRequest $request)
    {
       $brand= new brand; // tạo mới
       $brand->name=$request->name;
       $brand->slug=Str::slug($brand->name=$request->name,'-'
    );
       $brand->metakey=$request->metakey;
       $brand->metadesc=$request->metadesc;
       $brand->sort_order=$request->sort_order;
       $brand->status=$request->status;
       $brand->created_at= date('Y-m-d H:i:s');
       $brand->created_by=1;
       //Upload file
        if ($request->has('image')) {
        $path_dir = "images/brand"; // nơi lưu trữ
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin 
        $filename = $brand->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
        $file->move($path_dir, $filename);
        $brand->image = $filename;
    }
    // End upload 
      if( $brand->save())
      {
        $link = new Link();
        $link->slug =$brand->id;
        $link->table_id=$brand->id;
        $link->type='brand';
        $link->save();
        return redirect()->route('brand.index')->with('message',['type'=>'success',
        'msg'=>'Thêm mẫu tin thành công!']);
      }
      return redirect()->route('brand.index')->with('message',['type'=>'danger',
        'msg'=>'Thêm không thành công!']);
    }
    public function show($id)
    {
        $brand = Brand::find($id);
       if($brand==null)
       {
        return redirect()->route('brand.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
        else
      {
        return view('backend.brand.show',compact('brand'));
      }
    }
    public function edit($id)
    {
        $brand =Brand::find($id);
        $list_brand=Brand::where('status','!=',0)->get();
        $html_sort_order ='';
        foreach ( $list_brand as $item)
        {
         $html_sort_order .='<option value="'.$item->sort_order.'">Sau'.$item->name.'</option>';
        }
        return view('backend.brand.edit',compact('brand','html_sort_order'));
    }
    public function update(brandUpdateRequest $request, $id)
    {
       $brand=Brand::find($id); //lấy mẫu tin sau đó cập nhật
       $brand->name=$request->name;
       $brand->slug=Str::slug($brand->name=$request->name,'-');
       $brand->metakey=$request->metakey;
       $brand->metadesc=$request->metadesc;
       $brand->sort_order=$request->sort_order;
       $brand->status=$request->status;
       $brand->updated_at= date('Y-m-d H:i:s');
       $brand->updated_by=1;
        // Upload file
        if ($request->has('image')) {
          $path_dir = "images/brand/";
          if (File::exists(($path_dir . $brand->image))) {
              File::delete(($path_dir . $brand->image));
          }
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin
          $filename = $brand->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
          $file->move($path_dir, $filename);
          $brand->image = $filename;
      }
      //end upload file
      if( $brand->save())
      {
        $link = Link::where([['type','=','brand'],['table_id','=',$id]])->first();
        $link->slug =$brand->slug;
        $link->save();
        return redirect()->route('brand.index')->with('message',['type'=>'success',
        'msg'=>'Thêm mẫu tin thành công!']);
      }
      else{
        return redirect()->route('brand.index')->with('message',['type'=>'danger',
        'msg'=>'Thêm không thành công!']);
      }
    }
    public function destroy($id)
        {
           $brand = Brand::find($id);
           if($brand==null)
           {
            return redirect()->route('brand.trash')->with('message',['type'=>'danger',
            'msg'=>'Mẫu tin không tồn tại!']);
           }
           if( $brand->delete())
           {
             return redirect()->route('brand.trash')->with('message',['type'=>'success',
             'msg'=>'Xóa mẫu tin thành công!']);
           }
             return redirect()->route('brand.trash')->with('message',['type'=>'danger',
             'msg'=>'Xóa không thành công!']);
    }
// admin brand/status/1  
    public function status($id)
    {
       $brand = Brand::find($id);
       if($brand==null)
       {
        return redirect()->route('brand.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $brand->status = ($brand->status == 1) ? 2 : 1;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = 1;
        $brand->save();
        return redirect()->route('brand.index')->with('message',['type'=>'sucess',
         'msg'=>'Thay đổi trạng thái thành công!']);
    }
     //admin brand/delete/1
    public function delete($id)
    {
       $brand = Brand::find($id);
       if($brand==null)
       {
        return redirect()->route('brand.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $brand->status = 0;
       $brand->updated_at = date('Y-m-d H:i:s');
       $brand->updated_by = 1;
       $brand->save();
       return redirect()->route('brand.index')->with('message',['type'=>'sucess',
        'msg'=>'Đưa vào thùng rác thành công!']);
    }
    public function restore($id)
    {
       $brand = Brand::find($id);
       if($brand==null)
       {
        return redirect()->route('brand.trash')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $brand->status = 2;
       $brand->updated_at = date('Y-m-d H:i:s');
       $brand->updated_by = 1;
       $brand->save();
       return redirect()->route('brand.trash')->with('message',['type'=>'sucess',
        'msg'=>'Thay đổi trạng thái thành công!']);
    }
}
