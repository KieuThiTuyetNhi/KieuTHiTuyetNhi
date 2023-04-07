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
        //
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
}
