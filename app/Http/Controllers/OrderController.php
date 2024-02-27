<?php

namespace App\Http\Controllers;
use Hashids\Hashids;
use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    public function index()
    {
        /* Header Setting */
        $title = "Orders";
        $header = "Orders List";
        $main_breadcrumb = "Orders";
        $main_breadcrumb_link = route('orders.index');
        $breadcrumb = null;
        $orders = Order::all();
$hash = new Hashids();
        // Confirm Delete Alert
        $title_delete = 'Delete Data!';
        $text = "Are you sure?";
        confirmDelete($title_delete, $text);

        return view(
            'app.order.index',
            compact(
                'title',
                'header',
                'main_breadcrumb',
                'main_breadcrumb_link',
                'breadcrumb',
                'orders',
                'hash'
            )
        );
    }

    public function detail($orderId)
    {
        /* Header Setting */
        $title = "Orders";
        $header = "Orders detail";
        $main_breadcrumb = "Orders detail";
        $main_breadcrumb_link =url('orders/'. $orderId) ; //$orderId didapatkan dari codingan {{$order->id}} pada table-order.blade.php
        $breadcrumb = null;
        $order = Order::where('user_id', auth()->user()->id)->where('id', $orderId)->first();


        return view(
            'app.order.detail',
            compact(

                'title',
                'header',
                'main_breadcrumb',
                'main_breadcrumb_link',
                'breadcrumb',
                'order',
            )
        );
    }
}
