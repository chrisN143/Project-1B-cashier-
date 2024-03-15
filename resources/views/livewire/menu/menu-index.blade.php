<div class="mt-5">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="container my-3">
        <div class="row">
            <div class="col-md-3 my-2">
                <input class="form-control me-2" wire:model.live="search" type="text" placeholder="Search"
                    aria-label="Search">
            </div>
            <div class="col-md-2 my-2">
                <select class="form-select" name="store_id" wire:model.live="store_id">
                    <option value="" selected>All Stores</option>

                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="col-md-2 my-2">
                <button wire:click="filter" class="btn btn-info btn-se" type="submit">filter</button>
            </div> --}}

        </div>
    </div>

    {{-- Card  --}}
    <div class="container mx-auto">
        <div class="row">
            @forelse ($products as $item)
                <div class="col-lg-3 my-2">
                    <div class="card">
                        <img src="{{ asset('storage/images/' . $item->image) }}" class="img-fluid rounded"
                            alt="{{-- $post->category->name --}}">
                        <div class="card-body text-center">
                            <h4 class="card-title"> {{ $item->name }}</h4>
                            <p>

                                <small class="text-body-secondary">
                                    <h5 class="">Category : {{ $item->store->store_name }}</h5>
                                    {{-- $post->created_at->diffForHumans() --}}
                                </small>
                            <h6>Price : Rp. {{ number_format($item->price, 0, ',', '.') }}</h6>
                            </p>

                            {{-- <input type="number" wire:model.live="inputquantity" value="{{ $this->inputquantity }}"
                                    class="form-control me-3" style="width:60px;"> --}}
                            <button wire:click="add({{ $item->id }})" class=" mx-3 btn btn-info btn-sm text-white">
                                Add
                            </button>

                        </div>
                    </div>
                </div>
            @empty
                <div>
                    <h1 class="text-center">Halaman ini kosong!</h1>
                </div>
            @endforelse
            {{ $products->links() }}
            {{-- </div> --}}
        </div>
    </div>
