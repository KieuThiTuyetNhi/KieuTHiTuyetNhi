@extends('layouts.site')
@section('title',$product->name)
@section('content')
<div class="container">
  @php
  $arr_image=$product->producthinh;
  $hinh = 'hinh.png';
  if(count($arr_image)>0)
  {
  $hinh=$arr_image[0]['image'];
  }
  @endphp
    <div class="col-md-12">
        <div class="row">
          
          <div class="col-md-6">
            <img  style="width:90%"  class="mt-4 mb-4" src="{{ asset('images/product/' . $hinh) }}"
      alt="{{ $hinh }}">
          </div>
          <div class="col-md-6">
           <h1 class="mt-4">{{$product->name}}</h1>
           <h2>{{$product->price}}</h2>
           <h3>{{$product->brandname}}</h3>
           <div class="product-star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star-half-stroke"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <h4>Chi tiết sản phẩm</h4> <br>

          {{$product->detail}}<br>
         
          <a  href="{{route('slug.home',['slug'=>$product->slug])}}" class="btn mt-3">Thêm vào giỏ hàng</a>

          </div>
          
          </div>
        </div>
</div>
    
@endsection
  