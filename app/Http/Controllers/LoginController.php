<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {

        $kegiatan = Kegiatan::paginate(10);

        return view('login.index', [
            'kegiatan' => $kegiatan
        ]);
    }

    public function checkStatusLogin()
    {
        if (Auth::check())
        {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login');
    }

    public function authLogin(Request $request)
    {

        $credentials = $request->validate([
            'id_karyawan' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function authLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
