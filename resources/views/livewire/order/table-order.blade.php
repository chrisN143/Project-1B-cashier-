<div class="card">
    <div class="card-header border-0 pt-6">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Payment method</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                    <tr>
                      <th>{{ $order->customer_name }}</th>
                      <td>{{ $order->status_message }}</td>
                      <td>{{ $order->created_at }}</td>
                      <td><button wire:click="show" type="button" class="btn btn-outline-dark"><i class="fa-solid fa-eye"></i></button></td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
