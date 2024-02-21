<div class="py-2 py-md-3 bg-light">
    <div class="container">
        <div class="shopping-cart">
            <div class="cart-item">
                @php
                    $total = 0;
                @endphp
                @foreach ($carts as $cart)
                    <div class="row shadow border rounded p-3 my-3">
                        <div class="col-md-4 my-auto">
                            <a href="">
                                <label for=""class="product-name capitalize

                @endforeach --}}
                <div class="row shadow border rounded p-3">
                    <div class="col-md-4 my-auto">
                        <a href="">
                            <label for="" class="product-name capitalize" style=" font-size: 16px;

                            font-weight: 600;

                            width: 100%;

                            white-space: nowrap;

                            text-overflow: ellipsis;

                            overflow: hidden;

                            cursor: pointer;">
                            <label for=""class="product-name capitalize

                            ">
                                <img src="" alt="">
                                xbox
                            </label>
                        </a>
                    </div>
                    <div class="col-md-2 my-auto">
                        <label for="" class="price">
                            Rp. 20jt
                        </label>
                    </div>
                    <div class="col-md-3 col-5 my-auto">
                        <div class="quantity">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="inputQuantity" value="{{ $this->inputQuantity }}" class="input-quantity">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-5 my-auto">
                        <div class="remove">
                            <a href="" wire class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                        <div class="col-md-2 my-auto">
                            <label for="" class="price">
                                Rp. {{ $cart->product->price }}

                            </label>
                            @php
                                $total += $cart->product->price;
                            @endphp {{-- for total the price --}}
                        </div>
                        <div class="col-md-3 col-5 my-auto">
                            <div class="quantity">
                                <div class="input-group">
                                    <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                    <input type="text" value="{{ $cart->quantity }}" class="input-quantity"
                                        style="    border: 1px solid #000;

                                margin-right: 3px;

                                font-size: 10px;

                                width: 40%;

                                outline: none;

                                text-align: center;">
                                    <span class="btn btn1"><i class="fa fa-plus"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-5 my-auto">
                            <div class="remove">
                                <button wire:click.live.debounce.150ms="destroy({{ $cart->id }})" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        <div class="row justify-content-end">

            <div class="col-md-5 my-4">
                <div class="shadow bg-white p-3">
                    <h4>Total :
                        <br>
                        <span>Rp. </span>
                    </h4>
                    <hr>
                    <a href="{{ route('menu.checkout') }}" class="checkout-button shadow">Checkout</a>
                    {{-- @if ($totalprice != 0)
                    @else
                        <a href="{{ route('checkout.index') }}" class="btn btn-warning disabled">Checkout</a>
                    @endif --}}
                </div>

            </div>
        </div>
    </div>
</div>
