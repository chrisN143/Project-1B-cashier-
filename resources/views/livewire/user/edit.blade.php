<div>
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Content-->
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
                                <div class="mb-5">
                                    <select wire:model="roleUser" class="form-select form-select-solid" name="roleUser">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}"
                                                {{ $user_role == $role ? 'selected' : '' }}>
                                                {{ $role }}</option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                        @error('roleUser')
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
                                    <input wire:model="name" type="text" name="name"
                                        class="form-control form-control-solid" id="name" placeholder=""
                                        value="" />
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
                                    <input wire:model="password" type="password" name="password"
                                        class="form-control form-control-solid" id="password" placeholder="" />
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
                                    <!--begin::Hint-->
                                    <div class="text-muted">Isi password dan confirm password jika ingin mengganti
                                        password sebelumnya
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
                                    <input wire:model="email" type="email" name="email"
                                        class="form-control form-control-solid" id="email" placeholder="" />
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
                                    <input wire:model="password" type="password" name="confirm-password"
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
                                <button wire:click="update" class="btn btn-success me-2" type="submit">Submit</button>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content-->
    </div>
</div>
