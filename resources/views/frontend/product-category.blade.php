@extends('layouts.site')
@section('title',$row_category->name)
    @section('content')
        
    <div class="container">
        <!---PRODUCT LIST-->
       
        <div class="product-list" >
          <div class="product_title border-bottom">
         
            <strong class="text-danger">
             <h4 class="mt-3">{{$row_category->name}} </h4>                 
            </strong>
          </div>
          <div class="product_list-s py-3">
            <div class="row">
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
                  <img class="img-fluid" src="{{ asset('images/product/' . $hinh) }}"
                  alt="{{ $hinh }}">
                    <h4 class="fs-6 text-secondary mt-2">
                        {{$pro->name}}
                    </h4>
                    <h3>{{$pro->price}}</h3>
                    <div class="product-star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-regular fa-star-half-stroke"></i>
                      <i class="fa-regular fa-star"></i>
                    </div>
                    <a href="#" class="btn">Thêm vào giỏ hàng</a>
                  </div>
                @endforeach
            </div>
            <div>{{$list_pro->links()}}</div>
          </div>
        </div>
     
      </div>
    @endsection
