@extends('layouts.site') @section('title','giỏ hàng') @section('content')

<div class="col-md-12 mt-4">
    <div class="container">
        <h3 class="text-center">Giỏ hàng</h3>
        <div id="list-cart">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th class="text-center">Hình</th>
                        <th class="text-center">Tên sản phẩm</th>
                        <th class="text-center">Giá bán</th>
                        <th class="text-center" style="width:100px;">Số lượng</th>
                        <th class="text-center">Tổng giá</th>
                        <th class="text-center">Lưu</th>
                        <th class="text-center">Xóa</th>
            
                    </tr>
                </thead>
                <tbody>
                    @if (Session::has("Cart") != null)
                    @foreach (Session::get('Cart')->products as $item)
                    <tr>
                        <td>  </td>
                        <td class="">{{$item['productInfo']->name}}</td>
                        <td class="text-center">  {{number_format($item['productInfo']->price_buy)}}</td>
                        <td class="text-center">
                            <input id="quanty-item-{{$item['productInfo']->id}}" class="form-control text-center" type="text" value="{{$item['quanty']}} ">
                        </td>
                        <td class="text-center">{{(number_format($item['price'])) }} đ</td>
                        <td class="text-center"><a ><i class="fas fa-save" onclick="SaveItemListCart({{$item['productInfo']->id}});"></i></a></td>
                        <td class="text-center"><a><i class="fas fa-trash" onclick="DeleteItemListCart({{$item['productInfo']->id}});"> </i> </a> </td>

                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <div class="col-md-3">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        @if (Session::has("Cart") != null)

                        <tr>
                            <th class="">Tổng số lượng</th>
                            <td class="text-center">{{Session::get('Cart')->totalQuanty}}</td>
                        </tr>
                        <tr>
                            <th class="">Tổng tiền</th>
                            <td class="text-center"> {{number_format(Session::get('Cart')->totalPrice,0)}}</td>
                        </tr>
                        @endif
                    </thead>
                </table>
            </div>
        </div>
      
    </div>
</div>

@endsection
@section('footer')
    <script>
function DeleteItemListCart(id){
    $.ajax({
     url:'Delete-Item-List-Cart/'+id,
    type:'GET',
     }).done(function(response){ 
    RenderListCart(response);
    alertify.success('Xóa thành công');
     });
}
function SaveItemListCart(id){
    $.ajax({
     url:'Save-Item-List-Cart/'+id+'/'+$("#quanty-item-"+id).val(),
    type:'GET',
     }).done(function(response){ 
    RenderListCart(response);
     alertify.success(' Cập nhật thành công');
     });
}
function RenderListCart(response){
       $("#list-cart").empty();
       $("#list-cart").html(response);
}

    </script>
@endsection
