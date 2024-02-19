<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        /* Header Setting */
        $title = "Transastion";
        $header = "Transastion List";
        $main_breadcrumb = "Transastion";
        $main_breadcrumb_link = route('transastion.index');
        $breadcrumb = null;

        // Confirm Delete Alert
        $title_delete = 'Delete Data!';
        $text = "Are you sure?";
        confirmDelete($title_delete, $text);

        return view(
            'app.Transaction.index',
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
        $header = "Transaction Create";
        $main_breadcrumb = "Transaction";
        $main_breadcrumb_link = route('transaction.detail');
        $breadcrumb = null;

        $id = $request->id;

        return view(
            'app.transaction.detail',
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
