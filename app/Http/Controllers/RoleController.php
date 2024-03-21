<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        /* Header Setting */
        $title = "Role";
        $header = "Role List";
        $main_breadcrumb = "Role";
        $main_breadcrumb_link = route('role.index');
        $breadcrumb = null;

        // Confirm Delete Alert
        $title_delete = 'Delete Data!';
        $text = "Are you sure?";
        confirmDelete($title_delete, $text);

        return view('app.roles.index', compact(
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
        $title = "Role Create";
        $header = "Role Create";
        $main_breadcrumb = "Role";
        $main_breadcrumb_link = route('role.index');
        $breadcrumb = "Create";

        $permissions = Permission::all();

        return view('app.roles.create', compact(
            'permissions',
            'title',
            'header',
            'main_breadcrumb',
            'main_breadcrumb_link',
            'breadcrumb'
        ));
    }

    public function edit(Request $request, Role $role)
    {
        /* Header Setting */
        $title = "Role Edit";
        $header = "Role Edit";
        $main_breadcrumb = "Role";
        $main_breadcrumb_link = route('role.index');
        $breadcrumb = "Edit";
        $id = $request->id;
        $permissions = Permission::all();
        $role_permissions = DB::table("role_has_permissions")
            ->where("role_id", $role->id)
            ->pluck('permission_id', 'permission_id')
            ->all();

        return view('app.roles.edit', compact(
            'id',
            'role',
            'permissions',
            'role_permissions',
            'title',
            'header',
            'main_breadcrumb',
            'main_breadcrumb_link',
            'breadcrumb'
        ));
    }

    public function show(Role $role)
    {
        /* Header Setting */
        $title = "Role Detail";
        $header = "Role Detail";
        $main_breadcrumb = "Role";
        $main_breadcrumb_link = route('role.index');
        $breadcrumb = "Detail";

        $role_permissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $role->id)
            ->get();

        return view('app.roles.show', compact(
            'role',
            'role_permissions',
            'title',
            'header',
            'main_breadcrumb',
            'main_breadcrumb_link',
            'breadcrumb'
        ));
    }
}
