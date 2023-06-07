@extends('layouts.site') @section('title','thanh toán') @section('content')
<div class="container">
    <div class="col-md-12 mt-4">
        <div class="row">
            <div class="col-md-4">
                <h3>Thông tin khách hàng</h3>
                <div class="form-group">
                    <label for="usr">Họ và tên</label>
                    <input
                        required="true"
                        name="name"
                        type="text"
                        class="form-control"
                        value="{{Auth::user()->name;}}"
                        id="usr"
                    />
                </div>
                <div class="form-group">
                    <label for="usr">Email</label>
                    <input
                        required="true"
                        name="Email"
                        type="Email"
                        class="form-control"
                        value="{{Auth::user()->email;}}"
                        id="Email"
                    />
                </div>
                <div class="form-group">
                    <label for="usr">Số điện thoại</label>
                    <input
                        required="true"
                        name="phone"
                        type="text"
                        class="form-control"
                        value="{{Auth::user()->phone;}}"
                        id="phone"
                    />
                </div>
                <div class="form-group">
                    <label for="usr">Địa chỉ</label>
                    <input
                        required="true"
                        name="add"
                        type="text"
                        class="form-control"
                        value="{{Auth::user()->address;}}"
                        id="add"
                    />
                </div>
            </div>
            <div class="col-md-8">
                <h3>Thông tin sản phẩm</h3>
                @if (Session::has("Cart") != null)
                <table class="table table-bordered" id="myTable">
                    <tbody>
                        @foreach (Session::get('Cart')->products as $item)
                        <tr>
                            <td></td>
                            <td style="font-size: 20px">
                                <span>{{$item['productInfo']->name}}</span>
                                <br />
                            </td>
                            <td>
                                <span>{{ $item["quanty"] }}</span>
                            </td>
                            <td>
                                {{number_format($item['productInfo']->price_buy)}}
                            </td>
                            <td class="text-center">
                                {{ number_format($item["price"]) }} đ
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <h4>
                    Tổng tiền:
                    {{number_format(Session::get('Cart')->totalPrice,0)}}
                </h4>
                <a type="button" class="btn btn-info"  href="{{route('order.dathang')}}">Đặt hàng</a>
                @endif
            </div>
            
        </div>
       
    </div>
</div>
@endsection
