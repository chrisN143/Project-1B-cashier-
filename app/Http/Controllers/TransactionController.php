<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        /* Header Setting */
        $title = "Transaction";
        $header = "Transaction List";
        $main_breadcrumb = "Transaction";
        $main_breadcrumb_link = route('transaction.index');
        $breadcrumb = null;

        // Confirm Delete Alert
        $title_delete = 'Delete Data!';
        $text = "Are you sure?";
        confirmDelete($title_delete, $text);

        return view(
            'app.transaction.index',
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
        $title = "Transaction";

        $main_breadcrumb = "Transaction";
        $main_breadcrumb_link = route('transaction.detail');
        $breadcrumb = null;

        $id = $request->id;

        return view(
            'app.transaction.detail',
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
        $title = "Transaction";

        $main_breadcrumb = "Transaction";
        $main_breadcrumb_link = route('transaction.show');
        $breadcrumb = null;

        $id = $request->id;

        return view(
            'app.transaction.show',
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
