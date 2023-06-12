@extends('layouts.site')
@section('title', 'Đăng nhập')
@section('content')
    <style>
    </style>
    <div style="max-width: 500px;" class="mx-auto border shadow mt-3 p-4">
        <h2 class="text-center mb-3">ĐĂNG NHẬP</h2>
        <form class="dangky" action="{{ route('site.login') }}" method="post" accept-charset="utf-8">
            @csrf
            @includeIf('frontend.massage_alert')
            <input type="text" name="username" class="form-control" placeholder="Nhập tên người dùng"><br />
            @if ($errors->any())
                {{ $errors->first('name') }}
            @endif
            <input type="password" name="password" class="form-control " placeholder="Nhập mật khẩu"><br />
            @if ($errors->any())
                {{ $errors->first('password') }}
            @endif
            <div class="d-flex justify-content-center flex-column gap-2 w-75 mx-auto">
                <button class="btn btn-primary w-100" type="submit">ĐĂNG NHẬP</button>
                <a class="btn btn-dark w-100" href="{{ route('login.xulidangky') }}">ĐĂNG KÝ</a>
            </div>
        </form>
    </div>
@endsection
