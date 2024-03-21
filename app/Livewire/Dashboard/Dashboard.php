<?php

namespace App\Livewire\Dashboard;

use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Dashboard extends Component
{
    // public $total_user;
    // public $total_role;
    // public $total_permission;
    // public $total_product;
    // public $total_store;
    // public $thisMonthOrder;
    public function updated()
    {
    }
    public function render()
    {
        $thisMonth = Carbon::now()->format('m');
        $total_user = User::all()->count();
        $total_role = Role::all()->count();
        $total_permission = Permission::all()->count();
        $total_product = Product::all()->count();
        $total_store = Store::all()->count();
        $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        return view('livewire.dashboard.dashboard', [
            'total_user' => $total_user,
            'total_role' => $total_role,
            'total_permission' => $total_permission,
            'total_product' => $total_product,
            'total_store' => $total_store,
            'thisMonthOrder' => $thisMonthOrder,
        ]);
    }
}
