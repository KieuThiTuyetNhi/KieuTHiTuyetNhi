<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/layoutsite.css')}}">

    @yield('header')
</head>
<body>
     <!-- HEADER -->
     <section class="myheader">
        <div class="container py-3">
          <div class="row">
            <div class="col-md-3">
              <img src="images/nhi.jpg" class="img-fruit" alt="" />
            </div>
            <div class="col-md-4">
              <div class="input-group mb-3">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Từ khóa tìm kiếm"
                  aria-label="Recipient's username"
                  aria-describedby="basic-addon2"
                />
                <span class="input-group-text" id="basic-addon2">
                  <i class="fa-solid fa-magnifying-glass"> </i
                ></span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="row">
                <div class="col">
                  <div class="row">
                    <div class="col-3">
                      <div class="fs-3 text-danger">
                        <i class="fa-solid fa-phone"></i>
                      </div>
                    </div>
                    <div class="col-9">
                      tư vấn hỗ trợ <br />
                      <strong>0352219491</strong>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="row">
                    <div class="col-3">
                      <div class="fs-3 text-danger">
                        <i class="fa-solid fa-user"></i>
                      </div>
                    </div>
                    <div class="col-9">
                      Xin chào <br />
                      <strong>Đăng nhập</strong>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="row">
                <div class="col">
                  <a href="#" class="position-relative">
                    <span class="fs-3">
                      <i class="fa-regular fa-heart"></i>
                    </span>
                    <span
                      class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                    >
                      0
                      <span class="visually-hidden">unread messages</span>
                    </span>
                  </a>
                </div>
                <div class="col">
                  <a href="#" class="position-relative">
                    <span class="fs-3">
                      <i class="fa-solid fa-bag-shopping"></i>
                    </span>
                    <span
                      class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                    >
                      0
                    </span>
                  </a>
                </div>
                <div class="col">
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!---MENU--->
      <x-main-menu/>
      <!---CONTENT-->
      <section class="mymaincontent my-3">
      @yield('content')
      </section>
      <div class="about" id="ABOUT">
        <h1>Áo Dài <span>Thiết Kế</span></h1>
        <div class="about_main">
          <div class="about_image">
            <div class="about_small_image">
              <img src="images/about1.jpg" alt="" class="img-fluid" />
              <img src="images/about2.jpg" alt="" class="img-fluid" />
              <img src="images/about3.jpg" alt="" class="img-fluid" />
              <img src="images/about4.jpg" alt="" class="img-fluid" />
            </div>
          </div>
        </div>
        <a href="#" class="about_btn">Về</a>
        <script>
          function functio(small) {
            var full = document.getElementById("imagebox");
            full.src = small.src;
          }
        </script>
      </div>
      <!----FOOTER-->
      <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section
          class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
        >
          <!-- Left -->
          <div class="me-5 d-none d-lg-block">
            <span>Chào mừng bạn đã đến với chúng tôi:</span>
          </div>
          <!-- Left -->
  
          <!-- Right -->
          <div>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-google"></i>
            </a>
          </div>
          <!-- Right -->
        </section>
        <!-- Section: Social media -->
  
        <!-- Section: Links  -->
        <section class="">
          <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
              <!-- Grid column -->
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <!-- Content -->
                <h6 class="text-uppercase fw-bold mb-4">
                  <i class="fas fa-gem me-3"></i>CHÚNG TÔI Ở ĐÂY
                </h6>
                <p>
                  Để có được chiếc áo dài ưng ý thì việc lựa chọn vải áo dài không
                  nên qua loa, shop chúng tôi chuyên cung cấp tất cả các mẫu vải
                  áo dài đẹp từ bình dân đến cao cấp, vải áo dài học sinh, vải áo
                  dài đám cưới, vải áo dài cách tân, …với nhiều chất liệu như vải
                  áo dài lụa, vải áo dài nhung gấm… nhiều họa tiết bắt mắt.
                </p>
              </div>
              <!-- Grid column -->
  
              <!-- Grid column -->
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">Các sản phẩm</h6>
                <p>
                  <a href="#!" class="text-decoration-none text-secondary"
                    >Vải lụa Hàn</a
                  >
                </p>
                <p>
                  <a href="#!" class="text-decoration-none text-secondary"
                    >Vải lụa Đông HƯng</a
                  >
                </p>
                <p>
                  <a href="#!" class="text-decoration-none text-secondary"
                    >Vải lụa Nhật</a
                  >
                </p>
                <p>
                  <a href="#!" class="text-decoration-none text-secondary"
                    >Nhiều chất liệu khác</a
                  >
                </p>
              </div>
              <!-- Grid column -->
  
              <!-- Grid column -->
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">Chia sẻ kinh nghiệm</h6>
                <p>
                  <a href="#!" class="text-decoration-none text-secondary"
                    >Cách chọn áo dài lễ tết</a
                  >
                </p>
                <p>
                  <a href="#!" class="text-decoration-none text-secondary"
                    >Cách phối màu vải đẹp</a
                  >
                </p>
                <p>
                  <a href="#!" class="text-decoration-none text-secondary"
                    >Cách phân biệt chất liệu vải</a
                  >
                </p>
                <p>
                  <a href="#!" class="text-decoration-none text-secondary"
                    >Sự hỗ trợ</a
                  >
                </p>
              </div>
              <!-- Grid column -->
  
              <!-- Grid column -->
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">Liên hệ</h6>
                <p>
                  <i class="fas fa-home me-3"></i>phường Phước Long B,thành phố
                  Thủ Đức,tp HCM,Việt Nam
                </p>
                <p>
                  <i class="fas fa-envelope me-3"></i>
                  tuyetnhi.vtbth@gmail.com
                </p>
                <p><i class="fas fa-phone me-3"></i> + 0352219491</p>
                <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
              </div>
              <!-- Grid column -->
            </div>
            <!-- Grid row -->
          </div>
        </section>
        <!-- Section: Links  -->
      </footer>
      <!-- Footer -->
      <script src="js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    @yield('footer')
</body>
</html>