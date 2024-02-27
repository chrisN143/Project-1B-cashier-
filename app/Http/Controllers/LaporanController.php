<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
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

    public function detail($laporanId)
    {
        /* Header Setting */
        $title = "Laporan";
        $header = "Laporan detail";
        $main_breadcrumb = "Laporan detail";
        $main_breadcrumb_link = url('laporan/' . $reportId); //$orderId didapatkan dari codingan {{$order->id}} pada table-order.blade.php
        $breadcrumb = null;
        $report = Order::where('order_code', $reportId)->first();
        if ($report) {
            return view(
                'app.laporan.detail',
                compact(
                'title',
                'header',
                'main_breadcrumb',
                'main_breadcrumb_link',
                'breadcrumb',
                'laporan',
            )
            );
        }
    }
}
