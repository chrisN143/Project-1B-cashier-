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
                    <form action="{{ route('role.update', $role) }}" method="post">
                        @csrf
                        @method('put')
                        <!--begin::Wrapper-->
                        <div class="mb-0">
                            <!--begin::Row-->
                            <div class="row gx-10 mb-5">
                                <!--begin::Col-->
                                <div class="col-lg-12">
                                    <!--begin::Input group-->
                                    <div class="form-floating mb-7">
                                        <input type="text" name="name" class="form-control form-control-solid"
                                            id="name" placeholder="" value="{{ old('name', $role->name) }}" />
                                        <label for="name">Name</label>
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            @error('name')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <div class="separator"></div>
                                <div class="col-lg-12 mt-3 mb-5">
                                    <div class="card">
                                        </span>
                                        <h3 class="fw-bold text-center m-5">Permissions</h3>
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                @foreach ($permissions as $permission)
                                                    <div class="col-lg-4 mb-5">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="{{ $permission->name }}" id="{{ $permission->id }}"
                                                                name="permission[]"
                                                                {{ in_array($permission->id, $role_permissions) ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="{{ $permission->id }}">
                                                                {{ $permission->name }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Col-->
                                <div class="col-lg-12">
                                    <a href="{{ route('role.index') }}" class="btn btn-primary me-2">Back</a>
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
