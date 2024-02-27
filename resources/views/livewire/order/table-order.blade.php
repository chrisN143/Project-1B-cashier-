@if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
@endif
<div class="card">
    <div class="card-header border-0 pt-6">
        <table class="table table-row-dashed ">
            <thead class="text-gray-600 fw-semibold">
                <tr>
                    <th class="min-w-125px sorting" style="width: 125px;" scope="col">NAME</th>
                    <th class="min-w-125px sorting" style="width: 125px;" scope="col">STATUS</th>
                    <th class="min-w-125px sorting" style="width: 125px;" scope="col">CREATED AT</th>
                    <th class="min-w-125px sorting" style="width: 125px;" scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th class="my-2">{{ $order->customer_name }}</th>
                        <td class="my-2">{{ $order->status_message }}</td>
                        <td class="my-2">{{ $order->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="">
                                <a href="{{ url('orders/' . $order->order_code) }}" wire:click="show"
                                    class="btn btn-dark btn-sm"><i class="fa-solid fa-eye "></i></a>
                                {{-- <button wire:click="edit"  class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button> --}}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
