<div class="d-flex flex-column flex-lg-row">
    <!--begin::Content-->
    <div class="flex-lg-row-fluid mb-10 mb-lg-0">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body p-12">
                <!--begin::Form-->
                <form wire:submit="store">

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
                            <div class="separator"></div>
                            <div class="col-lg-12 mt-3 mb-5">
                                <div class="card">
                                    </span>
                                    <h3 class="fw-bold text-center m-5">Permissions</h3>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Permission</h6>
                                                @foreach ($permissions1 as $index => $permission)
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input"
                                                            wire:model="permissions1.{{ $index }}.is_checked"
                                                            type="checkbox" value="{{ $permission['name'] }}"
                                                            id="{{ $permission['id'] }}" />
                                                        <label class="form-check-label" for="{{ $permission['id'] }}">
                                                            {{ $permission['name'] }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col-lg-3">
                                                <h6>User</h6>
                                                @foreach ($permissions2 as $index => $permission)
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input"
                                                            wire:model="permissions2.{{ $index }}.is_checked"
                                                            type="checkbox" value="{{ $permission['name'] }}"
                                                            id="{{ $permission['id'] }}" />
                                                        <label class="form-check-label" for="{{ $permission['id'] }}">
                                                            {{ $permission['name'] }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col-lg-3">
                                                <h6>Role</h6>
                                                @foreach ($permissions3 as $index => $permission)
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input"
                                                            wire:model="permissions3.{{ $index }}.is_checked"
                                                            type="checkbox" value="{{ $permission['name'] }}"
                                                            id="{{ $permission['id'] }}" />
                                                        <label class="form-check-label" for="{{ $permission['id'] }}">
                                                            {{ $permission['name'] }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col-lg-3">
                                                <h6>Dashboard</h6>
                                                @foreach ($permissions4 as $index => $permission)
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input"
                                                            wire:model="permissions4.{{ $index }}.is_checked"
                                                            type="checkbox" value="{{ $permission['name'] }}"
                                                            id="{{ $permission['id'] }}" />
                                                        <label class="form-check-label" for="{{ $permission['id'] }}">
                                                            {{ $permission['name'] }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                                <h6>Menu</h6>
                                                @foreach ($permissions9 as $index => $permission)
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input"
                                                            wire:model="permissions9.{{ $index }}.is_checked"
                                                            type="checkbox" value="{{ $permission['name'] }}"
                                                            id="{{ $permission['id'] }}" />
                                                        <label class="form-check-label" for="{{ $permission['id'] }}">
                                                            {{ $permission['name'] }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col-lg-3">
                                                <h6>Product</h6>
                                                @foreach ($permissions5 as $index => $permission)
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input"
                                                            wire:model="permissions5.{{ $index }}.is_checked"
                                                            type="checkbox" value="{{ $permission['name'] }}"
                                                            id="{{ $permission['id'] }}" />
                                                        <label class="form-check-label" for="{{ $permission['id'] }}">
                                                            {{ $permission['name'] }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                                @foreach ($permissions10 as $index => $permission)
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input"
                                                            wire:model="permissions10.{{ $index }}.is_checked"
                                                            type="checkbox" value="{{ $permission['name'] }}"
                                                            id="{{ $permission['id'] }}" />
                                                        <label class="form-check-label" for="{{ $permission['id'] }}">
                                                            {{ $permission['name'] }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col-lg-3">
                                                <h6>Store</h6>
                                                @foreach ($permissions6 as $index => $permission)
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input"
                                                            wire:model="permissions6.{{ $index }}.is_checked"
                                                            type="checkbox" value="{{ $permission['name'] }}"
                                                            id="{{ $permission['id'] }}" />
                                                        <label class="form-check-label" for="{{ $permission['id'] }}">
                                                            {{ $permission['name'] }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col-lg-3">
                                                <h6>Transaction</h6>
                                                @foreach ($permissions7 as $index => $permission)
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input"
                                                            wire:model="permissions7.{{ $index }}.is_checked"
                                                            type="checkbox" value="{{ $permission['name'] }}"
                                                            id="{{ $permission['id'] }}" />
                                                        <label class="form-check-label" for="{{ $permission['id'] }}">
                                                            {{ $permission['name'] }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col-lg-3">
                                                <h6>Laporan</h6>
                                                @foreach ($permissions8 as $index => $permission)
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input"
                                                            wire:model="permissions8.{{ $index }}.is_checked"
                                                            type="checkbox" value="{{ $permission['name'] }}"
                                                            id="{{ $permission['id'] }}" />
                                                        <label class="form-check-label"
                                                            for="{{ $permission['id'] }}">
                                                            {{ $permission['name'] }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Col-->
                            <div class="col-lg-12">
                                <a href="{{ route('role.index') }}" class="btn btn-primary me-2">Back</a>
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
