@extends('layouts.site') @section('title','thanh toán') @section('content')
      <div class="container">
        <h2 class="text-center">Xin chao! {{Auth::user()->name;}} </h2>
      <p>Chân thành cảm ơn bạn đã liên hệ và đặt hàng tại shop của chúng tôi.
        Chúng tôi sẽ thực hiện đơn hàng và giao đến bạn trong thời gian sơm nhất!</p>
      </div>
@endsection
