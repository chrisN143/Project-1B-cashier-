<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
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

        return view('roles.index', compact(
            'title',
            'header',
            'main_breadcrumb',
            'main_breadcrumb_link',
            'breadcrumb'
        ));
    }

    public function data_table()
    {
        $model = Role::query();

        return DataTables::eloquent($model)
            ->editColumn('created_at', function ($data) {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d/m/Y | H:i');
                return $formatedDate;
            })
            ->addColumn('action', function ($data) {
                $url_show = route('role.show', $data->id);
                $url_edit = route('role.edit', $data->id);
                $url_delete = route('role.destroy', $data->id);

                $btn = "<div class='btn-group'>";
                $btn .= "<a href='$url_show' class = 'btn btn-primary btn-sm text-nowrap text-white'> <i class='ki-duotone ki-eye'><span class='path1'></span><span class='path2'></span><span class='path3'></span></i> Detail</a>";
                $btn .= "<a href='$url_edit' class = 'btn btn-warning btn-sm text-nowrap text-white'> <i class='ki-duotone ki-notepad-edit'><span class='path1'></span><span class='path2'></span></i> Edit</a>";
                $btn .= "<a href='$url_delete' class = 'btn btn-danger btn-sm text-nowrap text-white' data-confirm-delete='true'><i class='ki-duotone ki-trash-square'><span class='path1'></span><span class='path2'></span> <span class='path3'></span><span class='path4'></span></i> Delete</a>";
                $btn .= "</div>";

                return $btn;
            })
            ->toJson();
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

        return view('roles.create', compact(
            'permissions',
            'title',
            'header',
            'main_breadcrumb',
            'main_breadcrumb_link',
            'breadcrumb'
        ));
    }

    public function edit(Role $role)
    {
        /* Header Setting */
        $title = "Role Edit";
        $header = "Role Edit";
        $main_breadcrumb = "Role";
        $main_breadcrumb_link = route('role.index');
        $breadcrumb = "Edit";

        $permissions = Permission::all();
        $role_permissions = DB::table("role_has_permissions")
            ->where("role_id", $role->id)
            ->pluck('permission_id', 'permission_id')
            ->all();

        return view('roles.edit', compact(
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

        return view('roles.show', compact(
            'role',
            'role_permissions',
            'title',
            'header',
            'main_breadcrumb',
            'main_breadcrumb_link',
            'breadcrumb'
        ));
    }

    public function store(Request $request)
    {
        /* Validation */
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        /* Store */
        DB::transaction(function () use ($request) {
            $input = $request->all();

            $role = Role::create($input);
            $role->syncPermissions($request->permission);
        });

        /* Alert & Redirect */
        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect()->route('role.index');
    }

    public function update(Request $request, Role $role)
    {
        /* Validation */
        $request->validate([
            'name' => 'required'
        ]);

        /* Update */
        DB::transaction(function () use ($request, $role) {
            $input = $request->all();

            $role->update($input);
            $role->syncPermissions($request->permission);
        });

        /* Alert & Redirect */
        Alert::toast('Data Berhasil Diperbarui', 'success');
        return redirect()->route('role.index');
    }

    public function destroy(Role $role)
    {
        $user_role = Auth::user()->roles->first()->id;
        if ($user_role == $role->id) {
            Alert::toast('Role Sedang Dipakai', 'error');
            return back()->withInput();
        }

        $role->delete();

        /* Alert & Redirect */
        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('role.index');
    }
}
