<div class="py-2 py-md-3 bg-light">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-success" role="alert">
            {{ session('error') }}
        </div>
    @endif
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
                    <div class="row shadow border rounded p-3 my-3">
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
                                <div class="input-group">
                                    <button class="btn btn1" wire:loading.attr="disabled"
                                        wire:click="decrementQuantity({{ $cart->id }})"><i
                                            class="fa fa-minus"></i></button>
                                    <input type="text" value="{{ $cart->quantity }}" 
                                        class="input-quantity" readonly disabled>
                                    <button class="btn btn1" wire:loading.attr="disabled"
                                        wire:click="incrementQuantity({{ $cart->id }})"><i
                                            class="fa fa-plus"></i></button>
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
                    <h1>No cart Avaiable</h1>
                @endforelse
            </div>
        </div>
        <div class="row justify-content-end">

            <div class="col-md-5 my-4">
                <div class="shadow bg-white p-3">
                    <h4>Total:
                        <span>Rp. {{ $total }}</span>
                    </h4>
                    <hr>
                    @if ($total != 0)
                        <a href="{{ route('menu.checkout') }}" class="checkout-button shadow">Checkout</a>
                    @else
                        <a href="{{ route('menu.checkout') }}" class="btn btn-warning disabled">Checkout</a>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
