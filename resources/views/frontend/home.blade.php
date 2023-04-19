@extends('layouts.site')
@section('title','Trang chủ')
    @section('content')
         <!---SLIDER-->
         <div class="mx-4">
          <x-slidershow/>
         </div>
    <div class="container">
        <!---PRODUCT LIST-->
        @foreach ($cat_home as $category)
        <div class="product-list" >
          <div class="product_title border-bottom">
         
            <strong class="text-danger">
             <h4>{{$category->name}} </h4>                 
            </strong>
          </div>
          <div class="product_list-s py-3">
            <div class="row">
              <x-home-product :category="$category"/>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    @endsection
