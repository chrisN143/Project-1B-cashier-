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
        <!-- Tambahkan jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        </style>
    </head>

    <body>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <style>
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
        </head>

        <body>

            <div class="col-md-2 py-3">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="No Customer" aria-label="Search"
                        id="searchInput">

                </form>
            </div>
            <table>
                <caption>Order Information</caption>
                <tbody>
                    <tr>
                        <td data-label="No">No: 1</td>
                        <td data-label="No Customer">No Customer: 1234</td>
                        <td data-label="Total Harga">Total Harga: $100</td>
                        <td data-label="Tipe Pembayaran">Tipe Pembayaran: Credit Card</td>
                        <td data-label="Tanggal Order">Tanggal Order: 2024-02-22</td>
                        <td data-label="Action"><button class="btn btn-primary">Detail</button></td>
                    </tr>
                    <tr>
                        <td data-label="No">No: 2</td>
                        <td data-label="No Customer">No Customer: 5555</td>
                        <td data-label="Total Harga">Total Harga: $120</td>
                        <td data-label="Tipe Pembayaran">Tipe Pembayaran: Credit Card</td>
                        <td data-label="Tanggal Order">Tanggal Order: 2024-02-22</td>
                        <td data-label="Action"><button class="btn btn-primary">Detail</button></td>
                    </tr>

                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>


            <script>
                $(document).ready(function() {
                    $("#searchInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("table tbody tr").each(function() {
                            var customerNo = $(this).find("[data-label='No Customer']").text()
                                .toLowerCase();
                            $(this).toggle(customerNo.indexOf(value) > -1);
                        });
                    });
                });
            </script>

        </body>

        </html>
    @endsection
