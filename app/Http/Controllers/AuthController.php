<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        $title = "Login";
        return view('auth.login', compact('title'));
    }

    public function register()
    {
        $title = "Register";
        return view('auth.register', compact('title'));
    }

    public function loginStore(Request $request)
    {
        /* Validation */
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        /* Login */
        $login_type = filter_var(($request->username), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $request->merge([
            $login_type => $request->username
        ]);
        $remember_token = $request->remember_token;
        $credentials = $request->only($login_type, 'password');

        if (Auth::attempt($credentials, $remember_token)) {
            $request->session()->regenerate();

            if (auth()->user()->hasAnyPermission('dashboard-view')) {
                return redirect()->route('dashboard')
                    ->withSuccess('Anda Berhasil Login!');
            } elseif (auth()->user()->hasAnyPermission('master-data-view')) {
                return redirect()->route('product.index')
                    ->withSuccess('Anda Berhasil Login!');
            } elseif (auth()->user()->hasAnyPermission('userManegement-list')) {
                # code...
                return redirect()->route('user.index')
                    ->withSuccess('Anda Berhasil Login!');
            } elseif (auth()->user()->hasAnyPermission('laporan-list')) {
                return redirect()->route('laporan.index')
                    ->withSuccess('Anda Berhasil Login!');
            } elseif (auth()->user()->hasAnyPermission('menuView-list')) {
                return redirect()->route('menu.index')
                    ->withSuccess('Anda Berhasil Login!');
            } else {
                return redirect()->route('menu.index')
                    ->withSuccess('Anda Berhasil Login!');
            }
        }

        Alert::error('Gagal', 'Email/Password Salah!');
        return back()->onlyInput('usename');
    }

    public function registerStore(Request $request)
    {
        /* Validation */
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password|min:8',
        ]);

        /* Store */
        $input = $request->all();
        $input['password'] = Crypt::encrypt($input['password']);

        $user = User::create($input);
        if (!$user) {
            Alert::toast('Terdapat kesalahan data', 'error');
            return back()->withInput();
        }
        $user->assignRole('User');

        /* Alert & Redirect */
        Alert::toast('Akun berhasil dibuat, silahkan login', 'success');
        return redirect()->route('login');
    }

    public function dashboard()
    {
        /* Validate */
        if (Auth::check()) {
            /* Header Setting */
            $title = "Dashboard";
            $header = "Dashboard";
            $main_breadcrumb = "Dashboard";
            $main_breadcrumb_link = route('dashboard');
            $breadcrumb = null;

            /* Count Data */
            $total_user = User::all()->count();
            $total_role = Role::all()->count();
            $total_permission = Permission::all()->count();

            return view('auth.dashboard', compact('title', 'header', 'main_breadcrumb', 'main_breadcrumb_link', 'breadcrumb', 'total_user', 'total_role', 'total_permission'));
        }

        /* Alert & Redirect */
        Alert::toast('Silahkan login terlebih dahulu', 'error');
        return redirect()->route('login')->onlyInput('username');
    }

    public function logout(Request $request)
    {
        /* Validate */
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        /* Alert & Redirect */
        Alert::toast('Berhasil logout', 'success');
        return redirect()->route('login');
    }
}
