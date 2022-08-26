<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jabatan = Jabatan::latest()->paginate(5);
        return view('jabatan.index', [
            'dataJabatan' => $jabatan,
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataJabatan = $request->validate([
            'kode_jabatan' => 'required',
            'jabatan' => 'required',
            'deskripsi' => 'required',
            'kode_departemen' => 'required',
        ]);

        

        Jabatan::create($dataJabatan);

        return redirect()->route('jabatan.index')->with('succes create', 'Data berhasil di tambahkan.');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $dataJabatan = $request->validate([
            'kode_jabatan' => 'required',
            'jabatan' => 'required',
            'deskripsi' => 'required',
            'kode_departemen' => 'required',
        ]);

       

        $jabatan->update($dataJabatan);

        return redirect()->route('jabatan.index')->with('succes update', 'Data berhasil di diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        
        $jabatan->delete($id);

        return redirect()->route('jabatan.index')->with('succes hapus', 'Data berhasil di dihapus.');
    }

    public function filterJabatan(Request $request)
    {
        $jabatan = DB::table('jabatans')->paginate(5);

        return view('jabatan.index', [
            'dataJabatan' => $jabatan,
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

}