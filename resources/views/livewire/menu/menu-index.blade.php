<div>

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
    <div class="container my-3">
        <div class="row">
            <div class="col-md-6 my-2">
                <input class="form-control me-2" wire:model.live="search" type="text" placeholder="Search"
                    aria-label="Search">
            </div>
            <div class="col-md-6 my-2">
                <select class="form-select" name="store_id" wire:model.live="store_id">
                    <option value="" hidden selected>All Stores</option>
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 g-4">
            @forelse ($products as $item)
                <div class="col">
                    <div class="card border-1 border-dark">
                        {{-- <img src="{{ asset('storage/images/' . $item->image) }}" class="card-img-top" alt=""> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">
                                <small class="text-muted">Category: {{ $item->store->store_name }}</small><br>
                                <small class="text-muted">Stock: {{ $item->stok }}</small><br>
                                <strong>Price: Rp. {{ number_format($item->price, 0, ',', '.') }}</strong>
                            </p>
                            <button wire:click="add({{ $item->id }})" class="btn btn-info btn-sm">Add</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <h1 class="text-center">No items available!</h1>
                </div>
            @endforelse
        </div>
        {{ $products->links() }}
    </div>
</div>
