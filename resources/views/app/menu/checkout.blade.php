@extends('layouts.app')

@section('after_css')
    <link rel="stylesheet"
        href="{{ asset('assets/templates/metronic/dist/assets/plugins/custom/datatables/datatables.bundle.css') }}">
    <style>
        .checkout-button {
            background-color: #c0bfbf;
            color: rgb(0, 0, 0);
            font-weight: 500;
            border: none;
            padding: 15px 15px;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 50px;
            text-decoration: none;

        }

        .checkout-button:hover {
            background-color: #3adc63;
        }
        .shopping-cart.cart-header {
    padding: 10px;
}

.shopping-cart>.cart-header>.row>.col-cart-header h4 {

    font-size: 10px;
    margin-bottom: 0px;
}

.shopping-cart.cart-item a {
    text-decoration: none;
}

.shopping-cart.cart-item {
    background-color: #fff;

    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0/ 8%);

    padding: 10px 10px;

    margin-top: 10px;
}

.shopping-cart .cart-item .product-name {
    font-size: 16px;

    font-weight: 600;
    text-transform: capitalize;

    width: 100%;

    white-space: nowrap;

    text-overflow: ellipsis;

    overflow: hidden;

    cursor: pointer;
}

.shopping-cart .cart-item .price {
    font-size: 16px;

    font-weight: 600;

    padding: 4px 2px;
}

.shopping-cart .btn1 {
    border: 1px solid;

    margin-right: 3px;

    border-radius: 0px;

    font-size: 10px;
}

.shopping-cart .btn1:hover {
    background-color: #2874f0;

    color: #fff;
}

.shopping-cart .input-quantity {
    border: 1px solid #000;

    margin-right: 3px;

    font-size: 10px;

    width: 40%;

    outline: none;

    text-align: center;
}
@media only screen and (max-width: 600px) {
    .shopping-cart>.cart-header>.row>.col-cart-header h4 {
        font-size: 10px;
        margin-bottom: 0px;
    }
    .shopping-cart .btn1:hover {
    background-color: #2874f0;

    color: #fff;
}

.shopping-cart .input-quantity {
    border: 1px solid #000;

    margin-right: 3px;

    font-size: 10px;

    width: 30%;

    outline: none;

    text-align: center;
}
}

    </style>
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
    @livewire('menu.checkout')
@endsection
