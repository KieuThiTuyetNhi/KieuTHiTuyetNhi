


@extends('layouts.site')
@section('title', 'tất cả sản phẩm')
@section('content')
    <div class="container">
        <div class="row my-3">
            @foreach ($list_pro as $pro)
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
    <h5> Giá bán:{{number_format($pro->price_buy,0)}} đ</h5>
    {{-- <div class="product-star">
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-regular fa-star-half-stroke"></i>
      <i class="fa-regular fa-star"></i>
    </div> --}}
    <div class="btn mt-4 " >
      <i class="fa-solid fa-cart-plus"></i>
      <a style="text-decoration: none; color:black;"  onclick="AddCart({{$pro->id}})" href="javascript:" >Thêm vào giỏ hàng</a>

    </div>
  </div>
@endforeach  
        </div>
        <div>{{$list_pro->links()}}</div>

    </div>
      
    
    
@endsection