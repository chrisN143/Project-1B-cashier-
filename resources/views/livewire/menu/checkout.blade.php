<div class="row shadow border rounded p-3">
    <div class="col-md-4 my-auto">
        <h6>Check Out</h6>
    </div>
    <div class="py-3 py-md-5 bg-light">
        <h6>Total price :</h6>
        {{-- ke satu --}}
        <div class="container">
            <div class="shopping-cart">
                <div class="cart-item">

                    <div class="row shadow border rounded p-3">
                        <div class="col-md-4 my-auto">
                            <a href="">
                                <label for="" class="product-name capitalize"
                                    style=" font-size: 16px;



                        width: 100%;

                        white-space: nowrap;

                        text-overflow: ellipsis;

                        overflow: hidden;

                        cursor: pointer;">
                                    <label for=""class="product-name capitalize

                                                                    ">
                                        <img src="{{ asset('assets/image/apple.jpg') }}" alt="Image" width="100"
                                            height="50">

                                    </label>
                            </a>
                        </div>
                        <div class="col-md-2 my-auto">
                            <label for="" class="price">
                                Rp. 1000.000
                            </label>
                        </div>
                        <div class="col-md-3 col-8 my-auto">
                            <input type="text" value="5" class="input-quantity" readonly disabled>
                        </div>


                    </div>
                </div>
            </div>

        </div>

        {{-- ke dua --}}
        <div class="container">
            <div class="shopping-cart">
                <div class="cart-item">

                    <div class="row shadow border rounded p-3">
                        <div class="col-md-4 my-auto">
                            <a href="">
                                <label for="" class="product-name capitalize"
                                    style=" font-size: 16px;



                        width: 100%;

                        white-space: nowrap;

                        text-overflow: ellipsis;

                        overflow: hidden;

                        cursor: pointer;">
                                    <label for=""class="product-name capitalize

                                                                    ">
                                        <img src="{{ asset('assets/image/apple.jpg') }}" alt="Image" width="100"
                                            height="50">

                                    </label>
                            </a>
                        </div>
                        <div class="col-md-2 my-auto">
                            <label for="" class="price">
                                Rp. 1000.000
                            </label>
                        </div>
                        <div class="col-md-3 col-8 my-auto">
                            <input type="text" value="5" class="input-quantity" readonly disabled>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row shadow border rounded p-3">
        <h6>Customer Information</h6>
        <div>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Nama Customer">
                </div>
                <div class="col">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Discount %</option>
                        <option value="1">10%</option>
                        <option value="2">50%</option>
                        <option value="3">75%</option>
                    </select>
                </div>
            </div>

        </div>

        <h6>Payment Method</h6>

        <div class="mt-3">
            <select class="form-select" name="payment_id" wire:model="payment_id">
                <option value="" hidden selected>Payment</option>
                @foreach ($payment as $st)
                    <option value="{{ $st->id }}">{{ $st->payment_method }}</option>
                @endforeach
            </select>
            @error('storeId')
                <span class="text-danger font-italic">{{ $message }}</span>
            @enderror
        </div>
        <button class="checkout-button col-md-2">Make order</button>
    </div>

</div>
