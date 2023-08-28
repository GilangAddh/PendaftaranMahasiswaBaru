<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function main()
    {
        return view('register.login');
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth()->user()->id_role == '2') {
                $request->session()->regenerate();
                Session::flash('alert-success', 'Admin Berhasil Login'); // kasih pesan success
                return redirect()->intended('/dashboardAdmin');
            }
            if (Auth()->user()->id_role == '1') {
                $request->session()->regenerate();
                Session::flash('alert-success', 'Berhasil Login'); // kasih pesan success
                return redirect()->intended('/dashboard');
            }
        }

        Session::flash('alert-danger', 'Gagal Login'); // kasih pesan success
        return back()->with('loginError', 'Login Failed');
    }


    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        Session::flash('alert-success', 'Berhasil Logout'); // kasih pesan success
        return redirect()->intended('/login');
    }
}
