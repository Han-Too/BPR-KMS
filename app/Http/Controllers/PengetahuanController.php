<?php

namespace App\Http\Controllers;

use App\Models\Pengetahuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengetahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pengetahuan = Pengetahuan::latest()->paginate(5);
        return view('pengetahuan.index', [
            'dataPengetahuan' => $pengetahuan,
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
        $dataPengetahuan = $request->validate([
            'tanggal' => 'required',
            'kode_pengetahuan' => 'required',
            'deskripsi' => 'required',
            'file' => 'mimes:mp4,pdf,docx|max:104857',
        ]);

        if ($request->file)
        {
            $files = $request->file('file');
            $originalFileName = $files->getClientOriginalName();
            $dataPengetahuan['file'] = $files->storeAs('post-file', $originalFileName);
        }

        Pengetahuan::create($dataPengetahuan);

        return redirect()->route('pengetahuan.index')->with('succes create', 'Data berhasil di tambahkan.');
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
    public function update(Request $request, Pengetahuan $pengetahuan)
    {
        $dataPengetahuan = $request->validate([
            'tanggal' => 'required',
            'kode_pengetahuan' => 'required',
            'deskripsi' => 'required',
            'file' => 'mimes:mp4,docx,pdf|max:104857',
        ]);

        if ($request->file('file'))
        {
            if ($request->oldFile)
            {
                Storage::delete($request->oldFile);
            }

            $files = $request->file('file');
            $originalFileName = $files->getClientOriginalName();
            $dataPengeta['file'] = $files->storeAs('post-file', $originalFileName);
        }

        $pengetahuan->update($dataPengetahuan);

        return redirect()->route('pengetahuan.index')->with('succes update', 'Data berhasil di diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengetahuan $pengetahuan)
    {
        if ($pengetahuan->file)
        {
            Storage::delete($pengetahuan->file);
        }
        
        $pengetahuan->delete();

        return redirect()->route('pengetahuan.index')->with('succes hapus', 'Data berhasil di dihapus.');
    }

    public function filterPengetahuan($tgl, Request $request)
    {
        $pengetahuan = DB::table('pengetahuans')->where('tanggal', $tgl)->paginate(5);

        return view('pengetahuan.index', [
            'dataPengetahuan' => $pengetahuan,
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function downloadFile($id)
    {
        $file = Pengetahuan::findOrFail($id);
        $pathToFile = storage_path('app/public/' . $file->file);
        return response()->file($pathToFile);
    }
}
