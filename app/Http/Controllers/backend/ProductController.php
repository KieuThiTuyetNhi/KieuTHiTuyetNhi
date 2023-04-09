<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Link;
use Illuminate\Support\Str;
use App\Http\Requests\ProductStoreRequest;  
use App\Http\Requests\ProductUpdateRequest;   
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function index()
    {
        $list_product=Product::where('status','!=',0)->orderBy('created_at','desc') ->get();
        return view('backend.product.index',compact('list_product'));
    }
    public function trash()
    {
        $list_product=Product::where('status','=',0)->orderBy('created_at','desc') ->get();
        return view('backend.product.trash',compact('list_product'));
    }
    public function create()
    {
       $list_product=Product::where('status','!=',0)->get();
      
       foreach ( $list_product as $item)
       {
       }
       return view('backend.product.create');
    }
    public function store(ProductStoreRequest $request)
    {
       $product= new Product; // tạo mới
       $product->name=$request->name;
       $product->slug=Str::slug($product->name=$request->name,'-'
    );
       
    
       $product->category_id=$request->category_id;
       $product->brand_id=$request->brand_id;
       $product->slug=Str::slug($product->name=$request->name,'-');
       $product->price=$request->price;
       $product->detail=$request->detail;
       $product->metakey=$request->metakey;
       $product->metadesc=$request->metadesc;
       $product->status=$request->status;
       $product->created_at= date('Y-m-d H:i:s');
       $product->created_by=1;
      if( $product->save())
      {
        $link = new Link();
        $link->slug =$product->id;
        $link->table_id=$product->id;
        $link->type='product';
        $link->save();
        return redirect()->route('product.index')->with('message',['type'=>'success',
        'msg'=>'Thêm mẫu tin thành công!']);
      }
      return redirect()->route('product.index')->with('message',['type'=>'danger',
        'msg'=>'Thêm không thành công!']);
    }
    public function show($id)
    {
        $product = Product::find($id);
       if($product==null)
       {
        return redirect()->route('product.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
        else
      {
        return view('backend.product.show',compact('product'));
      }
    }
    public function edit($id)
    {
        $product =Product::find($id);
        $list_product=Product::where('status','!=',0)->get();
        foreach ( $list_product as $item)
        {
 
        }
        return view('backend.product.edit',compact('product'));
    }
    public function update(productUpdateRequest $request, $id)
    {
       $product=Product::find($id); //lấy mẫu tin sau đó cập nhật
       $product->name=$request->name;
       $product->slug=Str::slug($product->name=$request->name,'-');
       $product->metakey=$request->metakey;
       $product->metadesc=$request->metadesc;
       $product->status=$request->status;
       $product->updated_at= date('Y-m-d H:i:s');
       $product->updated_by=1;
        
      if( $product->save())
      {
        $link = Link::where([['type','=','product'],['table_id','=',$id]])->first();
        $link->slug =$product->slug;
        $link->save();
        return redirect()->route('product.index')->with('message',['type'=>'success',
        'msg'=>'Thêm mẫu tin thành công!']);
      }
      else{
        return redirect()->route('product.index')->with('message',['type'=>'danger',
        'msg'=>'Thêm không thành công!']);
      }
    }
    public function destroy($id)
        {
           $product = Product::find($id);
           if($product==null)
           {
            return redirect()->route('product.trash')->with('message',['type'=>'danger',
            'msg'=>'Mẫu tin không tồn tại!']);
           }
           if( $product->delete())
           {
             $link = Link::where([['type','=','product'],['table_id','=',$id]])->first();
             
             $link->delete();
             return redirect()->route('product.trash')->with('message',['type'=>'success',
             'msg'=>'Xóa mẫu tin thành công!']);
           }
             return redirect()->route('product.trash')->with('message',['type'=>'danger',
             'msg'=>'Xóa không thành công!']);
    }
// admin product/status/1  
    public function status($id)
    {
       $product = Product::find($id);
       if($product==null)
       {
        return redirect()->route('product.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $product->status = ($product->status == 1) ? 2 : 1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = 1;
        $product->save();
        return redirect()->route('product.index')->with('message',['type'=>'sucess',
         'msg'=>'Thay đổi trạng thái thành công!']);
    }
     //admin product/delete/1
    public function delete($id)
    {
       $product = Product::find($id);
       if($product==null)
       {
        return redirect()->route('product.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $product->status = 0;
       $product->updated_at = date('Y-m-d H:i:s');
       $product->updated_by = 1;
       $product->save();
       return redirect()->route('product.index')->with('message',['type'=>'sucess',
        'msg'=>'Đưa vào thùng rác thành công!']);
    }
    public function restore($id)
    {
       $product = Product::find($id);
       if($product==null)
       {
        return redirect()->route('product.trash')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $product->status = 2;
       $product->updated_at = date('Y-m-d H:i:s');
       $product->updated_by = 1;
       $product->save();
       return redirect()->route('product.trash')->with('message',['type'=>'sucess',
        'msg'=>'Thay đổi trạng thái thành công!']);
    }
}
