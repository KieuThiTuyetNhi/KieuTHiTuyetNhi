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
      <section class="mymainmenu bg-danger">
        <div class="container">
          <div class="row">
            <div class="col-md-3 text-white my-3">Danh mục sản phẩm</div>
            <div class="col-md-9">
              <nav class="navbar navbar-expand-lg bg-danger">
                <div class="container-fluid">
                  <a class="navbar-brand d-none" href="#">Navbar</a>
                  <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                  >
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                  >
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a
                          class="nav-link text-white active"
                          aria-current="page"
                          href="#"
                          >Trang chủ</a
                        >
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="#">Giới thiệu</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a
                          class="nav-link text-white dropdown-toggle"
                          href="#"
                          role="button"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                        >
                          Sản phẩm
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li>
                            <a class="dropdown-item" href="#">Another action</a>
                          </li>
                          <li><hr class="dropdown-divider" /></li>
                          <li>
                            <a class="dropdown-item" href="#"
                              >Something else here</a
                            >
                          </li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white disabled">Tin tức</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white disabled">Liên hệ</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <!---CONTENT-->
      <section class="mymaincontent my-3">
        <div class="container">
          <!---SLIDER-->
          <div class="slider">
            <div id="carouselExampleIndicators" class="carousel slide">
              <div class="carousel-indicators">
                <button
                  type="button"
                  data-bs-target="#carouselExampleIndicators"
                  data-bs-slide-to="0"
                  class="active"
                  aria-current="true"
                  aria-label="Slide 1"
                ></button>
                <button
                  type="button"
                  data-bs-target="#carouselExampleIndicators"
                  data-bs-slide-to="1"
                  aria-label="Slide 2"
                ></button>
                <button
                  type="button"
                  data-bs-target="#carouselExampleIndicators"
                  data-bs-slide-to="2"
                  aria-label="Slide 3"
                ></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                    src="images/slider1.jpg"
                    class="w-100 img-fluid"
                    alt="..."
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="images/slider2.jpg"
                    class="w-100 img-fluid"
                    alt="..."
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="images/slider3.jpg"
                    class="w-100 img-fluid"
                    alt="..."
                  />
                </div>
              </div>
              <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next"
              >
                <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <!---PRODUCT LIST-->
          <div class="product-list-mb-3">
            <div class="product_title border-bottom">
              <strong class="text-danger">THỜI TRANG</strong>
            </div>
            <div class="product_list-s py-3">
              <div class="row">
                <div class="col-md-3 mb-3">
                  <img
                    src="images/sanpham1.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">Vải áo dài hoa văn lá trúc</h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/sanpham2.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">Vải áo dài hoa văn hoa sen</h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/sanpham3.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài hoa văn hoa mẫu đơn
                  </h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/sanpham4.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài hoa văn hoa phượng vỉ
                  </h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/sanpham5.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài hoa văn phong cảnh
                  </h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/sanphan6.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài in hoa văn phong cảnh
                  </h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/sanpham7.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">Vải áo dài hoa văn hoa sen</h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/sanpham8.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài hoa văn hoa mẫu đơn
                  </h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
              </div>
            </div>
          </div>
          <div class="product-list-mb-3">
            <div class="product_title border-bottom">
              <strong class="text-danger">CHẤT LIỆU VẢI LỤA HÀN</strong>
            </div>
            <div class="product_list-s py-3">
              <div class="row">
                <div class="col-md-3 mb-3">
                  <img
                    src="images/luahan1.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">Vải áo dài hoa văn hoa ly</h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/luahan2.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">Áo dài hoa văn hoa bách hợp</h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/luahan3.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">Vải áo dài in hoa văn nổi</h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/luahan4.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài hoa văn hoa bách hợp
                  </h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
              </div>
            </div>
          </div>
          <div class="product-list-mb-3">
            <div class="product_title border-bottom">
              <strong class="text-danger">CHẤT LIỆU VẢI LỤA NHẬT</strong>
            </div>
            <div class="product_list-s py-3">
              <div class="row">
                <div class="col-md-3 mb-3">
                  <img
                    src="images/luanhat1.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài hoa văn hoa mẫu đơn
                  </h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/luanhat2.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài hoa văn hoa anh đào
                  </h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/luanhat3.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài hoa văn hoa anh đào
                  </h4>
                  <h3>100.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/luanhat4.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài hoa văn hoa anh đào
                  </h4>
                  <h3>100.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
              </div>
            </div>
          </div>
          <div class="product-list-mb-3">
            <div class="product_title border-bottom">
              <strong class="text-danger">CHẤT LIỆU VẢI LỤA ĐÔNG HƯNG</strong>
            </div>
            <div class="product_list-s py-3">
              <div class="row">
                <div class="col-md-3 mb-3">
                  <img
                    src="images/luadonghung1.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài hoa văn chim công
                  </h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/luadonghung2.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài hoa văn chim công
                  </h4>
                  <h3>100.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/luadonghung3.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">Vải áo dài hoa văn nôi</h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img
                    src="images/luadonghung4.jpg"
                    alt="sanpham1"
                    class="img-fluid"
                  />
                  <h4 class="fs-6 text-secondary">Áo dài hoa văn hoa sen</h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
              </div>
            </div>
          </div>
          <div class="product-list-mb-3">
            <div class="product_title border-bottom">
              <strong class="text-danger">VẢI HỌA TIẾT HOA SEN</strong>
            </div>
            <div class="product_list-s py-3">
              <div class="row">
                <div class="col-md-3 mb-3">
                  <img src="images/sen1.jpg" alt="sanpham1" class="img-fluid" />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài hoa tiết hoa sen 3D
                  </h4>
                  <h3>299.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img src="images/sen2.jpg" alt="sanpham1" class="img-fluid" />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài hoa tiết hoa sen 3D
                  </h4>
                  <h3>299.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img src="images/sen3.jpg" alt="sanpham1" class="img-fluid" />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài hoa tiết hoa sen 3D
                  </h4>
                  <h3>299.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img src="images/sen4.jpg" alt="sanpham1" class="img-fluid" />
                  <h4 class="fs-6 text-secondary">
                    Vải áo dài hoa tiết hoa sen 3D
                  </h4>
                  <h3>299.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img src="images/sen5.jpg" alt="sanpham1" class="img-fluid" />
                  <h4 class="fs-6 text-secondary">Áo dài họa tiết hoa sen 2D</h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img src="images/sen6.jpg" alt="sanpham1" class="img-fluid" />
                  <h4 class="fs-6 text-secondary">Áo dài họa tiết hoa sen 2D</h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img src="images/sen7.jpg" alt="sanpham1" class="img-fluid" />
                  <h4 class="fs-6 text-secondary">Áo dài họa tiết hoa sen 2D</h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
                <div class="col-md-3 mb-3">
                  <img src="images/sen8.jpg" alt="sanpham1" class="img-fluid" />
                  <h4 class="fs-6 text-secondary">Áo dài họa tiết hoa sen 2D</h4>
                  <h3>199.000</h3>
                  <div class="product-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <a href="#" class="btn">Thêm vào giỏ hàng</a>
                </div>
              </div>
            </div>
          </div>
        </div>
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