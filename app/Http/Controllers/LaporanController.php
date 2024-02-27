<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class LaporanController extends Controller

{
    public function index()
    {
        /* Header Setting */
        $title = "Laporan";
        $header = "Laporan List";
        $main_breadcrumb = "Laporan";
        $main_breadcrumb_link = route('laporan.index');
        $breadcrumb = null;

        // Confirm Delete Alert
        $title_delete = 'Delete Data!';
        $text = "Are you sure?";
        confirmDelete($title_delete, $text);

        return view(
            'app.laporan.index',
            compact(
                'title',
                'header',
                'main_breadcrumb',
                'main_breadcrumb_link',
                'breadcrumb',
            )
        );
    }
    public function detail($reportId)
    {
        /* Header Setting */
        $title = "Laporan";
        $header = "Laporan detail";
        $main_breadcrumb = "Laporan detail";
        $main_breadcrumb_link = url('laporan/' . $reportId); //$reportId didapatkan dari codingan {{$order->id}} pada table-order.blade.php
        $breadcrumb = null;
        $order = Order::where('order_code', $reportId)->first();
        if ($order) {
            return view(
                'app.laporan.detail',
                compact(

                    'title',
                    'header',
                    'main_breadcrumb',
                    'main_breadcrumb_link',
                    'breadcrumb',
                    'order'
                )

            );
        } else {
            return redirect('/laporan')->with('message', 'Order Id not Found');
        }
    }
}
