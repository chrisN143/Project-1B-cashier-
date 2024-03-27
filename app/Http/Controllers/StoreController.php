<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        /* Header Setting */
        $title = "Store";
        $header = "Store List";
        $main_breadcrumb = "Store";
        $main_breadcrumb_link = route('store.index');
        $breadcrumb = null;

        // Confirm Delete Alert
        $title_delete = 'Delete Data!';
        $text = "Are you sure?";
        confirmDelete($title_delete, $text);

        return view(
            'app.store.index',
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
        $title = "Store";

        $main_breadcrumb = "Store";
        $main_breadcrumb_link = route('store.detail');
        $breadcrumb = null;

        $id = $request->id;

        return view(
            'app.store.detail',
            compact(
                'id',
                'title',
                'main_breadcrumb',
                'main_breadcrumb_link',
                'breadcrumb'
            )
        );
    }
    public function show(Request $request)
    {
        /* Header Setting */
        $title = "Store";

        $main_breadcrumb = "Store";
        $main_breadcrumb_link = route('store.show');
        $breadcrumb = null;

        $id = $request->id;

        return view(
            'app.store.show',
            compact(
                'id',
                'title',
                'main_breadcrumb',
                'main_breadcrumb_link',
                'breadcrumb'
            )
        );
    }
}
