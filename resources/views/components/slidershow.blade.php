<section class="mymaincontent my-3">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-10">
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
                @foreach ($list_slider as $item)
                @if ($loop->first)
                   <div class="carousel-item active">
                  <img style="height:550px;"
                    src="{{ asset('images/slider/' . $item->image) }}"
                    class="w-100 img-fluid"
                    alt="{{$item->image}}"
                  />
                </div>
                @else
                    
                <div class="carousel-item">
                  <img style="height:550px;"
                    src="{{ asset('images/slider/' . $item->image) }}"
                    class="w-100 img-fluid"
                    alt="{{$item->image}}"
                  />
                </div>
                @endif
                
      
                @endforeach
                
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
        </div>
      </div>
      <div class="col-md-2 ">
        <h5>DANH MỤC SẢN PHẨM</h5>
        <x-nav-right/>

        <h5>THƯƠNG HIỆU</h5>
       <x-nav-brand/>

        
      </div>
      
    </div>
  </div>
</section>