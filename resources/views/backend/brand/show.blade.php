@extends('layouts.admin')
@section('title','Chi tiết thương hiệu sản phẩm')
@section('content')
   
    @method('post')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>CHI TIẾT THƯƠNG HIỆU</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Bảng điều khiển</a></li>
                  <li class="breadcrumb-item active">Chi tiết thương hiệu</li>
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
                <a href="{{route('brand.edit',['brand'=>$brand->id])}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i>Sửa
                </a>
                <a href="{{route('brand.delete',['brand'=>$brand->id])}}" class="btn btn-sm btn-danger">
                    <i class="fas fa-delete"></i>Xóa
                </a>
                <a href="{{route('brand.index')}}" class="btn btn-sm btn-info">
                  <i class="fas fa-undo"></i> Quay về danh sách
                </a>
              </div>
            </div> 
            </div>
            <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Tên trường</td>
                    <td>Giá trị</td>
                </tr>
                <tr>
                    <td>Mã thương hiệu</td>
                    <td>{{$brand->id}}</td>
                </tr>
                <tr>
                    <td>Tên thương hiệu</td>
                    <td>{{$brand->name}}</td>
                </tr>
                <tr>
                    <td>slug</td>
                    <td>{{$brand->slug}}</td>
                </tr>
                <tr>
                  <td>Ngày đăng</td>
                  <td>{{$brand->created_at}}</td>
              </tr>
            </table>
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

@endsection