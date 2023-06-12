@extends('layouts.site')
@section('title', 'Gioi thieu')
@section('content')
    <div class="container">
        <h3>
            {{ $page->title }}
        </h3>
        <div class="col-md-12 mt-3">
            <div class="row">
                <div class="col-md-3">
                    <img class="img-fluid" src="{{ asset('images/page/' . $page->image) }}" alt="{{ $page->image }}">
                </div>
                <div class="col-md-9">
                    <p>{!!$page->detail !!}</p>
                </div>
            </div>

        </div>
    </div>
@endsection
