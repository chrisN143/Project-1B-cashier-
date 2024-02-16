<div>
    <div class='form-group'>
        <label>Nomor</label>
        <input type='text' class='form-control' wire:model='number'>
    </div>
    <div class='form-group'>
        <label>Nama</label>
        <input type='text' class='form-control' wire:model='name'>
    </div>
    <div class='form-group'>
        <label>Harga</label>
        <input type='text' class='form-control' wire:model='price'>
    </div>
    <button class='btn btn-primary' wire:click='store'>
        Simpan
    </button>
</div>
