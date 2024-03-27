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
    public $total_user;
    public $total_role;
    public $total_permission;
    public $total_product;
    public $total_store;
    public $thisMonthOrder;
    public function mount()
    {
        $thisMonth = Carbon::now()->format('m');
        $this->total_user = User::all()->count();
        $this->total_role = Role::all()->count();
        $this->total_permission = Permission::all()->count();
        $this->total_product = Product::all()->count();
        $this->total_store = Store::all()->count();
        $this->thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
    }
    public function render()
    {
       
        return view('livewire.dashboard.dashboard');
    }
}
