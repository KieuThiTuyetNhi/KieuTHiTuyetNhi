@extends('layouts.site')
@section('title', 'tim kiem')
@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <div class="section-product-category">
                    <h2 class="text-center category-title">Tìm kiếm</h2>
                    <div class="col-9">
                        <p class="pull-left">Đã tìm thấy {{ count($product) }} sản phẩm</p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row text-center">
                        @foreach ($product as $pro)
                    @php
           $arr_image=$pro->producthinh;
           $hinh = 'hinh.png';
           if(count($arr_image)>0)
           {
           $hinh=$arr_image[0]['image'];
           }
           @endphp
            <div class="col-md-3 mb-3">
                <img  href="{{route('slug.home',['slug'=>$pro->slug])}}"class="img-fluid" src="{{ asset('images/product/' . $hinh) }}"
                    alt="{{ $hinh }}">
                 <h4 class="fs-6 text-secondary">
                 <a style="text-decoration: none; color:black;" href="{{route('slug.home',['slug'=>$pro->slug])}}">
                        {{$pro->name}}
                </a>
        
                </h4>
                <h3>{{$pro->price}}</h3>
                <div class="product-star">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star-half-stroke"></i>
                <i class="fa-regular fa-star"></i>
             </div>
            <div class="btn  " >
                <i class="fa-solid fa-cart-plus"></i>
      <a style="text-decoration: none; color:black;"  onclick="AddCart({{$pro->id}})" href="javascript:" >Thêm vào giỏ hàng</a>

                </div>
            </div>
            @endforeach  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection