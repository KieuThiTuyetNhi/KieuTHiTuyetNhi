@extends('layouts.site')
@section('title', $row_brand->name)
@section('content')

    <div class="container">
        <!---PRODUCT LIST-->

        <div class="product-list">
            <div class="product_title border-bottom">

                <strong class="text-danger">
                    <h4 class="mt-3">{{ $row_brand->name }} </h4>
                </strong>
            </div>
            <div class="product_list-s py-3">
                <div class="row">
                    @foreach ($list_pro as $pro)
                        @php
                            $arr_image = $pro->producthinh;
                            $hinh = 'hinh.png';
                            if (count($arr_image) > 0) {
                                $hinh = $arr_image[0]['image'];
                            }
                        @endphp
                        <div class="col-md-3 mb-3">
                            <img class="img-fluid" src="{{ asset('images/product/' . $hinh) }}" alt="{{ $hinh }}">
                            <h4 class="fs-5 text-truncate mt-2">
                                <a style="text-decoration: none; color:black;"
                                    href="{{ route('slug.home', ['slug' => $pro->slug]) }}">

                                    {{ $pro->name }}
                            </h4>
                            <h5> Giá bán:{{ number_format($pro->price_buy, 0) }} đ</h5>
                            {{-- <div class="product-star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-regular fa-star-half-stroke"></i>
                      <i class="fa-regular fa-star"></i>
                    </div> --}}
                            <div class="btn btn-danger text-white mt-2">
                                <i style="color: black;" class="fa-solid fa-cart-plus text-white"></i>
                                <a class="text-white text-decoration-none" onclick="AddCart({{ $pro->id }})"
                                    href="#">Thêm vào giỏ hàng</a>

                            </div>
                        </div>
                    @endforeach
                </div>
                <div>{{ $list_pro->links() }}</div>
            </div>
        </div>

    </div>
@endsection
