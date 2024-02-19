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


{{-- Card  --}}
<div class="container" >
    <form class="d-flex">
        <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    <div class="row justify-content-center" style="display: flex">
      {{-- @foreach($posts->skip(1) as $post ) --}}
       <div class="col-md-3 m-3">
          <div class="card" >
             {{-- @if ($post->image) --}}
                 <img src="{{-- asset('storage/'.$post->image) --}}" class="img-fluid rounded" alt="{{-- $post->category->name --}}">
             {{-- @else --}}
             <img src="https://source.unsplash.com/300x200?{{-- $post->category->name --}}" class="card-img-top" alt="{{-- $post->category->name --}}">
             {{-- @endif --}}
                <div class="card-body text-center">
                   <h5 class="card-title">{{-- $post->title --}}</h5>
                   <p>
                        <small class="text-body-secondary">
                        By. <a href="{{-- /blog?author=$post->author->username --}}" class="text-decoration-none">{{-- $post->author->name --}}</a> {{-- $post->created_at->diffForHumans() --}}
                        </small>
                   </p>

                      <p class="card-text">{{-- $post->excerpt --}}</p>
                      <a href="{{-- /posts/$post->slug --}}"  class="btn btn-info text-white">Read more</a>
                </div>
          </div>
       </div>
       {{-- @endforeach --}}
    {{-- <div class="row"> --}}
      {{-- @foreach($posts->skip(1) as $post ) --}}
       <div class="col-md-3 m-3">
        <div class="card" >
             {{-- @if ($post->image) --}}
                 <img src="{{-- asset('storage/'.$post->image) --}}" class="img-fluid rounded" alt="{{-- $post->category->name --}}">
             {{-- @else --}}
             <img src="https://source.unsplash.com/300x200?{{-- $post->category->name --}}" class="card-img-top" alt="{{-- $post->category->name --}}">
             {{-- @endif --}}
                <div class="card-body text-center">
                   <h5 class="card-title">{{-- $post->title --}}</h5>
                   <p>
                        <small class="text-body-secondary">
                        By. <a href="{{-- /blog?author=$post->author->username --}}" class="text-decoration-none">{{-- $post->author->name --}}</a> {{-- $post->created_at->diffForHumans() --}}
                        </small>
                   </p>

                      <p class="card-text">{{-- $post->excerpt --}}</p>
                      <a href="{{-- /posts/$post->slug --}}"  class="btn btn-info text-white">Read more</a>
                </div>
          </div>
       </div>
       {{-- @endforeach --}}
    {{-- </div> --}}
    {{-- <div class="row"> --}}
      {{-- @foreach($posts->skip(1) as $post ) --}}
       <div class="col-md-3 m-3">
          <div class="card" >
             {{-- @if ($post->image) --}}
                 <img src="{{-- asset('storage/'.$post->image) --}}" class="img-fluid rounded" alt="{{-- $post->category->name --}}">
             {{-- @else --}}
             <img src="https://source.unsplash.com/300x200?{{-- $post->category->name --}}" class="card-img-top" alt="{{-- $post->category->name --}}">
             {{-- @endif --}}
                <div class="card-body text-center">
                   <h5 class="card-title">{{-- $post->title --}}</h5>
                   <p>
                        <small class="text-body-secondary">
                        By. <a href="{{-- /blog?author=$post->author->username --}}" class="text-decoration-none">{{-- $post->author->name --}}</a> {{-- $post->created_at->diffForHumans() --}}
                        </small>
                   </p>

                      <p class="card-text">{{-- $post->excerpt --}}</p>
                      <a href="{{-- /posts/$post->slug --}}"  class="btn btn-info text-white">Read more</a>
                </div>
          </div>
       </div>
       <div class="col-md-3 m-3">
          <div class="card" >
             {{-- @if ($post->image) --}}
                 <img src="{{-- asset('storage/'.$post->image) --}}" class="img-fluid rounded" alt="{{-- $post->category->name --}}">
             {{-- @else --}}
             <img src="https://source.unsplash.com/300x200?{{-- $post->category->name --}}" class="card-img-top" alt="{{-- $post->category->name --}}">
             {{-- @endif --}}
                <div class="card-body text-center">
                   <h5 class="card-title">{{-- $post->title --}}</h5>
                   <p>
                        <small class="text-body-secondary">
                        By. <a href="{{-- /blog?author=$post->author->username --}}" class="text-decoration-none">{{-- $post->author->name --}}</a> {{-- $post->created_at->diffForHumans() --}}
                        </small>
                   </p>

                      <p class="card-text">{{-- $post->excerpt --}}</p>
                      <a href="{{-- /posts/$post->slug --}}"  class="btn btn-info text-white">Read more</a>
                </div>
          </div>
       </div>
       <div class="col-md-3 m-3">
          <div class="card" >
             {{-- @if ($post->image) --}}
                 <img src="{{-- asset('storage/'.$post->image) --}}" class="img-fluid rounded" alt="{{-- $post->category->name --}}">
             {{-- @else --}}
             <img src="https://source.unsplash.com/300x200?{{-- $post->category->name --}}" class="card-img-top" alt="{{-- $post->category->name --}}">
             {{-- @endif --}}
                <div class="card-body text-center">
                   <h5 class="card-title">{{-- $post->title --}}</h5>
                   <p>
                        <small class="text-body-secondary">
                        By. <a href="{{-- /blog?author=$post->author->username --}}" class="text-decoration-none">{{-- $post->author->name --}}</a> {{-- $post->created_at->diffForHumans() --}}
                        </small>
                   </p>

                      <p class="card-text">{{-- $post->excerpt --}}</p>
                      <a href="{{-- /posts/$post->slug --}}"  class="btn btn-info text-white">Read more</a>
                </div>
          </div>
       </div>
       {{-- @endforeach --}}
    </div>

    {{-- </div> --}}
 </div>
@endsection
