<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Menu;
use App\Models\Link;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
  public function index()
  {
    $list_category = Category::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
    $list_brand = Brand::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
    $list_topic = Topic::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
    $list_page = Page::where([['status', '!=', 0], ['type', '=', 'page']])->orderBy('created_at', 'desc')->get();
    $list_menu = Menu::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
    return view('backend.menu.index', compact('list_category', 'list_brand', 'list_topic', 'list_page', 'list_menu'));
  }
  public function trash()
  {
    $list_menu = Menu::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
    return view('backend.menu.trash', compact('list_menu'));
  }
  public function create()
  {
    $list_menu = Menu::where('status', '!=', 0)->get();
    foreach ($list_menu as $item) {
    }
    return view('backend.menu.create');
  }
  public function store(Request $request)
  {
    if (isset($request->ADDCATEGORY)) {
      $list_id = $request->checkIdCategory;
      foreach ($list_id as $id) {
        $category = Category::find($id);
        $menu = new Menu();
        $menu->name = $category->name;
        $menu->link = $category->slug;
        $menu->table_id = $id;
        $menu->parent_id = 0;
        $menu->sort_order = 1;
        $menu->type = 'category';
        $menu->position = $request->position;
        $menu->status = 2;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by = 1;
        $menu->save();
      }
      return redirect()->route('menu.index')->with('message', [
        'type' => 'success',
        'msg' => 'Thêm menu thành công!'
      ]);
    }
    if (isset($request->ADDBRAND)) {
      $list_id = $request->checkIdBrand;
      foreach ($list_id as $id) {
        $brand = Brand::find($id);
        $menu = new Menu();
        $menu->name = $brand->name;
        $menu->link = $brand->slug;
        $menu->table_id = $id;
        $menu->parent_id = 0;
        $menu->sort_order = 1;
        $menu->type = 'brand';
        $menu->position = $request->position;
        $menu->status = 2;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by = 1;
        $menu->save();
      }
      return redirect()->route('menu.index')->with('message', [
        'type' => 'success',
        'msg' => 'Thêm menu thành công!'
      ]);
    }
    if (isset($request->ADDTOPIC)) {
      $list_id = $request->checkIdTopic;
      foreach ($list_id as $id) {
        $topic = Topic::find($id);
        $menu = new Menu();
        $menu->name = $topic->name;
        $menu->link = $topic->slug;
        $menu->table_id = $id;
        $menu->parent_id = 0;
        $menu->sort_order = 1;
        $menu->type = 'topic';
        $menu->position = $request->position;
        $menu->status = 2;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by = 1;
        $menu->save();
      }
      return redirect()->route('menu.index')->with('message', [
        'type' => 'success',
        'msg' => 'Thêm menu thành công!'
      ]);
    }
    if (isset($request->ADDPAGE)) {
      $list_id = $request->checkIdPage;
      foreach ($list_id as $id) {
        $page = Page::find($id);
        $menu = new Menu();
        $menu->name = $page->title;
        $menu->link = $page->slug;
        $menu->table_id = $id;
        $menu->parent_id = 0;
        $menu->sort_order = 1;
        $menu->type = 'page';
        $menu->position = $request->position;
        $menu->status = 2;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by = 1;
        $menu->save();
      }
      return redirect()->route('menu.index')->with('message', [
        'type' => 'success',
        'msg' => 'Thêm menu thành công!'
      ]);
    }
    if (isset($request->ADDCUSTOME)) {
      $menu = new Menu();
      $menu->name = $request->name;
      $menu->link = $request->link;
      $menu->type = 'custome';
      $menu->parent_id = 0;
      $menu->sort_order = 1;
      $menu->position = $request->position;
      $menu->status = 2;
      $menu->created_at = date('Y-m-d H:i:s');
      $menu->created_by = 1;
      $menu->save();
      return redirect()->route('menu.index')->with('message', [
        'type' => 'success',
        'msg' => 'Thêm menu thành công!'
      ]);
    }
  }
  public function show($id)
  {
    $menu = Menu::find($id);
    if ($menu == null) {
      return redirect()->route('menu.index')->with('message', [
        'type' => 'danger',
        'msg' => 'Mẫu tin không tồn tại!'
      ]);
    } else {
      return view('backend.menu.show', compact('menu'));
    }
  }
  public function edit($id)
  {
    $menu = Menu::find($id);
    $list_menu = Menu::where('status', '!=', 0)->get();
    $html_parent_id = "";
    $html_sort_order = "";
    foreach ($list_menu as $item) {
      if ($menu->parent_id == $item->id) {
        $html_parent_id .= '<option selected value="' . $item->id . '">' . $item->name . '</option>';
      } else {
        $html_parent_id .= '<option selected value="' . $item->id . '">' . $item->name . '</option>';
      }
      if ($menu->sort_order == $item->sort_order) {
        $html_sort_order .= '<option selected value="' . $item->sort_order . '">Sau' . $item->name . '</option>';
      } else {
        $html_sort_order .= '<option value="' . $item->sort_order . '">Sau' . $item->name . '</option>';
      }
    }
    return view('backend.menu.edit', compact('menu', 'html_parent_id', 'html_sort_order'));
  }
  public function update(Request $request, $id)
  {
    $menu = Menu::find($id);
    $menu->name = $request->name;
    $menu->link = $request->link;
    $menu->parent_id = $request->parent_id;
    $menu->sort_order = $request->sort_orde + 1;
    $menu->position = $request->position;
    $menu->status = $request->status;
    $menu->updated_at = date('Y-m-d H:i:s');
    $menu->updated_by = 1;
    $menu->save();
    return redirect()->route('menu.index')->with('message', [
      'type' => 'success',
      'msg' => 'Thêm menu thành công!'
    ]);
  }
  public function destroy($id)
  {
    $menu = Menu::find($id);
    if ($menu == null) {
      return redirect()->route('menu.trash')->with('message', [
        'type' => 'danger',
        'msg' => 'Mẫu tin không tồn tại!'
      ]);
    }
    if ($menu->delete()) {
      $link = Link::where([['type', '=', 'menu'], ['table_id', '=', $id]])->first();

      $link->delete();
      return redirect()->route('menu.trash')->with('message', [
        'type' => 'success',
        'msg' => 'Xóa mẫu tin thành công!'
      ]);
    }
    return redirect()->route('menu.trash')->with('message', [
      'type' => 'danger',
      'msg' => 'Xóa không thành công!'
    ]);
  }
  // admin menu/status/1  
  public function status($id)
  {
    $menu = Menu::find($id);
    if ($menu == null) {
      return redirect()->route('menu.index')->with('message', [
        'type' => 'danger',
        'msg' => 'Mẫu tin không tồn tại!'
      ]);
    }
    $menu->status = ($menu->status == 1) ? 2 : 1;
    $menu->updated_at = date('Y-m-d H:i:s');
    $menu->updated_by = 1;
    $menu->save();
    return redirect()->route('menu.index')->with('message', [
      'type' => 'sucess',
      'msg' => 'Thay đổi trạng thái thành công!'
    ]);
  }
  //admin menu/delete/1
  public function delete($id)
  {
    $menu = Menu::find($id);
    if ($menu == null) {
      return redirect()->route('menu.index')->with('message', [
        'type' => 'danger',
        'msg' => 'Mẫu tin không tồn tại!'
      ]);
    }
    $menu->status = 0;
    $menu->updated_at = date('Y-m-d H:i:s');
    $menu->updated_by = 1;
    $menu->save();
    return redirect()->route('menu.index')->with('message', [
      'type' => 'sucess',
      'msg' => 'Đưa vào thùng rác thành công!'
    ]);
  }
  public function restore($id)
  {
    $menu = Menu::find($id);
    if ($menu == null) {
      return redirect()->route('menu.trash')->with('message', [
        'type' => 'danger',
        'msg' => 'Mẫu tin không tồn tại!'
      ]);
    }
    $menu->status = 2;
    $menu->updated_at = date('Y-m-d H:i:s');
    $menu->updated_by = 1;
    $menu->save();
    return redirect()->route('menu.trash')->with('message', [
      'type' => 'sucess',
      'msg' => 'Thay đổi trạng thái thành công!'
    ]);
  }
}
