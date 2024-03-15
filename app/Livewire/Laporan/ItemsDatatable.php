<?php

namespace App\Livewire\Laporan;

// use App\Models\Payment;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Traits\WithDatatable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class ItemsDatatable extends Component
{
    use WithDatatable;
    public $start_date;

    public $payment;
    public $end_date;
    public function onMount()
    {
        $this->start_date = Carbon::now()->format('Y-m-d');
        $this->end_date = Carbon::now()->add(31, 'day')->format('Y-m-d');
    }

    #[On('add-filter')]
    public function handleDate($arr)
    {
        $this->start_date = $arr['start_date'];
        $this->end_date = $arr['end_date'];
        $this->payment = $arr['payment'];
    }

    public function destroy($id)
    {
        $item = Order::find($id);

        $item->delete();
    }

    public function getColumns(): array
    {
        
        return [
            [
                'key' => 'order_code',
                'name' => 'Id',
                'render' => function ($item) {
                    return $item->order_code;
                }

            ],
            [
                'key' => 'customer_name',
                'name' => 'Name',

            ],
            [
                'key' => 'total_price',
                'name' => 'Stok',
                'render' => function ($item) {
                    return 'Rp.' . number_format($item->total_price, 0, ',', '.');
                }

            ],
            [
                'key' => 'payment_method',
                'name' => 'Payment',

            ],
            [
                'key' => 'created_at',
                'name' => 'Stok',

            ],
            [
                'name' => 'Aksi',
                'sortable' => false,
                'searchable' => false,
                'render' => function ($item) {
                    $authUser = User::find(Auth::id());

                    $detailsHtml = '';
                    $detailsUrl = route('laporan.detail', $item->order_code);
                    $detailsHtml = "<a href='$detailsUrl' class='btn btn-primary btn-sm ml-2'><i class='fa-solid fa-eye'></i></a>";
                    $html = "$detailsHtml";

                    return $html;
                },
            ],
        ];
    }
    public function getQuery(): Builder
    {

        if ($this->payment)
            return Order::whereDate('created_at', '>=', $this->start_date)
                ->whereDate('created_at', '<=', $this->end_date)
                ->where('payment_method', $this->payment);
        else
            return Order::whereDate('created_at', '>=', $this->start_date)
                ->whereDate('created_at', '<=', $this->end_date);
    }

    public function getView(): string
    {
        return 'livewire.laporan.laporanDatatable';
    }
}
