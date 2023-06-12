<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Link;
use Illuminate\Support\Str;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
  public function index()
  {
    $list_order = Order::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
    return view('backend.order.index', compact('list_order'));
  }
  public function trash()
  {
    $list_order = Order::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
    return view('backend.order.trash', compact('list_order'));
  }
  public function create()
  {
    $list_order = Order::where('status', '!=', 0)->get();
    $html_parent_id = '';
    $html_sort_order = '';
    foreach ($list_order as $item) {
      $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
      $html_sort_order .= '<option value="' . $item->sort_order . '">Sau' . $item->name . '</option>';
    }
    return view('backend.order.create', compact('html_parent_id', 'html_sort_order'));
  }
  public function store(Request $request)
  {
    $order = new Order; // tạo mới
    $order->name = $request->name;
    $order->slug = Str::slug($order->name = $request->name, '-');
    $order->metakey = $request->metakey;
    $order->metadesc = $request->metadesc;
    $order->parent_id = $request->parent_id;
    $order->sort_order = $request->sort_order;
    $order->status = $request->status;
    $order->created_at = date('Y-m-d H:i:s');
    $order->created_by = 1;
    //Upload file
    if ($request->has('image')) {
      $path_dir = "images/order"; // nơi lưu trữ
      $file = $request->file('image');
      $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin 
      $filename = $order->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
      $file->move($path_dir, $filename);
      $order->image = $filename;
    }
    // End upload 
    if ($order->save()) {
      $link = new Link();
      $link->slug = Str::slug($order->name = $request->name, '-');
      $link->table_id = $order->id;
      $link->type = 'order';
      $link->save();
      return redirect()->route('order.index')->with('message', [
        'type' => 'success',
        'msg' => 'Thêm mẫu tin thành công!'
      ]);
    }
    return redirect()->route('order.index')->with('message', [
      'type' => 'danger',
      'msg' => 'Thêm không thành công!'
    ]);
  }
  public function show($id)
  {
    $order = Order::find($id);
    $orderdetail = Orderdetail::whereIn('order_id', [$id])
      ->orderBy('created_at', 'desc')->get();
    if ($order == null) {
      return redirect()->route('order.index')->with('message', [
        'type' => 'danger',
        'msg' => 'Mẫu tin không tồn tại!'
      ]);
    } else {
      return view('backend.order.show', compact('order', 'orderdetail'));
    }
  }
  public function edit($id)
  {
    $order = Order::find($id);
    $list_order = Order::where('status', '!=', 0)->get();
    $html_parent_id = '';
    $html_sort_order = '';
    foreach ($list_order as $item) {
      $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
      $html_sort_order .= '<option value="' . $item->sort_order . '">Sau' . $item->name . '</option>';
    }
    return view('backend.order.edit', compact('order', 'html_parent_id', 'html_sort_order'));
  }
  public function update(Request $request, $id)
  {
    $order = Order::find($id); //lấy mẫu tin sau đó cập nhật
    $order->name = $request->name;
    $order->slug = Str::slug($order->name = $request->name, '-');
    $order->metakey = $request->metakey;
    $order->metadesc = $request->metadesc;
    $order->parent_id = $request->parent_id;
    $order->sort_order = $request->sort_order;
    $order->status = $request->status;
    $order->updated_at = date('Y-m-d H:i:s');
    $order->updated_by = 1;
    // Upload file
    if ($request->has('image')) {
      $path_dir = "images/order/";
      if (File::exists(($path_dir . $order->image))) {
        File::delete(($path_dir . $order->image));
      }
      $file = $request->file('image');
      $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin
      $filename = $order->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
      $file->move($path_dir, $filename);
      $order->image = $filename;
    }
    //end upload file
    if ($order->save()) {
      $link = Link::where([['type', '=', 'order'], ['table_id', '=', $id]])->first();
      $link->slug = $order->slug;
      $link->save();
      return redirect()->route('order.index')->with('message', [
        'type' => 'success',
        'msg' => 'Thêm mẫu tin thành công!'
      ]);
    } else {
      return redirect()->route('order.index')->with('message', [
        'type' => 'danger',
        'msg' => 'Thêm không thành công!'
      ]);
    }
  }
  public function destroy($id)
  {
    $order = Order::find($id);
    if ($order == null) {
      return redirect()->route('order.trash')->with('message', [
        'type' => 'danger',
        'msg' => 'Mẫu tin không tồn tại!'
      ]);
    }
    if ($order->delete()) {

      return redirect()->route('order.trash')->with('message', [
        'type' => 'success',
        'msg' => 'Xóa mẫu tin thành công!'
      ]);
    }
    return redirect()->route('order.trash')->with('message', [
      'type' => 'danger',
      'msg' => 'Xóa không thành công!'
    ]);
  }
  // admin order/status/1  
  public function status($id)
  {
    $order = Order::find($id);
    if ($order == null) {
      return redirect()->route('order.index')->with('message', [
        'type' => 'danger',
        'msg' => 'Mẫu tin không tồn tại!'
      ]);
    }
    $order->status = ($order->status == 1) ? 2 : 1;
    $order->updated_at = date('Y-m-d H:i:s');
    $order->updated_by = 1;
    $order->save();
    return redirect()->route('order.index')->with('message', [
      'type' => 'sucess',
      'msg' => 'Thay đổi trạng thái thành công!'
    ]);
  }
  //admin order/delete/1
  public function delete($id)
  {
    $order = Order::find($id);
    if ($order == null) {
      return redirect()->route('order.index')->with('message', [
        'type' => 'danger',
        'msg' => 'Mẫu tin không tồn tại!'
      ]);
    }
    $order->status = 0;
    $order->updated_at = date('Y-m-d H:i:s');
    $order->updated_by = 1;
    $order->save();
    return redirect()->route('order.index')->with('message', [
      'type' => 'sucess',
      'msg' => 'Đưa vào thùng rác thành công!'
    ]);
  }
  public function restore($id)
  {
    $order = Order::find($id);
    if ($order == null) {
      return redirect()->route('order.trash')->with('message', [
        'type' => 'danger',
        'msg' => 'Mẫu tin không tồn tại!'
      ]);
    }
    $order->status = 2;
    $order->updated_at = date('Y-m-d H:i:s');
    $order->updated_by = 1;
    $order->save();
    return redirect()->route('order.trash')->with('message', [
      'type' => 'sucess',
      'msg' => 'Thay đổi trạng thái thành công!'
    ]);
  }
}
