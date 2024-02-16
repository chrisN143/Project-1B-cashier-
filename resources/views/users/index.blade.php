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
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <a href="{{ route('user.create') }}" class="btn btn-primary"> <i
                            class="ki-duotone ki-plus fs-2"></i>Create User</a>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div id="kt_table_users_wrapper">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatable">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-25px sorting" style="width: 25px;">No</th>
                                <th class="min-w-125px sorting" style="width: 125px;">Name</th>
                                <th class="min-w-125px sorting" style="width: 125px;">
                                    Email</th>
                                <th class="min-w-50px sorting" style="width: 50px;">
                                    Role</th>
                                <th class="min-w-125px sorting" style="width: 125px;">
                                    Created At</th>
                                <th class="min-w-125px sorting" style="width: 125px;">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Table-->
        </div>
    </div>
@endsection

@section('after_js')
    <script src="{{ asset('assets/templates/metronic/dist/assets/plugins/custom/datatables/datatables.bundle.js') }}">
    </script>
    <script>
        $(document).ready(function() {
            getDatatable();
        });

        let data_table = "";

        function getDatatable() {
            data_table = $("#datatable").DataTable({
                ajax: {
                    url: "{{ route('user.data_table') }}",
                },
                serverSide: true,
                processing: true,
                order: [
                    [4, 'desc']
                ],
                columns: [{
                        sortable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },

                    {
                        name: 'name',
                        data: 'name'
                    },
                    {
                        name: 'email',
                        data: 'email'
                    },
                    {
                        name: 'role',
                        data: 'role',
                        searchable: false,
                        sortable: false
                    },
                    {
                        name: 'created_at',
                        data: 'created_at',
                        searchable: false,
                    },
                    {
                        name: 'action',
                        data: 'action',
                        searchable: false,
                        sortable: false
                    },
                ],
            });
        }
    </script>
@endsection
