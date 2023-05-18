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
      <a style="text-decoration: none" href="{{route('slug.home',['slug'=>$pro->slug])}}">
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
    <a href="#" class="btn">Thêm vào giỏ hàng</a>
  </div>
@endforeach  