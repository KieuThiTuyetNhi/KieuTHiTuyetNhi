<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Link;
use Illuminate\Support\Str;
use App\Http\Requests\PostStoreRequest;  
use App\Http\Requests\PostUpdateRequest;   
use Illuminate\Support\Facades\File;
class PostController extends Controller
{
    public function index()
    {
        $list_post=Post::where('status','!=',0)->orderBy('created_at','desc') ->get();
        return view('backend.post.index',compact('list_post'));
    }
    public function trash()
    {
        $list_post=Post::where('status','=',0)->orderBy('created_at','desc') ->get();
        return view('backend.post.trash',compact('list_post'));
    }
    public function create()
    {
       $list_post=Post::where('status','!=',0)->get();
      
       foreach ( $list_post as $item)
       {
       }
       return view('backend.post.create');
    }
    public function store(PostStoreRequest $request)
    {
       $post= new post; // tạo mới
       $post->name=$request->name;
       $post->slug=Str::slug($post->name=$request->name,'-'
    );
       $post->category_id=$request->category_id;
       $post->brand_id=$request->brand_id;
       $post->slug=Str::slug($post->name=$request->name,'-');
       $post->price=$request->price;
       $post->detail=$request->detail;
       $post->metakey=$request->metakey;
       $post->metadesc=$request->metadesc;
       $post->status=$request->status;
       $post->created_at= date('Y-m-d H:i:s');
       $post->created_by=1;
      if( $post->save())
      {
        $link = new Link();
        $link->slug =$post->id;
        $link->table_id=$post->id;
        $link->type='post';
        $link->save();
        return redirect()->route('post.index')->with('message',['type'=>'success',
        'msg'=>'Thêm mẫu tin thành công!']);
      }
      return redirect()->route('post.index')->with('message',['type'=>'danger',
        'msg'=>'Thêm không thành công!']);
    }
    public function show($id)
    {
        $post = Post::find($id);
       if($post==null)
       {
        return redirect()->route('post.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
        else
      {
        return view('backend.post.show',compact('post'));
      }
    }
    public function edit($id)
    {
        $post =Post::find($id);
        $list_post=Post::where('status','!=',0)->get();
        foreach ( $list_post as $item)
        {
 
        }
        return view('backend.post.edit',compact('post'));
    }
    public function update(PostUpdateRequest $request, $id)
    {
       $post=Post::find($id); //lấy mẫu tin sau đó cập nhật
       $post->name=$request->name;
       $post->slug=Str::slug($post->name=$request->name,'-');
       $post->metakey=$request->metakey;
       $post->metadesc=$request->metadesc;
       $post->status=$request->status;
       $post->updated_at= date('Y-m-d H:i:s');
       $post->updated_by=1;
      if( $post->save())
      {
        $link = Link::where([['type','=','post'],['table_id','=',$id]])->first();
        $link->slug =$post->slug;
        $link->save();
        return redirect()->route('post.index')->with('message',['type'=>'success',
        'msg'=>'Thêm mẫu tin thành công!']);
      }
      else{
        return redirect()->route('post.index')->with('message',['type'=>'danger',
        'msg'=>'Thêm không thành công!']);
      }
    }
    public function destroy($id)
        {
           $post = Post::find($id);
           if($post==null)
           {
            return redirect()->route('post.trash')->with('message',['type'=>'danger',
            'msg'=>'Mẫu tin không tồn tại!']);
           }
           if( $post->delete())
           {
             $link = Link::where([['type','=','post'],['table_id','=',$id]])->first();
             
             $link->delete();
             return redirect()->route('post.trash')->with('message',['type'=>'success',
             'msg'=>'Xóa mẫu tin thành công!']);
           }
             return redirect()->route('post.trash')->with('message',['type'=>'danger',
             'msg'=>'Xóa không thành công!']);
    }
// admin post/status/1  
    public function status($id)
    {
       $post = Post::find($id);
       if($post==null)
       {
        return redirect()->route('post.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $post->status = ($post->status == 1) ? 2 : 1;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = 1;
        $post->save();
        return redirect()->route('post.index')->with('message',['type'=>'sucess',
         'msg'=>'Thay đổi trạng thái thành công!']);
    }
     //admin post/delete/1
    public function delete($id)
    {
       $post = Post::find($id);
       if($post==null)
       {
        return redirect()->route('post.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $post->status = 0;
       $post->updated_at = date('Y-m-d H:i:s');
       $post->updated_by = 1;
       $post->save();
       return redirect()->route('post.index')->with('message',['type'=>'sucess',
        'msg'=>'Đưa vào thùng rác thành công!']);
    }
    public function restore($id)
    {
       $post = Post::find($id);
       if($post==null)
       {
        return redirect()->route('post.trash')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $post->status = 2;
       $post->updated_at = date('Y-m-d H:i:s');
       $post->updated_by = 1;
       $post->save();
       return redirect()->route('post.trash')->with('message',['type'=>'sucess',
        'msg'=>'Thay đổi trạng thái thành công!']);
    }
}
