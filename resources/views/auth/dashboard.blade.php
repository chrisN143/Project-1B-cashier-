@extends('layouts.app')

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
    
    <div class="row g-5 gx-xl-10 mb-5 mb-xl-10 ">
        <!--begin::Col-->
        <div class="col-md-3">
            <!--begin::Card widget 7-->
            <div class="card card-flush bg-primary bg-gradient">
                <!--begin::Header-->
                <div class="card-header py-4">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column ">
                        <!--begin::Amount-->
                        <span class="text-light fw-semibold fs-2">Users</span>
                        <span class="fs-2hx fw-bold text-light lh-1 ls-n2">{{ $total_user }}</span>
                        <span class="text-light fw-semibold fs-6">Created At</span>
                        <!--end::Amount-->
                        
                        <!--begin::Subtitle-->
                        <!--end::Subtitle-->
                    </div>
                    <span class="float-right display-5 bg-opacity-25"><i class="fa-solid fa-cart-shopping fs-1 text-light"></i></span>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 7-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-3">
            <!--begin::Card widget 7-->
            <div class="card card-flush bg-warning bg-gradient">
                <!--begin::Header-->
                <div class="card-header py-4">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="text-light fw-semibold fs-2">Roles</span>
                        <span class="fs-2hx fw-bold text-light me-2 lh-1 ls-n2">{{ $total_role }}</span>
                        <span class="text-light fw-semibold fs-6">Created At</span>
                        <!--end::Amount-->
                        <!--begin::Subtitle-->
                        <!--end::Subtitle-->
                    </div>
                    <span class="float-right display-5 bg-opacity-25"><i class="fa-solid fa-cart-shopping fs-1 text-light"></i></span>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 7-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-3">
            <!--begin::Card widget 7-->
            <div class="card card-flush bg-success bg-gradient">
                <!--begin::Header-->
                <div class="card-header py-4">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="text-light  fw-semibold fs-2">Permissions</span>
                        <span class="fs-2hx fw-bold text-light lh-1 ls-n2">{{ $total_permission }}</span>
                        <span class="text-light fw-semibold fs-6">Created At</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <!--end::Subtitle-->
                    </div>
                    <span class="float-right display-5 bg-opacity-25"><i class="fa-solid fa-cart-shopping fs-1 text-light"></i></span>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 7-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-3">
            <!--begin::Card widget 7-->
            <div class="card card-flush bg-danger bg-gradient">
                <!--begin::Header-->
                <div class="card-header py-4">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">
                        <!--begin::Amount-->
                        <span class="text-light  fw-semibold fs-2">Permissions</span>
                        <span class="fs-2hx fw-bold text-light lh-1 ls-n2">{{ $total_permission }}</span>
                        <span class="text-light fw-semibold fs-6">Created At</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <!--end::Subtitle-->
                    </div>
                    <span class="float-right display-5 bg-opacity-25"><i class="fa-solid fa-cart-shopping fs-1 text-light"></i></span>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 7-->
        </div>
        <!--end::Col-->
    </div>
@endsection
