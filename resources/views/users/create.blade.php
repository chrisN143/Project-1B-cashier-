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
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Content-->
        <div class="flex-lg-row-fluid mb-10 mb-lg-0">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body p-12">
                    <!--begin::Form-->
                    <form action="{{ route('user.store') }}" method="post">
                        @csrf
                        <!--begin::Wrapper-->
                        <div class="mb-0">
                            <!--begin::Row-->
                            <div class="row gx-10 mb-5">
                                <!--begin::Col-->
                                <div class="col-lg-12">
                                    <!--begin::Input group-->
                                    <div class="mb-5">
                                        <select class="form-select form-select-solid" name="role" data-control="select2"
                                            data-placeholder="Select an option" data-allow-clear="true">
                                            <option></option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role }}"
                                                    {{ old('role') == $role ? 'selected' : '' }}>{{ $role }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            @error('role')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-lg-6">
                                    <!--begin::Input group-->
                                    <div class="form-floating mb-7">
                                        <input type="text" name="name" class="form-control form-control-solid"
                                            id="name" placeholder="" value="{{ old('name') }}" />
                                        <label for="name">Name</label>
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            @error('name')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="form-floating mb-7">
                                        <input type="password" name="password" class="form-control form-control-solid"
                                            id="password" placeholder="" />
                                        <label for="password">Password</label>
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            @error('password')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!--begin::Hint-->
                                        <div class="text-muted">Minimal 8 kata yang terdiri dari gabungan angka dan huruf.
                                        </div>
                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-lg-6">
                                    <!--begin::Input group-->
                                    <div class="form-floating mb-7">
                                        <input type="email" name="email" class="form-control form-control-solid"
                                            id="email" placeholder="" value="{{ old('email') }}" />
                                        <label for="email">Email address</label>
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            @error('email')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="form-floating mb-7">
                                        <input type="password" name="confirm-password"
                                            class="form-control form-control-solid" id="confirm-password" placeholder="" />
                                        <label for="confirm-password">Confirm Password</label>
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            @error('confirm-password')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Col-->
                                <div class="col-lg-12">
                                    <a href="{{ route('user.index') }}" class="btn btn-primary me-2">Back</a>
                                    <button class="btn btn-warning me-2" type="reset">Reset</button>
                                    <button class="btn btn-success me-2" type="submit">Submit</button>
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Wrapper-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content-->
    </div>
@endsection
