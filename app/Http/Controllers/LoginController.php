<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Peraturan;
use App\Models\SOP;
use App\Models\Departemen;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function index()
    {

        $kegiatan = Kegiatan::latest()->paginate(5);
        $sop = Sop::latest()->paginate(5);
        $peraturan = Peraturan::latest()->paginate(5);
        $departemen = Departemen::latest()->paginate(5);
        

        return view('login.index', [
            'kegiatan' => $kegiatan,
            'sop' => $sop,
            'peraturan' => $peraturan,
            'departemen' =>$departemen
            
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

    public function filterkegiatanlogin($tgl)
    {
        $kegiatan = DB::table('kegiatans')->where('tanggal', $tgl)->get();

        return view('login.index', [
            'kegiatan' => $kegiatan
        ]);
    }

    public function filterperaturanlogin($tgl)
    {
        $peraturan = DB::table('peraturans')->where('tanggal', $tgl)->get();

        return view('login.index', [
            'peraturan' => $peraturan
        ]);
    }

    public function filterSOPlogin($tgl)
    {
        $sop = DB::table('sops')->where('tanggal', $tgl)->get();

        return view('login.index', [
            'sop' => $sop
        ]);
    }
}
