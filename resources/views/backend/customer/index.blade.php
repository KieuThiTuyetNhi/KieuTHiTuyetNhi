@extends('layouts.admin')
@section('title','Tất cả customer')
@section('content')
@section('header')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection
@section('footer')
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
      let table = new DataTable('#myTable');
    </script>
@endsection
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tất cả liên hệ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Tất cả liên hệ</li>
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
            <button class="btn btn-sm btn-danger" type="submit">
              <i class="far fa-calendar-times"> Xóa</i></button>
          </div>
          <div class="col-md-6 text-right">
          
            <a href="{{route('customer.trash')}}" class="btn btn-sm btn-danger">
              <i class="fas fa-trash"></i>Thùng rác
               </a>
          </div>
        </div> 
        </div>
        <div class="card-body">
          @includeIf('backend.message_alert')
         <table class="table table-bordered" id="myTable">
          <thead>
            <tr>
              <th style="width:10px" class="text-center">#</th>
              <th style="width:100px">Tên liên hệ</th>
              <th style="width:100px">Số điện thoại</th>
              <th style="width:100px">Email</th>
              <th style="width:150px"  class="text-center">Ngày đăng</th>
              <th style="width:180px" class="text-center">Chức năng</th>
              <th style="width:10px" class="text-center">id</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_customer as $customer)
            <tr>
              <td class="text-center">
                <input type="checkbox">
              </td>
              <td class="text-center align-middle">{{$customer->name}}</td>
              <td class="text-center align-middle">{{$customer->phone}}</td>
              <td class="text-center align-middle">{{$customer->email}}</td>
              <td class="text-center align-middle">{{$customer->created_at}}</td>
              <td class="text-center align-middle">
                @if ($customer->status==1)
                <a href="{{route('customer.status',['customer'=>$customer->id])}}" class="btn btn-sm btn-success">
                  <i class="fas fa-toggle-on"></i></a> 
                @else
                <a href="{{route('customer.status',['customer'=>$customer->id])}}" class="btn btn-sm btn-danger">
                  <i class="fas fa-toggle-off"></i></i></a>  
                @endif
        
                 <a href="{{route('customer.show',['customer'=>$customer->id])}}" class="btn btn-sm btn-primary">
                  <i class="fas fa-eye"></i></a>
                 <a href="{{route('customer.delete',['customer'=>$customer->id])}}" class="btn btn-sm btn-danger">
                  <i class="fas fa-trash"></i></a>
              </td>
              <td class="text-center align-middle">{{$customer->id}}</td>
             
            </tr>
            @endforeach
          </tbody>
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