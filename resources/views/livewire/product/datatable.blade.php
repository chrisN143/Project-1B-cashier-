<div class="table-responsive">
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatable">
        <thead>
            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                <th class="min-w-25px sorting" style="width: 25px;">No</th>
                <th class="min-w-125px sorting" style="width: 125px;">Nomor</th>
                <th class="min-w-125px sorting" style="width: 125px;">
                    Nama</th>
                <th class="min-w-50px sorting" style="width: 50px;">
                    Harga</th>
                <th class="min-w-125px sorting" style="width: 125px;">
                    Created At</th>
                <th class="min-w-125px sorting" style="width: 125px;">
                    Action</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 fw-semibold">
            @foreach ($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['number'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['created_at'] }}</td>
                    <td>
                        <a class='btn btn-primary' href="{{ route('product.detail', ['id' => $item['id']]) }}">
                            Edit
                        </a>
                        <button class='btn btn-danger' wire:click='destroy({{ $item['id'] }})'>
                            Hapus
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
