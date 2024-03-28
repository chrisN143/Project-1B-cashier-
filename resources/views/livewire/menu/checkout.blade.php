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
        <div class="table-display">

        </div>
        <table wire:poll class="table table-striped">
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
            <button wire:loading.attr="disabled" data-modal-target="select-modal" data-modal-toggle="select-modal"
                class="btn btn-warning border border-1 border-black text-dark mt-3">Checkout Rp.
                {{ number_format($total, 0, ',', '.') }}
                <div class="spinner-border text-light" style="width: 15px;  height:15px;" role="status" wire:loading
                    wire:target='order'>
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
            <!-- Main modal -->
            <div id="select-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Open positions
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="select-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <p class="text-gray-500 dark:text-gray-400 mb-4">Select your desired position:</p>
                            <ul class="space-y-4 mb-4">
                                <li>
                                    <input type="radio" id="job-1" name="job" value="job-1"
                                        class="hidden peer" required />
                                    <label for="job-1"
                                        class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">UI/UX Engineer</div>
                                            <div class="w-full text-gray-500 dark:text-gray-400">Flowbite</div>
                                        </div>
                                        <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-gray-500 dark:text-gray-400"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="job-2" name="job" value="job-2"
                                        class="hidden peer">
                                    <label for="job-2"
                                        class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">React Developer</div>
                                            <div class="w-full text-gray-500 dark:text-gray-400">Alphabet</div>
                                        </div>
                                        <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-gray-500 dark:text-gray-400"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="job-3" name="job" value="job-3"
                                        class="hidden peer">
                                    <label for="job-3"
                                        class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">Full Stack Engineer</div>
                                            <div class="w-full text-gray-500 dark:text-gray-400">Apple</div>
                                        </div>
                                        <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-gray-500 dark:text-gray-400"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </label>
                                </li>
                            </ul>
                            <button
                                class="text-white inline-flex w-full justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Next step
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <button class="btn btn-warning disabled mt-3">Checkout
            </button>
        @endif

    </div>

</div>
