<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


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
        $main_breadcrumb_link = route('product.index');
        $breadcrumb = null;

        $id = $request->id;

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
}
