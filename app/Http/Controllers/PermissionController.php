<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

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

        // Confirm Delete Alert
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

    // public function data_table()
    // {
    //     $model = Permission::query();

    //     return DataTables::eloquent($model)
    //         ->editColumn('created_at', function ($data) {
    //             $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d/m/Y | H:i');
    //             return $formatedDate;
    //         })
    //         ->addColumn('action', function ($data) {
    //             $url_edit = route('permission.edit', $data->id);
    //             $url_delete = route('permission.destroy', $data->id);

    //             $btn = "<div class='btn-group'>";
    //             $btn .= "<a href='$url_edit' class = 'btn btn-warning btn-sm text-nowrap text-white'> <i class='ki-duotone ki-notepad-edit'><span class='path1'></span><span class='path2'></span></i> Edit</a>";
    //             $btn .= "<a href='$url_delete' class = 'btn btn-danger btn-sm text-nowrap text-white' data-confirm-delete='true'><i class='ki-duotone ki-trash-square'><span class='path1'></span><span class='path2'></span> <span class='path3'></span><span class='path4'></span></i> Delete</a>";
    //             $btn .= "</div>";

    //             return $btn;
    //         })
    //         ->toJson();
    // }

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

    public function edit(Request $request)
    {
        /* Header Setting */
        $title = "Permission Edit";
        $header = "Permission Edit";
        $main_breadcrumb = "Permission";
        $main_breadcrumb_link = route('permission.index');
        $breadcrumb = "Edit";
        $permission= $request->id;

        return view('app.permissions.edit', compact(
            'permission',
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
            'name' => 'required'
        ]);

        /* Store */
        $input = $request->all();
        $permission = Permission::create($input);
        if (!$permission) {
            Alert::toast('Terdapat kesalahan data', 'error');
            return back()->withInput();
        }

        /* Alert & Redirect */
        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect()->route('permission.index');
    }

    public function update(Request $request, Permission $permission)
    {
        /* Validation */
        $request->validate([
            'name' => 'required'
        ]);

        /* Update */
        if (!$permission) {
            Alert::toast('Terdapat kesalahan data', 'error');
            return back()->withInput();
        }

        $input = $request->all();
        $permission->update($input);

        /* Alert & Redirect */
        Alert::toast('Data Berhasil Diperbarui', 'success');
        return redirect()->route('permission.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        /* Alert & Redirect */
        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('permission.index');
    }
}
