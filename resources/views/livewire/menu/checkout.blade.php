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
                    <h1 class="text-center">No cart Avaiable!</h1>
                @endforelse
            </tbody>
        </table>

    </div>


    <div class="bg-white p-3 rounded">
        @if ($total != 0)
            {{-- <label>Customer :</label>
            <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Nama Customer"
                wire:model="customerName"> --}}

            {{-- <select class="form-select mt-3" name="payment_id" wire:model="payment_id">
                <option value="" hidden selected>Choose your Payment Method</option>
                @foreach ($payment as $method)
                    <option value="{{ $method->payment_method }}">
                        {{ $method->payment_method }}</option>
                @endforeach
            </select> --}}

            @error('payment_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        @else
            <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Nama Customer" disabled>
            <select class="form-select mt-3" name="store_id"disabled>
                <option value="" hidden selected></option>

            </select>
        @endif

        <button data-modal-target="modal" data-modal-toggle="modal" class="btn btn-primary" type="button">
            Checkout Rp. {{ number_format($total, 0, ',', '.') }}
        </button>

        {{-- modal --}}
        <div id="modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Order Transaction
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer
                                    Name</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Customer Name" wire:model="customerName">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                    Price</label>
                                <input name="price" id="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="Rp. {{ number_format($total, 0, ',', '.') }}" readonly>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="category" wire:model="payment_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment
                                    Method</label>
                                <select id="category"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="" hidden selected>Choose Payment</option>
                                    @foreach ($payment as $method)
                                        <option value="{{ $method->payment_method }}">
                                            {{ $method->payment_method }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        @if ($total != 0)
                            <button data-modal-target="modal" data-modal-toggle="modal" wire:click='order'
                                wire:loading.attr="disabled"
                                class="btn btn-warning border border-1 border-black text-dark mt-3">Checkout Rp.
                                {{ number_format($total, 0, ',', '.') }}
                                <div class="spinner-border text-light" style="width: 15px;  height:15px;" role="status"
                                    wire:loading wire:target='order'>
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>
                        @else
                            <button class="btn btn-warning disabled mt-3">Checkout
                            </button>
                        @endif

                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
