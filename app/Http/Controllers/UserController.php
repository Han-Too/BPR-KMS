<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Sertifikasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (Auth::user()->role == "Karyawan")
        {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        }

        $user = User::paginate(5);

        return view('datakaryawan.index', [
            'user' => $user,
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datakaryawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datauser = $request->validate([
            'id_karyawan' => 'required|max:12',
            'tgl_masuk' => 'required',
            'password' => 'required|min:8|max:16',
            'profile_photo_path' => 'image|file|max:1024',
            'name' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'status_karyawan' => 'required',
            'alamat' => 'required',
            'role' => 'required',
        ]);

        $cekUser = DB::table('users')
                        ->where('id_karyawan', $request->id_karyawan)
                        ->where('name', $request->name)
                        ->first();

        if ($cekUser)
        {
            return redirect()->route("menu-karyawan")->with('error', 'Data user Sudah ada.!');
        }

        $datauser['password'] = bcrypt($datauser['password']);

        if ($request->profile_photo_path != null)
        {
            $files = $request->file('profile_photo_path');
            $originalFileName = $files->getClientOriginalName();
            $datauser['profile_photo_path'] = $files->storeAs('post-image-profile', $originalFileName);
        }
            
        User::create($datauser);
        return redirect()->route("menu-karyawan")->with('message', 'Data berhasil di tambahkan.');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        if ((Auth::user()->id != $user->id) && (Auth::user()->role === 'Karyawan'))
        {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        }

        // $identitas = DB::table('identitas')->where('id_karyawan', $user->id_karyawan)->get();
        // $pendidikan = DB::table('pendidikans')->where('id_karyawan', $user->id_karyawan)->get();
        // $pekerjaan = DB::table('pekerjaans')->where('id_karyawan', $user->id_karyawan)->get();
        // $sertifikasi = DB::table('sertifikasis')->where('id_karyawan', $user->id_karyawan)->get();

        return view('datakaryawan.edit', [
            'item' => $user,
            // 'dataidentitas' => $identitas,
            // 'datapendidikan' => $pendidikan,
            // 'datapekerjaan' => $pekerjaan,
            // 'datasertifikasi' => $sertifikasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $datauser = $request->validate([
            'id_karyawan' => 'required|max:12',
            'tgl_masuk' => 'required',
            'profile_photo_path' => 'image|file|max:1024',
            'name' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'status_karyawan' => 'required',
            'alamat' => 'required',
            'role' => 'required',
        ]);
        
        if ($request->file('profile_photo_path'))
        {
            if ($request->oldImage) 
            {
                Storage::delete($request->oldImage);
            }
            $files = $request->file('profile_photo_path');
            $originalFileName = $files->getClientOriginalName();
            $datauser['profile_photo_path'] = $files->storeAs('post-image-profile', $originalFileName);
        }

        $user->update($datauser);
        return redirect()->route("menu-karyawan")->with('message', 'Data berhasil di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_karyawan)
    {
        $user = DB::table('users')->where('id_karyawan', $id_karyawan)->first();
        $identitas = DB::table('identitas')->where('id_karyawan', $id_karyawan)->first();
        $pendidikan = DB::table('pendidikans')->where('id_karyawan', $id_karyawan)->first();
        $pekerjaan = DB::table('penggajians')->where('id_karyawan', $id_karyawan)->first();
        $sertifikasi = DB::table('sertifikasis')->where('id_karyawan', $id_karyawan)->first();
        $presensiHarian = DB::table('presensis')->where('id_karyawan', $id_karyawan)->first();
        $presensiBulanan = DB::table('presensi_bulanans')->where('id_karyawan', $id_karyawan)->first();
        $penggajian = DB::table('penggajians')->where('id_karyawan', $id_karyawan)->first();

        if ($user)
        {
            if ($user->profile_photo_path) 
            {
                Storage::delete($user->profile_photo_path);
            }
            DB::table('users')->where('id_karyawan', $id_karyawan)->delete();
        }

        if ($identitas)
        {
            if ($identitas->identity_picture)
            {
                Storage::delete($identitas->identity_picture);
            }
            DB::table('identitas')->where('id_karyawan', $id_karyawan)->delete();
        }

        if ($pendidikan)
        {
            DB::table('pendidikans')->where('id_karyawan', $id_karyawan)->delete();
        }

        if ($pekerjaan)
        {
            DB::table('penggajians')->where('id_karyawan', $id_karyawan)->delete();
        }

        if ($sertifikasi)
        {
            DB::table('sertifikasis')->where('id_karyawan', $id_karyawan)->delete();
        }

        if ($presensiHarian)
        {
            DB::table('presensis')->where('id_karyawan', $id_karyawan)->delete();
        }

        if ($presensiBulanan)
        {
            DB::table('presensi_bulanans')->where('id_karyawan', $id_karyawan)->delete();
        }

        if ($penggajian)
        {
            DB::table('penggajians')->where('id_karyawan', $id_karyawan)->delete();
        }

        return redirect()->route("menu-karyawan")->with('message', 'Data berhasil di hapus.');
    }

    public function destroyIdentitas($id)
    {
        $identitas = Identitas::findOrFail($id);
        if ($identitas->identity_picture)
        {
            Storage::delete($identitas->identity_picture);
        }
        $identitas->delete();
        return back()->with('message', 'Data berhasil di hapus.');
    }

    public function destroyPendidikan($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();
        return back()->with('message', 'Data berhasil di hapus.');
    }

    public function destroyPekerjaan($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->delete();
        return back()->with('message', 'Data berhasil di hapus.');
    }

    public function destroySertifikasi($id)
    {
        $sertifikasi = Sertifikasi::findOrFail($id);
        $sertifikasi->delete();
        return back()->with('message', 'Data berhasil di hapus.');
    }
}
