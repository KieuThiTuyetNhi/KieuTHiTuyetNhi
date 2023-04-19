@extends('layouts.site')
@section('title','Trang chủ')
    @section('content')
        
    <div class="container">
        <!---PRODUCT LIST-->
       
        <div class="product-list" >
          <div class="product_title border-bottom">
         
            <strong class="text-danger">
             <h4>{{$row_category->name}} </h4>                 
            </strong>
          </div>
          <div class="product_list-s py-3">
            <div class="row">
                @foreach ($list_pro as $pro)
                <div class="col-md-3 mb-3">
                  <img class="img-fluid" src="{{ asset('public/image/product/' . $pro->image) }}"
                  alt="{{ $pro->image }}">
                    <h4 class="fs-6 text-secondary">
                        {{$pro->name}}
                    </h4>
                    <h3>{{$pro->price}}</h3>
                    <div class="product-star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                    </div>
                    <a href="#" class="btn">Thêm vào giỏ hàng</a>
                  </div>
                @endforeach
            </div>
          </div>
        </div>
     
      </div>
    @endsection
