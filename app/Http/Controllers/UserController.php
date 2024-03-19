<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        /* Header Setting */
        $title = "User";
        $header = "User List";
        $main_breadcrumb = "User";
        $main_breadcrumb_link = route('user.index');
        $breadcrumb = null;

        // Confirm Delete Alert
        $title_delete = 'Delete Data!';
        $text = "Are you sure?";
        confirmDelete($title_delete, $text);

        return view('app.users.index', compact(
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
        $title = "User Create";
        $header = "User Create";
        $main_breadcrumb = "User";
        $main_breadcrumb_link = route('user.index');
        $breadcrumb = "Create";

        $roles = Role::all()
            ->pluck('name', 'name');

        return view('app.users.create', compact(
            'title',
            'header',
            'main_breadcrumb',
            'main_breadcrumb_link',
            'breadcrumb',
            'roles'
        ));
    }

    public function edit(Request $request, User $user)
    {
        /* Header Setting */
        $title = "User Edit";
        $header = "User Edit";
        $main_breadcrumb = "User";
        $main_breadcrumb_link = route('user.index');
        $breadcrumb = "Edit";
        $userId = $request->id;
        $roles = Role::all()
            ->pluck('name', 'name');

        return view('app.users.edit', compact(
            'user',
            'userId',
            'title',
            'header',
            'main_breadcrumb',
            'main_breadcrumb_link',
            'breadcrumb',
            'roles',
        ));
    }

    public function show(User $user)
    {
        /* Header Setting */
        $title = "User Detail";
        $header = "User Detail";
        $main_breadcrumb = "User";
        $main_breadcrumb_link = route('user.index');
        $breadcrumb = "Detail";

        return view('app.users.show', compact(
            'user',
            'title',
            'header',
            'main_breadcrumb',
            'main_breadcrumb_link',
            'breadcrumb'
        ));
    }


}
