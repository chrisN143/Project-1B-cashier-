<div class="d-flex flex-column flex-lg-row">
    <!--begin::Content-->
    <div class="flex-lg-row-fluid mb-10 mb-lg-0">
        <!--begin::Card-->
        <div class="card mb-5 mb-xl-8">
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Summary-->
                <!--begin::User Info-->
                <div class="d-flex flex-center flex-column py-5">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-100px symbol-circle mb-7">
                        <img src="{{ asset('assets/images/user.png') }}" alt="image">
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Name-->
                    <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{ $user->name }}</a>
                    <!--end::Name-->
                    <!--begin::Position-->
                    <div class="mb-9">
                        <!--begin::Badge-->
                        <div class="badge badge-lg badge-light-primary d-inline">{{ $user->roles->first()->name }}</div>
                        <!--begin::Badge-->
                    </div>
                    <!--end::Position-->
                </div>
                <!--end::User Info-->
                <!--end::Summary-->
                <!--begin::Details toggle-->
                <div class="d-flex flex-stack fs-4 py-3">
                    <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details"
                        role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                        <span class="ms-2 rotate-180">
                            <i class="ki-duotone ki-down fs-3"></i>
                        </span>
                    </div>
                    <span data-bs-toggle="tooltip" data-bs-trigger="hover">
                        <a href="{{ route('user.index') }}" class="btn btn-sm btn-light-info">Back</a>
                        <a href="{{ route('user.edit', $user) }}" class="btn btn-sm btn-light-primary">Edit</a>
                    </span>
                </div>
                <!--end::Details toggle-->
                <div class="separator"></div>
                <!--begin::Details content-->
                <div id="kt_user_view_details" class="collapse show">
                    <div class="pb-5 fs-6">
                        <!--begin::Details item-->
                        <div class="fw-bold mt-5">Account ID</div>
                        <div class="text-gray-600">{{ Str::substr(Crypt::encrypt($user), 0, 30) }}</div>
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <div class="fw-bold mt-5">Email</div>
                        <div class="text-gray-600">
                            <a href="#" class="text-gray-600 text-hover-primary">{{ $user->email }}</a>
                        </div>
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        {{-- <div class="fw-bold mt-5">Address</div>
                        <div class="text-gray-600">101 Collin Street,
                            <br>Melbourne 3000 VIC
                            <br>Australia
                        </div> --}}
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        {{-- <div class="fw-bold mt-5">Language</div>
                        <div class="text-gray-600">English</div> --}}
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        {{-- <div class="fw-bold mt-5">Last Login</div>
                        <div class="text-gray-600">20 Dec 2023, 2:40 pm</div> --}}
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <div class="fw-bold mt-5">Account Created At</div>
                        <div class="text-gray-600">
                            {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y | H:i') }}</div>
                        <!--begin::Details item-->
                    </div>
                </div>
                <!--end::Details content-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content-->
</div>