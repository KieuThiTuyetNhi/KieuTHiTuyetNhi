@extends('layouts.admin')
@section('title','Cập nhật  sản phẩm')
@section('content')
<form action="{{route('product.update',['product'=>$product->id])}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Cập nhật  sản phẩm</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Bảng điều khiển</a></li>
                  <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
        <section class="content">
    
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
             <div class="row">
              <div class="col-md-6">
                
              </div>
              <div class="col-md-6 text-right">
                <button type="submit" class="btn btn-sm btn-success">
               <i class="fas fa-save"></i>Lưu[Cập nhật]
                </button>
                <a href="{{route('product.index')}}" class="btn btn-sm btn-info">
                  <i class="fas fa-trash"></i>Quay về danh sách
                   </a>
              </div>
            </div> 
            </div>
            <div class="card-body">
              @includeIf('backend.message_alert')
             <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" value="{{old('name',$product->name)}}" name="name" id='name' class="form-control" placeholder="Nhập tên danh mục">
                        @if ($errors->has('name'))
                           <div class="text-danger">
                          {{$errors->first('name')}}  
                          </div> 
                        @endif
                        
                    </div>
                    <div class="mb-3">
                        <label for="metakey">Từ khóa</label>
                        <textarea name="metakey" id="metakey" class="form-control" placeholder="Từ khóa tìm kiếm" >
                            {{old('metakey',$product->metakey)}}</textarea>
                        @if ($errors->has('metakey'))
                           <div class="text-danger">
                            {{$errors->first('metakey')}}  
                           </div> 
                         @endif
                    </div>
                    <div class="mb-3">
                        <label for="metadesc">Mô tả</label>
                        <textarea name="metadesc" id="metadesc" class="form-control" placeholder=" Nhập mô tả" >{{old('metadesc',$product->metadesc)}}</textarea>
                        @if ($errors->has('metadesc'))
                           <div class="text-danger">
                            {{$errors->first('metadesc')}}  
                           </div> 
                         @endif
                    </div>
                    <div class="mb-3">
                      <label for="detail">Chi tiết sản phẩm</label>
                      <textarea name="detail" id="detail" class="form-control" placeholder=" Nhập mô tả" >{{old('detail',$product->detail)}}</textarea>
                      @if ($errors->has('detail'))
                         <div class="text-danger">
                          {{$errors->first('detail')}}  
                         </div> 
                       @endif
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="mb-3">
                    <label for="category_id">Loại sản phẩm</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="{{old('category_id',$product->category_id)}}">--Danh mục-- </option>
                      {{!! $html_category_id!!}}  
                    </select>
                </div>
                <div class="mb-3">
                  <label for="brand_id">Thương hiệu</label>
                  <select class="form-control" name="brand_id" id="brand_id">
                      <option value="{{old('brand_id',$product->brand_id)}}">--Thương hiệu-- </option>
                    {{!! $html_brand_id!!}}  
                  </select>
              </div>
              <div class="mb-3">
                <label for="price_buy">Giá bán</label>
                <input name="price_buy" id="price_buy"value="{{old('price_buy',$product->price_buy)}}" class="form-control" placeholder=" Nhập giá bán" >
                @if ($errors->has('price_buy'))
                   <div class="text-danger">
                    {{$errors->first('price_buy')}}  
                   </div> 
                 @endif
            </div>
                    <div class="mb-3">
                        <label for="image">Ảnh đại diện</label>
                        <input type="file" value="{{old('image')}}" name="image" id='image' class="form-control" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="mb-3">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1">Xuất bản </option>
                            <option value="2">Chưa xuất bản</option>
                            
                        </select>
                    </div>
                </div>
               
             </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              Footer
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
    
        </section>
        <!-- /.content -->
      </div>
</form>
@endsection