@extends('layouts.site')
@section('title','Liên hệ')
@section('header')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css')}}" type="text/css">
    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css')}}" type="text/css">
@endsection
@section('footer')
<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('vendor/popperjs/popper.min.js')}}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Custom script - Các file js do mình tự viết -->
<script src="{{ asset('assets/js/app.js')}}"></script>
@endsection
    @section('content')
   

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-2">
            <h1 class="text-center">Liên hệ cho chúng tôi</h1>
            <div class="row">
                <div class=" col-md-6">
                    <img src="{{ asset('assets/img/marketing/marketing-1.png')}}">
                </div>
                <div class="col-md-6">
                    <form method="post" action="{{route('contact.xuly')}}">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="name" class="form-control" id="name" name="name"
                                placeholder="Họ và đầy đủ">
                        </div>
                        <div class="form-group">
                            <label for="email">Email của bạn</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email của bạn">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại của bạn</label>
                            <input type="phone" class="form-control" id="phone" name="phone"
                                placeholder="Số diện thoại của bạn">
                        </div>
                        <div class="form-group">
                            <label for="title">Tiêu đề của bạn</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Tiêu đề của bạn">
                        </div>
                        <div class="form-group">
                            <label for="content">Lời nhắn của bạn</label>
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                        <button class="btn btn-primary" name="btnGoiLoiNhan">Gởi lời nhắn</button>
                    </form>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col col-md-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.7235485722294!2d105.78061631523369!3d10.039656175103817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a062a768a8090b%3A0x4756d383949cafbb!2zMTMwIFjDtCBWaeG6v3QgTmdo4buHIFTEqW5oLCBBbiBI4buZaSwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1556697525436!5m2!1svi!2s"
                        width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
        <!-- End block content -->
    </main>
    @endsection