<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                'breadcrumb'
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
}
