@extends('layouts.app')
@section('after_css')
    <link rel="stylesheet"
        href="{{ asset('assets/templates/metronic/dist/assets/plugins/custom/datatables/datatables.bundle.css') }}">
    <style>
        /* Gaya tambahan untuk membuat tabel responsif */
        @media screen and (max-width: 600px) {
            table {
                border: 0;
                overflow-x: auto;
                display: block;
                width: 100%;
            }

            table caption {
                font-size: 1.3em;
            }

            table thead {
                display: none;
            }

            table tbody tr {
                display: block;
                border: 1px solid #ddd;
                margin-bottom: 10px;
            }

            table tbody td {
                display: block;
                text-align: left;
            }

            table td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                margin-right: 5px;
            }
        }

        /* Gaya tabel utama */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #d2d2d2;
        }

        tbody tr:hover {
            background-color: #ffffff;
        }

        /* Style khusus untuk tombol */
        table button {
            border: none;
            background: none;
            cursor: pointer;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #d2d2d2;
        }

        tbody tr:hover {
            background-color: #ffffff;
        }

        /* Style khusus untuk tombol */
        table button {
            border: none;
            background: none;
            cursor: pointer;
            padding: 0;
        }

        .pagination {
            display: flex;
            justify-content: flex-end;
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
    @livewire('laporan.stok-report')
    @livewire('laporan.stokReportDatatable')
@endsection
