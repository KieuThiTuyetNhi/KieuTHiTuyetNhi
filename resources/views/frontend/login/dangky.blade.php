<!DOCTYPE html>
<html>

<head>
    <title>Đăng ký tài khoản</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div style="height: 100vh;" class="d-flex justify-content-center align-items-center flex-column">
        <div style="width: 500px" class="border rounded-3 p-3">
            <div class="panel-heading">
                <h2 class="text-center">Thông tin đăng ký tài khoản</h2>
            </div>
            <form action="{{ route('login.xulidangky') }}" method="post">
                @method('POST')
                @csrf
                <div class="panel-body">
                    <div class="form-group">
                        <label for="usr">Họ và tên</label>
                        <input required="true" name="name" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="email">Địa chỉ gmail</label>
                        <input required="true" name="email" type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="usr">Tài khoản người dùng</label>
                        <input required="true" name="username" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="usr">Số điện thoại</label>
                        <input required="true" name="phone" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mật khẩu</label>
                        <input required="true" type="password" name="password" class="form-control" id="pwd">
                    </div>
                    {{-- <div class="form-group">
          <label for="confirmation_pwd">Confirmation Password:</label>
          <input required="true" type="password" class="form-control" id="confirmation_pwd">
        </div> --}}
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" id="address">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <button class="btn btn-success mb-2">ĐĂNG KÝ</button>
                        <a class="btn btn-primary" href="{{ route('site.postlogin') }}">ĐĂNG NHẬP</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
