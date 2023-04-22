<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Link;
use Illuminate\Support\Str;
use App\Http\Requests\SliderStoreRequest;  
use App\Http\Requests\SliderUpdateRequest;   
use Illuminate\Support\Facades\File;
class SliderController extends Controller
{
    public function index()
    {
        $list_slider=Slider::where('status','!=',0)->orderBy('created_at','desc') ->get();
        return view('backend.slider.index',compact('list_slider'));
    }
    public function trash()
    {
        $list_slider=Slider::where('status','=',0)->orderBy('created_at','desc') ->get();
        return view('backend.slider.trash',compact('list_slider'));
    }
    public function create()
    {
       $list_slider=Slider::where('status','!=',0)->get();
       $html_parent_id ='';
       $html_sort_order ='';
       foreach ( $list_slider as $item)
       {
        $html_parent_id .='<option value="'.$item->id.'">'.$item->name.'</option>';
        $html_sort_order .='<option value="'.$item->sort_order.'">Sau'.$item->name.'</option>';
       }
       return view('backend.slider.create',compact('html_parent_id','html_sort_order'));
    }
    public function store(Request $request)
    {
       $slider= new Slider; // tạo mới
       $slider->name=$request->name;
       $slider->slug=Str::slug($slider->name = $request->name,'-');
       $slider->sort_order=$request->sort_order;
       $slider->link=$request->link;
       $slider->posistion=$request->posistion;
       $slider->status=$request->status;
       $slider->created_at= date('Y-m-d H:i:s');
       $slider->created_by=1;
       //Upload file
        if ($request->has('image')) {
        $path_dir = "images/slider"; // nơi lưu trữ
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin 
        $filename = $slider->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
        $file->move($path_dir, $filename);
        $slider->image = $filename;
        $slider->save();
        return redirect()->route('slider.index')->with('message',['type'=>'success',
        'msg'=>'Thêm mẫu tin thành công!']);
    // End upload 
        }

        return redirect()->route('slider.index')->with('message',['type'=>'danger',
        'msg'=>'Thêm không thành công!']);
        
      
    }
    
      
    
        public function show($id)
    {
        $slider = Slider::find($id);
       if($slider==null)
       {
        return redirect()->route('slider.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
        else
      {
        return view('backend.slider.show',compact('slider'));
      }
    }
    public function edit($id)
    {
        $slider =Slider::find($id);
        $list_slider=Slider::where('status','!=',0)->get();
        $html_parent_id ='';
        $html_sort_order ='';
        foreach ( $list_slider as $item)
        {
         $html_parent_id .='<option value="'.$item->id.'">'.$item->name.'</option>';
         $html_sort_order .='<option value="'.$item->sort_order.'">Sau'.$item->name.'</option>';
        }
        return view('backend.slider.edit',compact('slider','html_parent_id','html_sort_order'));
    }
    public function update(Request $request, $id)
    {
       $slider=Slider::find($id); //lấy mẫu tin sau đó cập nhật
       $slider->name=$request->name;
       $slider->sort_order=$request->sort_order;
       $slider->status=$request->status;
       $slider->updated_at= date('Y-m-d H:i:s');
       $slider->updated_by=1;
        // Upload file
        if ($request->has('image')) {
          $path_dir = "images/slider/";
          if (File::exists(($path_dir . $slider->image))) {
              File::delete(($path_dir . $slider->image));
          }
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin
          $filename = $slider->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
          $file->move($path_dir, $filename);
          $slider->image = $filename;
          $slider->save();
          return redirect()->route('slider.index')->with('message',['type'=>'success',
        'msg'=>'Thêm mẫu tin thành công!']);
      }
      //end upload file
      return redirect()->route('slider.index')->with('message',['type'=>'danger',
        'msg'=>'Thêm không thành công!']);
        
      }
      
        
      
    
    public function destroy($id)
        {
           $slider = Slider::find($id);
           if($slider==null)
           {
            return redirect()->route('slider.trash')->with('message',['type'=>'danger',
            'msg'=>'Mẫu tin không tồn tại!']);
           }
           if( $slider->delete())
           {
            
             
             return redirect()->route('slider.trash')->with('message',['type'=>'success',
             'msg'=>'Xóa mẫu tin thành công!']);
           }
             return redirect()->route('slider.trash')->with('message',['type'=>'danger',
             'msg'=>'Xóa không thành công!']);
    }
// admin slider/status/1  
    public function status($id)
    {
       $slider = Slider::find($id);
       if($slider==null)
       {
        return redirect()->route('slider.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $slider->status = ($slider->status == 1) ? 2 : 1;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->updated_by = 1;
        $slider->save();
        return redirect()->route('slider.index')->with('message',['type'=>'sucess',
         'msg'=>'Thay đổi trạng thái thành công!']);
    }
     //admin slider/delete/1
    public function delete($id)
    {
       $slider = Slider::find($id);
       if($slider==null)
       {
        return redirect()->route('slider.index')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $slider->status = 0;
       $slider->updated_at = date('Y-m-d H:i:s');
       $slider->updated_by = 1;
       $slider->save();
       return redirect()->route('slider.index')->with('message',['type'=>'sucess',
        'msg'=>'Đưa vào thùng rác thành công!']);
    }
    public function restore($id)
    {
       $slider = Slider::find($id);
       if($slider==null)
       {
        return redirect()->route('slider.trash')->with('message',['type'=>'danger',
        'msg'=>'Mẫu tin không tồn tại!']);
       }
       $slider->status = 2;
       $slider->updated_at = date('Y-m-d H:i:s');
       $slider->updated_by = 1;
       $slider->save();
       return redirect()->route('slider.trash')->with('message',['type'=>'sucess',
        'msg'=>'Thay đổi trạng thái thành công!']);
    }
}
