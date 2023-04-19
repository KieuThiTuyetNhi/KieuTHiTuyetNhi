@foreach ($list_pro as $pro)
<div class="col-md-3 mb-3">
  <img  href="{{route('slug.home',['slug'=>$pro->slug])}}"class="img-fluid" src="{{ asset('public/image/product/' . $pro->image) }}"
  alt="{{ $pro->image }}">
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
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
    </div>
    <a href="{{route('slug.home',['slug'=>$pro->slug])}}" class="btn">Thêm vào giỏ hàng</a>
  </div>
@endforeach  