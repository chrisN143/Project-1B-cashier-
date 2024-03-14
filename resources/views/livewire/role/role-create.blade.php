<div class="d-flex flex-column flex-lg-row">
    <!--begin::Content-->
    <div class="flex-lg-row-fluid mb-10 mb-lg-0">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body p-12">
                <!--begin::Form-->
                <form wire:submit="post">
                    @csrf
                    <!--begin::Wrapper-->
                    <div class="mb-0">
                        <!--begin::Row-->
                        <div class="row gx-10 mb-5">
                            <!--begin::Col-->
                            <div class="col-lg-12">
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
                                                            {{ is_array(old('permission')) && in_array($permission->name, old('permission')) ? ' checked' : '' }} />
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