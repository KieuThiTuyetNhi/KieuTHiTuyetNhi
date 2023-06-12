<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/layoutsite.css') }}" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .header-icon {
            transition: all .4s;
        }

        .header-icon:hover {
            color: red !important;
        }
    </style>
    @yield('header')
</head>

<body>
    <!-- HEADER -->
    <section class="myheader ">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-3 my-auto">
                    <a href="{{ route('site.home') }}">
                        <img style="height: 140px;" src="images/logo.jpg" class="img-fluid " alt="logo" />
                    </a>
                </div>
                <div class="col-md-4 my-auto">
                    <form action="{{ route('site.timkiem') }}" method="GET">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Từ khóa tìm kiếm"
                                aria-label="Từ khóa tìm kiếm" aria-describedby="basic-addon2" />
                            <button class="input-group-text" id="basic-addon2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 my-auto">
                    <div class="row">
                        <div class="col-6 d-flex gap-2 align-items-center">
                            <div class="fs-3">
                                <i class="fa-solid fa-phone text-dark header-icon"></i>
                            </div>
                            <div>
                                <span class="d-block">Tư vấn hỗ trợ</span>
                                <strong>0352219491</strong>
                            </div>
                        </div>
                        <div class="col-6 d-flex gap-2 align-items-center">
                            <div class="fs-3 text-danger">
                                <a href="{{ route('site.login') }}">
                                    <i class="fa-solid fa-user text-dark header-icon"></i>
                                </a>
                            </div>
                            <div>
                                @if (Auth::check())
                                    <span> Xin chào! <br>
                                        <strong>{{ Auth::user()->name }}</strong> </span>
                                @else
                                    <strong class="my_size">Đăng nhập</strong>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 my-auto">
                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="position-relative">
                                <span class="fs-3">
                                    <strong class="my_size">
                                        <a style="text-decoration: none; color:black; font-size: 38px;"
                                            href="{{ route('site.logout') }}">
                                            <i class="fa fa-sign-out header-icon" aria-hidden="true"></i>
                                        </a>
                                    </strong>
                                </span>
                            </a>
                        </div>

                        <div class="col-6">
                            <div class="position-relative d-inline-block">
                                <span class="fs-3">
                                    <i style="font-size: 40px;" class="fa-solid fa-bag-shopping mt-1 header-icon"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                                    @if (Session::has('Cart') != null)
                                        <span id="total-quanty-show"
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            {{ Session::get('Cart')->totalQuanty }}
                                        </span>
                                    @else
                                    @endif
                                    <!-- Button trigger modal -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Giỏ hàng</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="change-item-cart">
                                                        @if (Session::has('Cart') != null)
                                                            <table class="table table-bordered" id="myTable">
                                                                <tbody>
                                                                    @foreach (Session::get('Cart')->products as $item)
                                                                        @php
                                                                            // $arr_image = $item['productInfo']->producthinh;
                                                                            $hinh = 'hinh.png';
                                                                            // if (count($arr_image) > 0) {
                                                                            //     $hinh = $arr_image[0]['image'];
                                                                            // }
                                                                        @endphp

                                                                        <tr>
                                                                            <td>
                                                                                <img style="width:100px; height=100px;"
                                                                                    src="{{ asset('images/product/' . $hinh) }}"
                                                                                    class="img-fluid"
                                                                                    alt="{{ $hinh }}" />
                                                                            </td>
                                                                            <td style="font-size: 20px">
                                                                                <span>{{ $item['productInfo']->name }}</span>
                                                                                <br>
                                                                                <span>{{ $item['quanty'] }} x
                                                                                    {{ number_format($item['productInfo']->price_buy) }}</span>
                                                                            </td>
                                                                            <td class="si-close">

                                                                                <button style="font-size: 20px"
                                                                                    type="button" class="btn-close"
                                                                                    data-id="{{ $item['productInfo']->id }}"></button>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach

                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>
                                                                            <h6>
                                                                                Tổng tiền
                                                                            </h6>
                                                                        </th>
                                                                        <td>
                                                                            <input hidden id="total-quanty-cart"
                                                                                type="number"
                                                                                value="{{ Session::get('Cart')->totalQuanty }}">
                                                                            {{ number_format(Session::get('Cart')->totalPrice, 0) }}
                                                                        </td>
                                                                    </tr>

                                                                </tfoot>
                                                            </table>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary"
                                                        href="{{ route('site.giohang') }}">Xem giỏ hàng
                                                    </a>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('dathang.index') }}">Thanh
                                                        toán</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                        </div>
                        </span>
                    </div>
                </div>
                {{-- <div class="col">
                                <a href="#" class="position-relative">
                                    <span class="fs-3">
                                        <i class="fa-solid fa-power-off"></i>
                                    </span>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                    >
                                        0
                                    </span>
                                </a>
                            </div> --}}
            </div>
        </div>
        </div>
        </div>
    </section>
    <!---MENU--->
    <x-main-menu />
    <!---CONTENT-->

    @yield('content')
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Chào mừng bạn đã đến với chúng tôi:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            {{-- <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
            </div> --}}
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    {{-- <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>CHÚNG TÔI Ở ĐÂY
                        </h6>
                        <p>
                            Để có được chiếc áo dài ưng ý thì việc lựa chọn
                            vải áo dài không nên qua loa, shop chúng tôi
                            chuyên cung cấp tất cả các mẫu vải áo dài đẹp từ
                            bình dân đến cao cấp, vải áo dài học sinh, vải
                            áo dài đám cưới, vải áo dài cách tân, …với nhiều
                            chất liệu như vải áo dài lụa, vải áo dài nhung
                            gấm… nhiều họa tiết bắt mắt.
                        </p>
                    </div> --}}
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <x-footer-menu />

                    <!-- Grid column -->

                    <!-- Grid column -->
                    {{-- <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Liên hệ</h6>
                        <p>
                            <i class="fas fa-home me-3"></i>phường Phước
                            Long B,thành phố Thủ Đức,tp HCM,Việt Nam
                        </p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            tuyetnhi.vtbth@gmail.com
                        </p>
                        <p>
                            <i class="fas fa-phone me-3"></i> + 0352219491
                        </p>
                        <p>
                            <i class="fas fa-print me-3"></i> + 01 234 567
                            89
                        </p>
                    </div> --}}
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->
    </footer>
    <!-- Footer -->


    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dd.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    {{-- <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>  --}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>



    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <script>
        function AddCart(id) {
            $.ajax({
                url: 'Add-Cart/' + id,
                type: 'GET',
            }).done(function(response) {
                RenderCart(response);
                alertify.success('Thêm thành công');
            });
        }
        $("#change-item-cart").on("click", ".si-close .btn-close ", function() {
            $.ajax({
                url: ' Delete-Item-Cart/' + $(this).data("id"),
                type: 'GET',
            }).done(function(response) {
                RenderCart(response);
                alertify.success('Đã xóa thành công');
            });
        });

        function RenderCart(response) {
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
            $("#total-quanty-show").text($("#total-quanty-cart").val());

        }
    </script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('footer')
</body>

</html>
