<div class="row shadow border rounded p-3">
    <div class="col-md-5 my-auto">
        <h4>Check Out : On Store {{ $cartStore ? $cartStore->store_name : '' }} </h4>
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

            <div class="card p-4">
                <table wire:poll.3s>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @forelse ($carts as $cart)
                            <tr>
                                <td data-label="No Customer">
                                    <strong>{{ $cart->product->name }}</strong>
                                </td>
                                <td data-label="Tipe Pembayaran">
                                    {{-- @if ($cart->quantity > 0) --}}
                                        <div class="input-group">
                                            <button class="btn btn1" wire:loading.attr="disabled"
                                                wire:click="decrementQuantity({{ $cart->id }})"><i
                                                    class="fa fa-minus"></i></button>
                                            <input type="number" value="{{ $cart->quantity }}"
                                                max="{{ $this->totalStok }}" class="text-center input-quantity" readonly
                                                disabled>
                                            <button class="btn btn1" wire:loading.attr="disabled"
                                                wire:click="incrementQuantity({{ $cart->id }})"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                               
                                </td>
                                <td data-label="Store">{{ $cart->store->store_name }}
                                </td>
                                <td data-label="Tanggal Order"> Rp.
                                    {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}
                                </td>
                                @php
                                    $total += $cart->product->price * $cart->quantity;
                                @endphp
                                <td data-label="Action">
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
                            <select class="form-select" name="store_id"disabled>
                                <option value="" hidden selected>Choose your Payment Method</option>
                
                            </select>
                        @endif

                    </div>

                </div>
                <div class="col-md-5 my-4">
                    <div class="shadow bg-white p-3">
                        <h4>Total:
                            <span>Rp. {{ number_format($total, 0, ',', '.') }}</span>
                        </h4>
                        <hr>
                        <div class="">
                            @if ($total != 0)
                                <button wire:click='order' wire:loading.attr="disabled"
                                    class="btn btn-warning shadow">Checkout
                                    <div class="spinner-border text-light" style="width: 15px;  height:15px;"
                                        role="status" wire:loading wire:target='order'>
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
