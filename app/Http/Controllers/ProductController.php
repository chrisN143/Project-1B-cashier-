<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $title = "Product";
        $header = "Product List";
        $main_breadcrumb = "Product";
        $main_breadcrumb_link = route('product.index');
        $breadcrumb = null;

        // Confirm Delete Alert
        $title_delete = 'Delete Data!';
        $text = "Are you sure?";
        confirmDelete($title_delete, $text);

        return view(
            'app.product.index',
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
        $title = "Product";
        $header = "Product Create";
        $main_breadcrumb = "Product";
        $main_breadcrumb_link = route('product.detail');
        $breadcrumb = null;

        $id = $request->product_id;

        return view(
            'app.product.detail',
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
    public function show(Request $request)
    {
        /* Header Setting */
        $title = "Product";
        $header = "Product detail";
        $main_breadcrumb = "Product";
        $main_breadcrumb_link = route('product.show');
        $breadcrumb = null;

        $id = $request->product_id;

        return view(
            'app.product.show',
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
