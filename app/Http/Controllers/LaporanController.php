<?php

namespace App\Http\Controllers;

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

    public function detail(Request $request)
    {
        /* Header Setting */
        $title = "Laporan";
        $header = "Laporan Create";
        $main_breadcrumb = "Laporan";
        $main_breadcrumb_link = route('laporan.detail');
        $breadcrumb = null;

        $id = $request->id;

        return view(
            'app.laporan.detail',
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
