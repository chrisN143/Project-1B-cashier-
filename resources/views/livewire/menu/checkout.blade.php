<div class="row shadow border rounded p-3">
    <div class="col-md-4 my-auto">
        <h6>Check Out :</h6>
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
            <div class="card p-4">
                {{-- <div class="card-header border-0 pt-6"> --}}
                <table class="table table-row-dashed">
                    <thead class="text-gray-600 fw-semibold">
                        <tr>
                            <th class="min-w-100px sorting" style="width: 100px;" scope="col">Products</th>
                            <th class="min-w-40px sorting" style="width: 40px;" scope="col">Price</th>
                            <th class="min-w-100px sorting text-center" style="width: 100px;" scope="col">Quantity
                            </th>
                            <th class="min-w-50px sorting" style="width: 50px;" scope="col">Total</th>
                            <th class="min-w-100px sorting" style="width: 100px;" scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @forelse ($carts as $cart)
                            <tr>
                                <th class="my-2">{{ $cart->product->name }}</th>
                                <td class="my-2">Rp. {{ $cart->product->price }}</td>
                                <td class="my-2">
                                    @if ($cart->quantity > 0)
                                        <div class="input-group">
                                            <button class="btn btn1" wire:loading.attr="disabled"
                                                wire:click="decrementQuantity({{ $cart->id }})"><i
                                                    class="fa fa-minus"></i></button>
                                            <input type="number" value="{{ $cart->quantity }}"
                                                class="text-center input-quantity" readonly disabled>
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
                                </td>
                                <td class="my-2">
                                    Rp. {{ $cart->product->price * $cart->quantity }}

                                </td>
                                @php
                                    $total += $cart->product->price * $cart->quantity;
                                @endphp
                                <td>
                                    <button wire:loading.attr="disabled" wire:click="destroy({{ $cart->id }})"
                                        class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <h1 class="text-center">No cart Avaiable!!!</h1>
                        @endforelse
                    </tbody>
                </table>
                {{-- </div> --}}
            </div>
            {{-- <div class="shopping-cart">
                <div class="cart-header">
                    <div class="row">
                        <div class="col-lg-1">
                            <h5>Products</h5>
                        </div>
                        <div class="col-lg-1">
                            <h5>Price</h5>

                        </div>
                        <div class="col-lg-1 ">
                            <h5>Quantity</h5>

                        </div>
                        <div class="col-lg-1 ">
                            <h5>Total</h5>

                        </div>
                        <div class="col-lg-1 ">
                            <h5>Aksi</h5>

                        </div>
                    </div>
                </div>
                <div class="cart-item">
                    @php
                        $total = 0;
                    @endphp
                    @forelse ($carts as $cart)
                        <div class="row shadow border rounded p-3 my-3" wire:poll.5s>
                            <div class="col-md-2 my-auto">
                                <a href="">
                                    <label for=""class="product-name capitalize">
                                        <img src="{{ asset('storage/images/' . $cart->product->image) }}" alt=""
                                            width="90px" class="rounded">
                                        {{ $cart->product->name }}
                                    </label>
                                </a>
                            </div>
                            <div class="col-md-1 my-auto">
                                <label for="" class="price">
                                    Rp. {{ $cart->product->price }}

                                </label>
                                 for total the price 
                            </div>
                            <div class="col-md-3 my-auto">
                                <div class="quantity">
                                    @if ($cart->quantity > 0)
                                        <div class="input-group">
                                            <button class="btn btn1" wire:loading.attr="disabled"
                                                wire:click="decrementQuantity({{ $cart->id }})"><i
                                                    class="fa fa-minus"></i></button>
                                            <input type="number" value="{{ $cart->quantity }}"
                                                class="text-center input-quantity" readonly disabled>
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
                            <div class="col-md-1 my-auto">
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
            </div> --}}
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
                                <button wire:click='Order' class="btn btn-warning shadow">Checkout
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

</div>
