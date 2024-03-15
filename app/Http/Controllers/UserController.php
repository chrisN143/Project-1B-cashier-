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

    public function edit(User $user)
    {
        /* Header Setting */
        $title = "User Edit";
        $header = "User Edit";
        $main_breadcrumb = "User";
        $main_breadcrumb_link = route('user.index');
        $breadcrumb = "Edit";

        $roles = Role::all()
            ->pluck('name', 'name');

        $user_role = $user->roles->first()->name;

        return view('app.users.edit', compact(
            'user',
            'title',
            'header',
            'main_breadcrumb',
            'main_breadcrumb_link',
            'breadcrumb',
            'roles',
            'user_role'
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

    public function store(Request $request)
    {
        /* Validation */
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users|email',
            'password' => 'required|same:confirm-password|min:8',
        ]);

        /* Store */
        DB::transaction(function () use ($request) {
            $input = $request->all();
            $role = $input['role'];
            $input['password'] = bcrypt($input['password']);

            $user = User::create($input);
            $user->assignRole($role);
        });

        /* Alert & Redirect */
        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect()->route('user.index');
    }

    public function update(Request $request, User $user)
    {
        /* Validation */
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|same:confirm-password|min:8',
        ]);

        /* Update */
        DB::transaction(function () use ($request, $user) {
            $input = $request->all();
            $role = $input['role'];

            if (!empty($input['password'])) {
                $input['password'] = bcrypt($input['password']);
            } else {
                $input = Arr::except($input, ['password']);
            }

            $user->update($input);

            DB::table('model_has_roles')
                ->where('model_id', $user->id)
                ->delete();

            $user->assignRole($role);
        });

        /* Alert & Redirect */
        Alert::toast('Data Berhasil Diperbarui', 'success');
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        if ($user->id == Auth::user()->id) {
            Alert::toast('Akun Sedang Dipakai', 'error');
            return back();
        }

        $user->delete();

        /* Alert & Redirect */
        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('user.index');
    }
}
