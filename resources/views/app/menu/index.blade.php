@extends('layouts.app')

@section('after_css')
    <link rel="stylesheet"
        href="{{ asset('assets/templates/metronic/dist/assets/plugins/custom/datatables/datatables.bundle.css') }}">
@endsection

@section('content_header')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
        <!--begin::Title-->
        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
            {{ $header }}
        </h1>
        <!--end::Title-->

        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
                <a href="{{ $main_breadcrumb_link }}" class="text-muted text-hover-primary">
                    {{ $main_breadcrumb }} </a>
            </li>
            <!--end::Item-->
            @if ($breadcrumb)
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-500 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    {{ $breadcrumb }} </li>
                <!--end::Item-->
            @endif
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-3">
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    <a href="{{ route('menu.cart') }}"><button class="btn btn-secondary mx-2"><i
                                class="fa-solid fa-cart-shopping" style="width: 18px"></i>(0)</button></a>
                </div>
            </div>
            <div class="col-md-3">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Card  --}}
    <div class="container">
        <div class="row justify-content-center" style="display: flex">
            @foreach ($product as $item)
                <div class="col-md-3 m-1">
                    <div class="card">
                        {{-- @if ($post->image) --}}
                        <img src="{{-- asset('storage/'.$post->image) --}}" class="img-fluid rounded" alt="{{-- $post->category->name --}}">
                        {{-- @else --}}
                        <img src="https://source.unsplash.com/300x200?{{-- $post->category->name --}}" class="card-img-top"
                            alt="{{-- $post->category->name --}}">
                        {{-- @endif --}}
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $item->store->store_name }}</h5>
                            <p>
                                <small class="text-body-secondary">
                                    By. <a href="{{-- /blog?author=$post->author->username --}}"
                                        class="text-decoration-none">{{-- $post->author->name --}}</a> {{-- $post->created_at->diffForHumans() --}}
                                </small>
                            </p>

                            <p class="card-text">{{-- $post->excerpt --}}</p>
                            <a href="{{-- /posts/$post->slug --}}" class="btn btn-info btn-sm text-white">Add</a>
                        </div>
                    </div>
                </div>
            @endforeach



            {{-- </div> --}}
        </div>
    @endsection
