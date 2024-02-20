<div>
    <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="index">
            <thead>
                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-25px sorting" style="width: 25px;">No</th>
                    <th class="min-w-125px sorting" style="width: 125px;">
                        Nama</th>
    
                    <th class="min-w-125px sorting" style="width: 125px;">
                        Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 fw-semibold">
                @foreach ($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['payment_method'] }}</td>
                        <td>
                            <a class='btn btn-primary' href="{{ route('transaction.detail', ['id' => $item['id']]) }}">
                                Edit
                            </a>
                            <button class='btn btn-danger' wire:click='destroy({{ $item['id'] }})' 
                                wire:confirm="Are you sure you want to delete this post?">
                                Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
