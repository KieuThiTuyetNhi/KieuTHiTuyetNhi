@extends('layouts.admin')
@section('title', 'Chi tiết đơn hàng')
@section('content')

    @method('post')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>CHI TIẾT ĐƠN HÀNG</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
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
                            <a href="{{ route('order.edit', ['order' => $order->id]) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>Sửa
                            </a>
                            <a href="{{ route('order.delete', ['order' => $order->id]) }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-delete"></i>Xóa
                            </a>
                            <a href="{{ route('order.index') }}" class="btn btn-sm btn-info">
                                <i class="fas fa-undo"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h3>THÔNG TIN KHÁCH HÀNG</h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>Mã</td>
                            <td>{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <td>Tên đơn hàng</td>
                            <td>{{ $order->name }}</td>
                        </tr>


                        <tr>
                            <td>Ngày đặt hàng</td>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                    </table>
                    <h3>CHI TIẾT ĐƠN HÀNG</h3>
                    @php
                        $tong = 0;
                    @endphp
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Hình</th>
                                <th class="text-center">Tên sản phẩm</th>
                                <th class="text-center">Đơn giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Thành tiền</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orderdetail as $item)
                                @php
                                    $sanpham = $item->sanpham;
                                    $nameproduct = 'san pham A';
                                    $nameproduct = $sanpham->name;
                                    //tong tien don hang
                                    $tong += $item->amount;
                                @endphp
                                <tr>
                                    <td class="text-center"></td>
                                    <td class="text-center">{{ $nameproduct }}</td>
                                    <td class="text-center">{{ number_format($item->price, 0) }}</td>
                                    <td class="text-center">{{ $item->qty }}</td>
                                    <td class="text-center">{{ number_format($item->amount, 0) }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Tổng tiền</th>
                                <th class="text-center">{{ number_format($tong, 0) }}</th>
                            </tr>
                        </tfoot>

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
