<?php

namespace App\Http\Controllers;
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
        $orders = Order::latest()->where('user_id', auth()->user()->id);

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

            )
        );
    }

    public function detail($orderId)
    {
        /* Header Setting */
        $title = "Orders";
        $header = "Orders detail";
        $main_breadcrumb = "Orders detail";
        $main_breadcrumb_link = url('orders/' . $orderId); //$orderId didapatkan dari codingan {{$order->id}} pada table-order.blade.php
        $breadcrumb = null;
        $order = Order::where('order_code', $orderId)->first();
        if ($order) {
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
        } else {
            return redirect('/orders')->with('message', 'Order Id not Found');
        }
    }

    public function print($orderId)
    {
        /* Header Setting */
        $title = "Print Your Order";
        $order = Order::where('order_code', $orderId)->first();
        if ($order) {
            return view(
                'app.order.print-order',
                compact(
                    'title',
                    'order',
                )
            );
        } else {
            return redirect('/orders')->with('message', 'Order Id not Found');
        }
    }
}
