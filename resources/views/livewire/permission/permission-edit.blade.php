    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Content-->
        @if (auth()->user()->hasAnyPermission('permission-edit|update'))
        <div class="flex-lg-row-fluid mb-10 mb-lg-0">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body p-12">
                    <!--begin::Form-->
                    <!--begin::Wrapper-->
                    <div class="mb-0">
                        <!--begin::Row-->
                        <div class="row gx-10 mb-5">
                            <!--begin::Col-->
                            <div class="col-lg-12">
                                <!--begin::Input group-->
                                <div class="form-floating mb-7">
                                    <input type="text" wire:model="name" class="form-control form-control-solid"
                                        id="name" placeholder="" />
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
                            <!--end::Col-->
                            <div class="col-lg-12">
                                <a href="{{ route('permission.index') }}" class="btn btn-primary me-2">Back</a>
                                <button class="btn btn-success me-2" wire:click="update" type="submit">update</button>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>

                    <!--end::Form-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        @else
        <div class="flex-lg-row-fluid mb-10 mb-lg-0">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body p-12">
                    <!--begin::Form-->
                    <!--begin::Wrapper-->
                    <div class="mb-0">
                        <!--begin::Row-->
                        <div class="row gx-10 mb-5">
                            <!--begin::Col-->
                            <div class="col-lg-12">
                                <!--begin::Input group-->
                                <div class="form-floating mb-7">
                                    <input type="text" wire:model="name" class="form-control form-control-solid"
                                        id="name" placeholder="" disabled>
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
                            <!--end::Col-->
                            <div class="col-lg-12">
                                <a href="{{ route('permission.index') }}" class="btn btn-primary me-2" disabled>Back</a>
                                <button class="btn btn-success me-2" wire:click="update" type="submit" disabled>update</button>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>

                    <!--end::Form-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        @endif
       
        <!--end::Content-->
    </div>
