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
                    <span class="float-right display-5 bg-opacity-25"><i
                            class="fa-solid fa-cart-shopping fs-1 text-light"></i></span>
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
                    <span class="float-right display-5 bg-opacity-25"><i
                            class="fa-solid fa-cart-shopping fs-1 text-light"></i></span>
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
                        <span class="text-light  fw-semibold fs-4">Permissions</span>
                        <span class="fs-2hx fw-bold text-light lh-1 ls-n2">{{ $total_permission }}</span>
                        <span class="text-light fw-semibold fs-6">Created At</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <!--end::Subtitle-->
                    </div>
                    <span class="float-right display-5 bg-opacity-25"><i
                            class="fa-solid fa-cart-shopping fs-1 text-light"></i></span>
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
                        <span class="text-light  fw-semibold fs-4">Permissions</span>
                        <span class="fs-2hx fw-bold text-light lh-1 ls-n2">{{ $total_permission }}</span>
                        <span class="text-light fw-semibold fs-6">Created At</span>
                        <!--end::Amount-->

                        <!--begin::Subtitle-->
                        <!--end::Subtitle-->
                    </div>
                    <span class="float-right display-5 bg-opacity-25"><i
                            class="fa-solid fa-cart-shopping fs-1 text-light"></i></span>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Card widget 7-->
        </div>
    </div>

    <!--end::Col-->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Responsive Table</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid #ddd;
                /* Menambahkan border untuk keseluruhan tabel */
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
                background-color: #000000;
                /* Warna latar belakang untuk baris-genap */
            }

            tbody tr:hover {
                background-color: #ddd;
                /* Warna latar belakang saat baris dihover */
            }

            /* Style khusus untuk tombol */
            table button {
                border: none;
                background: none;
                cursor: pointer;
                padding: 0;

            }

            @media screen and (max-width: 600px) {
                table {
                    border: 0;
                }

                table caption {
                    font-size: 1.3em;
                }

                table thead {
                    display: none;
                }

                table tr {
                    border-bottom: 3px solid #ddd;
                    display: block;
                    margin-bottom: 10px;
                }

                table td {
                    border-bottom: none;
                    display: block;
                    text-align: right;
                }

                table td::before {
                    content: attr(data-label);
                    float: left;
                    font-weight: bold;
                }
            }
        </style>
    </head>

    <body>

        <table>
            <caption>Order Information</caption>
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Customer</th>
                    <th>Total Harga</th>
                    <th>Tipe Pembayaran</th>
                    <th>Tanggal Order</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="No">1</td>
                    <td data-label="No Customer">12345</td>
                    <td data-label="Total Harga">$100</td>
                    <td data-label="Tipe Pembayaran">Credit Card</td>
                    <td data-label="Tanggal Order">2024-02-22</td>
                    <td data-label="Action"><button class="btn btn-primary">Details</button></td>
                </tr>
                <!-- You can add more rows here -->
            </tbody>
        </table>

    </body>

    </html>
@endsection
