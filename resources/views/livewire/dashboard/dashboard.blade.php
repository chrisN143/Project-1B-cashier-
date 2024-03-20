<div class="row g-5 gx-xl-10 mb-5 mb-xl-10 ">
    <!--begin::Col-->
    <div class="col-md-4">
        <!--begin::Card widget 7-->
        <div class="card card-flush bg-primary bg-gradient">
            <!--begin::Header-->
            <div class="card-header py-4">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column ">
                    <!--begin::Amount-->
                    <span class="text-light fw-semibold fs-2">Users</span>
                    <span class="fs-2hx fw-bold text-light lh-1 ls-n2">{{ $total_user }}</span>
                    <!--end::Amount-->

                    <!--begin::Subtitle-->
                    <!--end::Subtitle-->
                </div>
                <span class="float-right display-5 bg-opacity-25"><i class="fa-solid fa-user fs-1 text-light"></i></span>
                <!--end::Title-->
            </div>
            <!--end::Header-->
        </div>
        <!--end::Card widget 7-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-4">
        <!--begin::Card widget 7-->
        <div class="card card-flush bg-warning bg-gradient">
            <!--begin::Header-->
            <div class="card-header py-4">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Amount-->
                    <span class="text-light fw-semibold fs-2">Roles</span>
                    <span class="fs-2hx fw-bold text-light me-2 lh-1 ls-n2">{{ $total_role }}</span>
                    <!--end::Amount-->
                    <!--begin::Subtitle-->
                    <!--end::Subtitle-->
                </div>
                <span class="float-right display-5 bg-opacity-25"><i
                        class="fa-solid fa-users fs-1 text-light"></i></span>
                <!--end::Title-->
            </div>
            <!--end::Header-->
        </div>
        <!--end::Card widget 7-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->

    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-4">
        <!--begin::Card widget 7-->
        <div class="card card-flush bg-danger bg-gradient">
            <!--begin::Header-->
            <div class="card-header py-4">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Amount-->
                    <span class="text-light  fw-semibold fs-4">Products</span>
                    <span class="fs-2hx fw-bold text-light lh-1 ls-n2">{{ $total_product }}</span>
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
    <div class="col-md-4">
        <!--begin::Card widget 7-->
        <div class="card card-flush bg-success bg-gradient">
            <!--begin::Header-->
            <div class="card-header py-4">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Amount-->
                    <span class="text-light  fw-semibold fs-4">Permissions</span>
                    <span class="fs-2hx fw-bold text-light lh-1 ls-n2">{{ $total_permission }}</span>
                    <!--end::Amount-->

                    <!--begin::Subtitle-->
                    <!--end::Subtitle-->
                </div>
                <span class="float-right display-5 bg-opacity-25"><i
                        class="fa-solid fa-address-card fs-1 text-light"></i></span>
                <!--end::Title-->
            </div>
            <!--end::Header-->
        </div>
        <!--end::Card widget 7-->
    </div>

    <div class="col-md-4">
        <!--begin::Card widget 7-->
        <div class="card card-flush bg-info bg-gradient">
            <!--begin::Header-->
            <div class="card-header py-4">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Amount-->
                    <span class="text-light  fw-semibold fs-4">Stores</span>
                    <span class="fs-2hx fw-bold text-light lh-1 ls-n2">{{ $total_store }}</span>
                    <!--end::Amount-->

                    <!--begin::Subtitle-->
                    <!--end::Subtitle-->
                </div>
                <span class="float-right display-5 bg-opacity-25"><i
                        class="fa-solid fa-store fs-1 text-light"></i></span>
                <!--end::Title-->
            </div>
            <!--end::Header-->
        </div>
        <!--end::Card widget 7-->
    </div>

    <div class="col-md-4">
        <!--begin::Card widget 7-->
        <div class="card card-flush bg-secondary bg-gradient">
            <!--begin::Header-->
            <div class="card-header py-4">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Amount-->
                    <span class="text-light  fw-semibold fs-4">This Month Order</span>
                    <span class="fs-2hx fw-bold text-light lh-1 ls-n2">{{ $thisMonthOrder }}</span>
                    <!--end::Amount-->

                    <!--begin::Subtitle-->
                    <!--end::Subtitle-->
                </div>
                <span class="float-right display-5 bg-opacity-25"><i
                        class="fa-solid fa-clipboard-list fs-1 text-light"></i></span>
                <!--end::Title-->
            </div>
            <!--end::Header-->
        </div>
        <!--end::Card widget 7-->
    </div>
</div>
