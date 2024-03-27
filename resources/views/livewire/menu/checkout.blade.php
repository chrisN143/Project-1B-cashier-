<div class="border bg-light border-1 border-dark rounded  my-3">

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

    <div class="p-2">
        <h5>Check Out : On Store {{ $cartStore ? $cartStore->store_name : '' }} </h5>

        <table wire:poll.3s class="table table-striped">
            <tbody>
                @php
                    $total = 0;
                @endphp
                @forelse ($carts as $cart)
                    <tr class="text-center">
                        <td>
                            <strong>{{ $cart->product->name }}</strong>
                        </td>
                        <td>
                            {{-- @if ($cart->quantity > 0)
                            <button class="btn btn1" wire:loading.attr="disabled"
                                wire:click="decrementQuantity({{ $cart->id }})"><i class="fa fa-minus"></i></button>
                            <input type="number" value="" max="{{ $this->totalStok }}"
                                class="text-center input-quantity" readonly disabled>
                                <button class="btn btn1" wire:loading.attr="disabled"
                                wire:click="incrementQuantity({{ $cart->id }})"><i class="fa fa-plus"></i></button> --}}

                            <h6>{{ $cart->quantity }}</h6>
                            {{-- <button class="btn btn1" wire:loading.attr="disabled"
                                wire:click="incrementQuantity({{ $cart->id }})"><i class="fa fa-plus"></i></button> --}}

                        </td>

                        <td>
                            <strong>
                                Rp.
                                {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}
                            </strong>
                        </td>
                        @php
                            $total += $cart->product->price * $cart->quantity;
                        @endphp
                        <td>
                             <button class="btn btn1" wire:loading.attr="disabled"
                                wire:click="decrementQuantity({{ $cart->id }})"><i class="fa fa-minus"></i></button>

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


    <div class="bg-white p-3 rounded">
        @if ($total != 0)
            <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Nama Customer"
                wire:model="customerName">
            <select class="form-select mt-3" name="payment_id" wire:model="payment_id">
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
            <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Nama Customer" disabled>
            <select class="form-select mt-3" name="store_id"disabled>
                <option value="" hidden selected>Choose your Payment Method</option>

            </select>
        @endif
        @if ($total != 0)
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" wire:click='order'
                wire:loading.attr="disabled"
                class="btn btn-warning border border-1 border-black text-dark mt-3">Checkout Rp.
                {{ number_format($total, 0, ',', '.') }}
                <div class="spinner-border text-light" style="width: 15px;  height:15px;" role="status" wire:loading
                    wire:target='order'>
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>

        @else
            <button class="btn btn-warning disabled mt-3">Checkout
            </button>
        @endif

    </div>

</div>
