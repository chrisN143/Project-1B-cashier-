<div class="row shadow border rounded p-3">
    <div class="col-md-4 my-auto">
        <h6>Check Out</h6>
        @if (session('error'))
            <div class="alert alert-success" role="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <div class="py-1 py-md-3 bg-light">
        <h6 class="mb-3">Total price : Rp. {{ $totalprice }}</h6>
        {{-- ke satu --}}
        <div class="container">
            <div class="shopping-cart">
                <div class="cart-header">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <h4>Products</h4>
                        </div>
                        <div class="col-md-2">
                            <h4>Price</h4>

                        </div>
                        <div class="col-md-2">
                            <h4>Quantity</h4>

                        </div>
                        <div class="col-md-3">
                            <h4>Total</h4>

                        </div>
                    </div>
                </div>
                <div class="cart-item">
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($carts as $cart)
                        <div class="row shadow border rounded p-2 my-3 justify-content-center">
                            <div class="col-md-4 my-auto">
                                <a href="">
                                    <label for=""class="product-name capitalize
    
                                    ">
                                        <img src="{{ asset('storage/images/' . $cart->product->image) }}" width="80px"
                                            class="rounded" alt="">
                                        {{ $cart->product->name }}
                                    </label>
                                </a>
                            </div>
                            <div class="col-md-2 my-auto">
                                <label for="" class="price">
                                    Rp. {{ $cart->product->price }}

                                </label>
                                {{-- for total the price --}}
                            </div>
                            <div class="col-md-2 col-5 my-auto">
                                <div class="quantity">
                                    <div class="input-group">

                                        <input type="text" value="{{ $cart->quantity }}" class="input-quantity"
                                            readonly disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-auto">
                                <label for="" class="price">
                                    Rp. {{ $cart->product->price * $cart->quantity }}
                                </label>
                                @php
                                    $total += $cart->product->price * $cart->quantity;
                                @endphp
                            </div>


                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row shadow border rounded p-3">
        <h6>Customer Information</h6>
        <div>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Nama Customer"
                        wire:model="customerName">
                </div>

            </div>

        </div>

        <div class="col-md-12 my-4">
            <label for="">Choose your Payment method :</label>
            <div class="d-md-flex">
                <div class="nav col-md-3 flex-column nav-pills me-3" id="pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <button class="nav-link fw-bold active" id="pills-home-tab" data-bs-toggle="pill" type="button"
                        aria-selected="true" role="tab" data-bs-target="#CashOnDelivery">Cash On
                        Delivery</button>
                    <button class="nav-link fw-bold " id="pills-profile-tab" data-bs-toggle="pill" type="button"
                        aria-selected="false" role="tab" data-bs-target="#OnlinePayment">Online
                        Payment</button>
                </div>
                <div class="tab-content col-md-9">
                    <div class="tab-pane fade active show" id="CashOnDelivery" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <h6>Cash On deliver :</h6>
                        <hr>
                        {{-- <a wire:click='codOrder' class="btn btn-warning">Cash On
                            deliver</a> --}}
                        <button wire:loading.attr='disable' class="btn btn-primary" wire:click='codOrder'>
                            <span wire:loading.remove wire:target="codOrder">

                                Make An Order
                            </span>
                            <span wire:loading wire:target="codOrder">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </span>
                        </button>

                    </div>
                    <div class="tab-pane fade" id="OnlinePayment" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <h6>Online Payment :</h6>
                        <hr>
                        <a wire:click='onlineOrder' class="btn btn-warning">Online
                            Payment</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <button class="checkout-button col-md-2">Make order</button> --}}
    </div>

</div>