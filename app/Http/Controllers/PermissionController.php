<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        /* Header Setting */
        $title = "Permission";
        $header = "Permission List";
        $main_breadcrumb = "Permission";
        $main_breadcrumb_link = route('permission.index');
        $breadcrumb = null;

        $title_delete = 'Delete Data!';
        $text = "Are you sure?";
        confirmDelete($title_delete, $text);

        return view('app.permissions.index', compact(
            'title',
            'header',
            'main_breadcrumb',
            'main_breadcrumb_link',
            'breadcrumb'
        ));
    }


    public function create()
    {
        /* Header Setting */
        $title = "Permission Create";
        $header = "Permission Create";
        $main_breadcrumb = "Permission";
        $main_breadcrumb_link = route('permission.index');
        $breadcrumb = "Create";

        return view('app.permissions.create', compact(
            'title',
            'header',
            'main_breadcrumb',
            'main_breadcrumb_link',
            'breadcrumb'
        ));
    }

    public function edit(Permission $permission)
    {
        /* Header Setting */
        $title = "Permission Edit";
        $header = "Permission Edit";
        $main_breadcrumb = "Permission";
        $main_breadcrumb_link = route('permission.index');
        $breadcrumb = "Edit";
        return view('app.permissions.edit', compact(
            'permission',
            'title',
            'header',
            'main_breadcrumb',
            'main_breadcrumb_link',
            'breadcrumb'
        ));
    }

}
