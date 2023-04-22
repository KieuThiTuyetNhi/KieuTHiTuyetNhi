@extends('layouts.site')
@section('title',$product->name)
@section('content')
<div class="container">
 
    <div class="col-md-12">
        <div class="row">
          
          <div class="col-md-6">
            <img  style="width:90%"  class="mt-4 mb-4" src="{{ asset('public/image/product/' . $product->image) }}"
      alt="{{ $product->image }}">
          </div>
          <div class="col-md-6">
           <h1 class="mt-4">{{$product->name}}</h1>
           <h2>{{$product->price}}</h2>
           
           <div class="product-star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          Chi tiết sản phẩm <br>

          {{$product->detail}}<br>
          
          <a href="{{route('slug.home',['slug'=>$product->slug])}}" class="btn">Thêm vào giỏ hàng</a>

          </div>
          
          </div>
        </div>
</div>
    
@endsection
  