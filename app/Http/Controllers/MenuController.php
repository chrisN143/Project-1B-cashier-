<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class MenuController extends Controller
{
    public function index()
    {
        /* Header Setting */
        $title = "Menu";
        $header = "Menu List";
        $main_breadcrumb = "Menu";
        $main_breadcrumb_link = route('menu.index');
        $breadcrumb = null;
        $product = Product::all();
        // Confirm Delete Alert
        $title_delete = 'Delete Data!';
        $text = "Are you sure?";
        confirmDelete($title_delete, $text);

        return view(
            'app.menu.index',
            compact(
                'title',
                'header',
                'main_breadcrumb',
                'main_breadcrumb_link',
                'breadcrumb',
                'product'
            )
        );
    }

    public function detail(Request $request)
    {
        /* Header Setting */
        $title = "Menu";
        $header = "Menu Create";
        $main_breadcrumb = "Menu";
        $main_breadcrumb_link = route('menu.detail');
        $breadcrumb = null;

        $id = $request->id;

        return view(
            'app.menu.detail',
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
    public function cart(Request $request)
    {
        /* Header Setting */
        $title = "Menu";
        $header = "Menu Create";
        $main_breadcrumb = "Menu";
        $main_breadcrumb_link = route('menu.cart');
        $breadcrumb = null;
        $id = $request->id;

        return view(
            'app.menu.cart',
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
    public function checkout()
    {
        /* Header Setting */
        $title = "Check Out";
        $header = "Check Out Create";
        $main_breadcrumb = "Check Out";
        $main_breadcrumb_link = route('menu.checkout');
        $breadcrumb = null;
        $id = $request->id;

        return view(
            'app.menu.checkout',
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
