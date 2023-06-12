<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Link;
use Illuminate\Support\Str;
use App\Http\Requests\ContactStoreRequest;  
use App\Http\Requests\ContactUpdateRequest;   
use Illuminate\Support\Facades\File;
class ContactController extends Controller
{
    public function index()
    {
        $list_contact=Contact::where('status','!=',0)->orderBy('created_at','desc') ->get();
        return view('backend.contact.index',compact('list_contact'));
    }
    public function trash()
    {
        $list_contact=Contact::where('status','=',0)->orderBy('created_at','desc') ->get();
        return view('backend.contact.trash',compact('list_contact'));
    }
    public function create()
    {
       $list_contact=Contact::where('status','!=',0)->get();
      
       foreach ( $list_contact as $item)
       {
       }
       return view('backend.contact.create');
    }
    public function store(ContactStoreRequest $request)
    {
       $contact= new contact; // tạo mới
       $contact->name=$request->name;
       $contact->slug=Str::slug($contact->name=$request->name,'-');
       $contact->user_id=$request->user_id;
       $contact->email=$request->email;
       $contact->phone=$request->phone;
       $contact->title=$request->title;
       $contact->content=$request->content;
       $contact->replay_id=$request->replay_id;
       $contact->status=$request->status;
       $contact->created_at= date('Y-m-d H:i:s');
      //  $contact->created_by=1;
      if( $contact->save())
      {
        $link = new Link();
        $link->slug =$contact->id;
        $link->table_id=$contact->id;
        $link->type='contact';
        $link->save();
        return redirect()->route('contact.index')->with('message',['type'=>'success',
        'msg'=>'Thêm mẫu tin thành công!']);
      }
      return redirect()->route('contact.index')->with('message',['type'=>'danger',
        'msg'=>'Thêm không thành công!']);
    }
    public function show($id)
    {
        $contact = Contact::find($id);
       if($contact==null)
       {
        return redirect()->route('contact.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
        else
      {
        return view('backend.contact.show',compact('contact'));
      }
    }
    public function edit($id)
    {
        $contact =Contact::find($id);
        $list_contact=Contact::where('status','!=',0)->get();
        foreach ( $list_contact as $item)
        {
          
        }
        return view('backend.contact.edit',compact('contact'));
    }
    public function update(ContactUpdateRequest $request, $id)
    {
       $contact=Contact::find($id); //lấy mẫu tin sau đó cập nhật
       $contact->name=$request->name;

       $contact->slug=Str::slug($contact->name=$request->name,'-');
       $contact->status=$request->status;
       $contact->updated_at= date('Y-m-d H:i:s');
       $contact->updated_by=1;
      if( $contact->save())
      {
        $link = Link::where([['type','=','contact'],['table_id','=',$id]])->first();
        $link->slug =$contact->slug;
        $link->save();
        return redirect()->route('contact.index')->with('message',['type'=>'success',
        'msg'=>'Thêm mẫu tin thành công!']);
      }
      else{
        return redirect()->route('contact.index')->with('message',['type'=>'danger',
        'msg'=>'Thêm không thành công!']);
      }
    }
    public function destroy($id)
        {
           $contact = Contact::find($id);
           if($contact==null)
           {
            return redirect()->route('contact.trash')->with('message',['type'=>'danger',
            'msg'=>'Mẫu tin không tồn tại!']);
           }
           if( $contact->delete())
           {
            //  $link = Link::where([['type','=','contact'],['table_id','=',$id]])->first();
             
            //  $link->delete();
             return redirect()->route('contact.trash')->with('message',['type'=>'success',
             'msg'=>'Xóa mẫu tin thành công!']);
           }
             return redirect()->route('contact.trash')->with('message',['type'=>'danger',
             'msg'=>'Xóa không thành công!']);
    }
// admin contact/status/1  
    public function status($id)
    {
       $contact = Contact::find($id);
       if($contact==null)
       {
        return redirect()->route('contact.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $contact->status = ($contact->status == 1) ? 2 : 1;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = 1;
        $contact->save();
        return redirect()->route('contact.index')->with('message',['type'=>'sucess',
         'msg'=>'Thay đổi trạng thái thành công!']);
    }
     //admin contact/delete/1
    public function delete($id)
    {
       $contact = Contact::find($id);
       if($contact==null)
       {
        return redirect()->route('contact.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $contact->status = 0;
       $contact->updated_at = date('Y-m-d H:i:s');
       $contact->updated_by = 1;
       $contact->save();
       return redirect()->route('contact.index')->with('message',['type'=>'sucess',
        'msg'=>'Đưa vào thùng rác thành công!']);
    }
    public function restore($id)
    {
       $contact = Contact::find($id);
       if($contact==null)
       {
        return redirect()->route('contact.trash')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $contact->status = 2;
       $contact->updated_at = date('Y-m-d H:i:s');
       $contact->updated_by = 1;
       $contact->save();
       return redirect()->route('contact.trash')->with('message',['type'=>'sucess',
        'msg'=>'Thay đổi trạng thái thành công!']);
    }
}
