@foreach ($list_pro as $pro)
    @php
        $arr_image = $pro->producthinh;
        $hinh = 'hinh.png';
        if (count($arr_image) > 0) {
            $hinh = $arr_image[0]['image'];
        }
    @endphp
    <div class="col-md-3 mb-3" title="{{ $pro->name }}">
        <img href="{{ route('slug.home', ['slug' => $pro->slug]) }}"class="img-fluid"
            src="{{ asset('images/product/' . $hinh) }}" alt="{{ $hinh }}">
        <h4 class="fs-5 mt-2 text-truncate">
            <a class="text-decoration-none" style="color: black" href="{{ route('slug.home', ['slug' => $pro->slug]) }}">
                {{ $pro->name }}

            </a>

        </h4>
        <h5> Giá bán:{{ number_format($pro->price_buy, 0) }} đ</h5>
        {{-- <div class="product-star">
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-regular fa-star-half-stroke"></i>
      <i class="fa-regular fa-star"></i>
    </div> --}}
        <div class="btn mt-4 btn-danger">
            <i class="fa-solid fa-cart-plus text-white"></i>
            <a class="text-white" style="text-decoration: none; color:black;" onclick="AddCart({{ $pro->id }})"
                href="javascript:">Thêm vào giỏ hàng</a>
        </div>
    </div>
@endforeach
