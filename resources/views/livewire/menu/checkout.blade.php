<div class="row shadow border rounded p-3">
    <div class="col-md-4 my-auto">
        <h3>Check Out :</h6>
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
    </div>
    <div class="py-1 py-md-3 bg-light">
        {{-- <h6 class="mb-3">Total price : Rp. {{ $totalprice }}</h6> --}}
        {{-- ke satu --}}
        <div class="container">

            <div class="shopping-cart">
                <div class="cart-header">
                    <div class="row">
                        <div class="col-md-3">
                            <h4>Products</h4>
                        </div>
                        <div class="col-md-2">
                            <h4>Price</h4>

                        </div>
                        <div class="col-md-3">
                            <h4>Quantity</h4>

                        </div>
                        <div class="col-md-3">
                            <h4>Total</h4>

                        </div>
                        <div class="col-md-1">
                            <h4>Aksi</h4>

                        </div>
                    </div>
                </div>
                <div class="cart-item">
                    @php
                        $total = 0;
                    @endphp
                    @forelse ($carts as $cart)
                        <div class="row shadow border rounded p-3 my-3" wire:poll.5s>
                            <div class="col-md-3 my-auto">
                                <a href="">
                                    <label for=""class="product-name capitalize">
                                        <img src="{{ asset('storage/images/' . $cart->product->image) }}" alt=""
                                            width="90px" class="rounded">
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
                            <div class="col-md-3 col-5 my-auto">
                                <div class="quantity">
                                    @if ($cart->quantity > 0)
                                        <div class="input-group">
                                            <button class="btn btn1" wire:loading.attr="disabled"
                                                wire:click="decrementQuantity({{ $cart->id }})"><i
                                                    class="fa fa-minus"></i></button>
                                            <input type="number" value="{{ $cart->quantity }}" class="input-quantity"
                                                readonly disabled>
                                            <button class="btn btn1" wire:loading.attr="disabled"
                                                wire:click="incrementQuantity({{ $cart->id }})"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    @else
                                        <div class="input-group">
                                            <button class="btn btn1" wire:loading.attr="disabled"
                                                wire:click="decrementQuantity({{ $cart->id }})"><i
                                                    class="fa fa-minus"></i></button>
                                            <input type="number" value="{{ $cart->quantity = 1 }}"
                                                class="input-quantity" readonly disabled>
                                            <button class="btn btn1" wire:loading.attr="disabled"
                                                wire:click="incrementQuantity({{ $cart->id }})"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    @endif
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
                            <div class="col-md-1 col-5 my-auto">
                                <div class="remove">
                                    <button wire:loading.attr="disabled" wire:click="destroy({{ $cart->id }})"
                                        class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    @empty
                        <h1 class="text-center">No cart Avaiable!!!</h1>
                    @endforelse
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-md-7 my-4">
                    <div class="shadow bg-white p-3">
                        @if ($total != 0)
                            <input type="text" class="form-control" placeholder="Nama Customer"
                                aria-label="Nama Customer" wire:model="customerName">
                            <hr>
                            <select class="form-select" name="payment_id" wire:model="payment_id">
                                <option value="" hidden selected>Choose your Payment Method</option>
                                @foreach ($payment as $method)
                                    <option value="{{ $method->payment_method }}">
                                        {{ $method->payment_method }}</option>
                                @endforeach
                            </select>
                            @error('payment_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        @else
                            <input type="text" class="form-control" placeholder="Nama Customer"
                                aria-label="Nama Customer" disabled>
                            <hr>
                            <select class="form-select" name="store_id" wire:model="store_id" disabled>
                                <option value="" hidden selected>Choose your Payment Method</option>
                                @foreach ($payment as $method)
                                    <option value="{{ $method->id }}">
                                        {{ $method->payment_method }}</option>
                                @endforeach
                            </select>
                        @endif

                    </div>

                </div>
                <div class="col-md-5 my-4">
                    <div class="shadow bg-white p-3">
                        <h4>Total:
                            <span>Rp. {{ $total }}</span>
                        </h4>
                        <hr>
                        <div class="">
                            @if ($total != 0)
                                <button wire:click='Order'
                                    class="btn btn-warning shadow">Checkout
                                    <div class="spinner-border text-light" style="width: 15px;  height:15px;"
                                        role="status" wire:loading>
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </button>
                            @else
                                <button class="btn btn-warning disabled">Checkout
                                </button>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row shadow border rounded p-3">
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
                        <a wire:click='codOrder' class="btn btn-warning">Cash On
                            deliver</a>
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
<div class="tab-pane fade" id="OnlinePayment" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
    <h6>Online Payment :</h6>
    <hr>
    <a wire:click='onlineOrder' class="btn btn-warning">Online
        Payment</a>
</div>
</div>
</div>
</div>
<button class="checkout-button col-md-2">Make order</button>
</div> --}}

</div>
