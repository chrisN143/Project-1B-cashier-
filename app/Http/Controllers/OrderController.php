<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        /* Header Setting */
        $title = "Order";
        $header = "Order List";
        $main_breadcrumb = "Order";
        $main_breadcrumb_link = route('order.index');
        $breadcrumb = null;

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
                'breadcrumb'
            )
        );
    }

    public function detail(Request $request)
    {
        /* Header Setting */
        $title = "Order";
        $header = "Order detail";
        $main_breadcrumb = "Order detail";
        $main_breadcrumb_link = route('order.detail');
        $breadcrumb = null;

        $id = $request->id;

        return view(
            'app.Order.detail',
            compact(
                'id',
                'title',
                'header',
                'main_breadcrumb',
                'main_breadcrumb_link',
                'breadcrumb'
            )
        );
    }
}
