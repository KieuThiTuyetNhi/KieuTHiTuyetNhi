<div>
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
                     @foreach ($list_menu as $row_menu)
                     <li class="nav-item">
                        <a class="nav-link text-white" href="#">{{$row_menu->name}}</a>
                      </li>
                     @endforeach
                     
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
</div>