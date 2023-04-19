@extends('layouts.admin')
@section('title','Chi tiết slider')
@section('content')
   
    @method('post')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Chi tiết slider</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Bảng điều khiển</a></li>
                  <li class="breadcrumb-item active">Chi tiết danh mục</li>
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
                <a href="{{route('slider.edit',['slider'=>$slider->id])}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i>Sửa
                </a>
                <a href="{{route('slider.delete',['slider'=>$slider->id])}}" class="btn btn-sm btn-danger">
                    <i class="fas fa-delete"></i>Xóa
                </a>
                <a href="{{route('slider.index')}}" class="btn btn-sm btn-info">
                  <i class="fas fa-trash"></i> Quay về danh sách
                </a>
              </div>
            </div> 
            </div>
            <div class="card-body">
            <table class="table">
                <tr>
                    <td>Tên trường</td>
                    <td>Giá trị</td>
                </tr>
                <tr>
                    <td>id</td>
                    <td>{{$slider->id}}</td>
                </tr>
                <tr>
                    <td>name</td>
                    <td>{{$slider->name}}</td>
                </tr>
                <tr>
                    <td>slug</td>
                    <td>{{$slider->slug}}</td>
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