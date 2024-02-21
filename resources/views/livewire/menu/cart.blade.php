{{-- <div class="card p-3">
    <div class="card">
        <div class="row justify-content-between shadow">
              <div class="col-lg-3">
                  <h5 class="text-center">Nama Produk</h5>
              </div>
              <div class="col-lg-3 my-2">
                  <button class="btn btn-danger">remove</button>
              </div>
        </div>
    </div>
</div> --}}


<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="shopping-cart">
            <div class="cart-item">
                {{-- @foreach ( as )

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
                    </div>

                </div>
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
