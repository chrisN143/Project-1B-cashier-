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
    <div class="card">

        <div class="card-body py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="shadow bg-white p-5 rounded">
                            <h4 class="mx-3  text-capitalize">
                                Order Details
                                <a href="{{ route('orders.index') }}" class="btn btn-danger btn-sm ">back To All Orders</a>
                            </h4>
                            <hr>
                            <div class="row p-2">
                                <div class="col-md-8">
                                    <h6>Tracking Id/No. : {{ $order->order_code }}</h6>
                                    <h6>Order Created Date : {{ $order->created_at->format('d-m-Y h:i A') }}
                                        ({{ $order->created_at->diffForHumans() }})</h6>
                                    <h6>Payment Mode : {{ $order->payment_mode }}</h6>
                                </div>
                                <div class="col-md-8">
                                    <h4>User Details</h4>
                                    <hr>
                                    <h6>Full Name : {{ $order->customer_name }}</h6>
                                    <h6>Payment method : {{ $order->payment_method }}</h6>
                                </div>
                            </div>
                            <br>
                            <h5>Order Items</h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Items Id</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderItems as $item)
                                            <tr>
                                                <th width="10%">{{ $item->product->code }}</th>

                                                <th width="10%">{{ $item->product_name }}</th>
                                                <th width="10%">{{ $item->product_quantity }}</th>

                                                <th width="10%">Rp. {{ $item->product_price }}</th>


                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="text-center">Total Amount :</td>
                                            <td>Rp. {{ $order->total_price }}</td>
                                        </tr>
                                    </tbody>    
                                </table>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
