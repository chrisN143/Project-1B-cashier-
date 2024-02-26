<div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
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
                            <li class="dropdown-item" href="#"><a href="" class="text-decoration-none">{{ $store->store_name }}</a></li>
                        @endforeach
                    </ul>

                    <a href="{{ route('menu.cart') }}"><button class="btn btn-secondary mx-2"><i
                                class="fa-solid fa-cart-shopping"
                                style="width: 18px"></i>({{ $cartUser }})</button></a>
                </div>
            </div>
            <div class="col-md-3">
                <form class="d-flex" onsubmit="searchItems(event)">
                    <input id="searchInput" class="form-control me-2" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </form>
            </div>

            <div id="searchResults"></div>
            <script>
                function searchItems(event) {
                    event.preventDefault(); // Prevent form submission

                    // Get the search query
                    var searchQuery = document.getElementById('searchInput').value.toLowerCase();

                    // Get all card titles
                    var cardTitles = document.querySelectorAll('.card-title');

                    // Loop through each card title and check if it matches the search query
                    var results = [];
                    cardTitles.forEach(function(title) {
                        var itemTitle = title.textContent.toLowerCase();
                        if (itemTitle.includes(searchQuery)) {
                            // If the title matches, add the entire card to the results array
                            results.push(title.closest('.card-body').parentNode.outerHTML);
                        }
                    });

                    // Display the search results
                    var searchResultsContainer = document.getElementById('searchResults');
                    if (results.length > 0) {
                        searchResultsContainer.innerHTML = results.join('');
                    } else {
                        searchResultsContainer.innerHTML = '<h5 class="text-center"><i>No results found</i></h5>';
                    }
                }
            </script>
        </div>
    </div>

    {{-- Card  --}}
    <div class="container">
        <div class="row justify-content-center" style="display: flex">
            @forelse ($product as $item)
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
                                @if ($this->inputquantity >= 0)
                                    <input type="number" wire:model.live="inputquantity"
                                        value="{{ $this->inputquantity }}" min="1" class="form-control me-3"
                                        style="width:60px;">
                                    <button wire:click="add({{ $item->id }})"
                                        class="btn btn-info btn-sm text-white">
                                        Add
                                    </button>
                                @else
                                    <input type="number" wire:model.live="inputquantity"
                                        value="{{ $this->inputquantity = 0 }}" class="form-control me-3"
                                        style="width:60px;">
                                    <button wire:click="add({{ $item->id }})"
                                        class="btn btn-info btn-sm text-white">
                                        Add
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div>
                    <h1 class="text-center">Halaman ini kosong!</h1>
                </div>
            @endforelse
            {{-- </div> --}}
        </div>
    </div>
