@extends('layouts.app')

@section('after_css')
    <link rel="stylesheet"
        href="{{ asset('assets/templates/metronic/dist/assets/plugins/custom/datatables/datatables.bundle.css') }}">
@endsection


@section('content')
    <div class="card mx-3">
        <!--begin::Card header-->
        @if (auth()->user()->hasAnyPermission('product-create'))
            <div class="card border border-dark border-1">

                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <!--begin::Add user-->
                        <a href="{{ route('product.detail') }}" class="btn btn-primary"> <i
                                class="ki-duotone ki-plus fs-2"></i>Create Product</a>
                        <!--end::Add user-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Card toolbar-->
            </div>
        @endif

        <!--begin::Card header-->


        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div id="kt_table_users_wrapper">
                @livewire('product.itemsdatatable')
            </div>
            <!--end::Table-->
        </div>
    </div>
@endsection
