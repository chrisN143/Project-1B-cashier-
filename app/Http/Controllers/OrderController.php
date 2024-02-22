<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $title = "Orders";
        $header = "Orders detail";
        $main_breadcrumb = "Orders detail";
        $main_breadcrumb_link = route('orders.detail');
        $breadcrumb = null;

        $id = $request->id;

        return view(
            'app.order.detail',
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
