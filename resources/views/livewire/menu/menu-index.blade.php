<div>
    <div class="container my-3">
        <div class="row justify-content-between">
            <div class="col-md-3">
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($stores as $store)
                            <li class="dropdown-item" href="#"><a href="">{{ $store->store_name }}</a></li>
                        @endforeach
                    </ul>

                    <a href="{{ route('menu.cart') }}"><button class="btn btn-secondary mx-2"><i
                                class="fa-solid fa-cart-shopping"
                                style="width: 18px"></i>({{ count($carts) }})</button></a>
                </div>
            </div>
            <div class="col-md-3">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Card  --}}
    <div class="container">
        <div class="row justify-content-center" style="display: flex">
            @foreach ($product as $item)
                <div class="col-md-3 m-1">
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
                            <h6>Price : Rp. {{ $item->price }}</h6>
                            </p>
                            <div class="d-flex mx-3">
                                <input type="number" wire:model="inputquantity" value="{{ $this->inputquantity }}" class="form-control me-3" style="width:60px;">
                                <button wire:click="add({{ $item->id }})" class="btn btn-info btn-sm text-white">
                                    Add
                            
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- </div> --}}
        </div>
    </div>
