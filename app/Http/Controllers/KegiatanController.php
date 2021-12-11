<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kegiatan = Kegiatan::latest()->paginate(5);
        return view('kegiatan.index', [
            'datakegiatan' => $kegiatan,
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
        $dataKegiatan = $request->validate([
            'tanggal' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            'file' => 'mimes:pdf|max:2048',
        ]);

        if ($request->file)
        {
            $files = $request->file('file');
            $originalFileName = $files->getClientOriginalName();
            $dataKegiatan['file'] = $files->storeAs('post-file', $originalFileName);
        }

        Kegiatan::create($dataKegiatan);

        return redirect()->route('kegiatan.index')->with('succes create', 'Data berhasil di tambahkan.');
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
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $dataKegiatan = $request->validate([
            'tanggal' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            'file' => 'mimes:pdf|max:2048',
        ]);

        if ($request->file('file'))
        {
            if ($request->oldFile)
            {
                Storage::delete($request->oldFile);
            }

            $files = $request->file('file');
            $originalFileName = $files->getClientOriginalName();
            $dataKegiatan['file'] = $files->storeAs('post-file', $originalFileName);
        }

        $kegiatan->update($dataKegiatan);

        return redirect()->route('kegiatan.index')->with('succes update', 'Data berhasil di diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        if ($kegiatan->file)
        {
            Storage::delete($kegiatan->file);
        }
        
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('succes hapus', 'Data berhasil di dihapus.');
    }

    public function filterKegiatan($tgl, Request $request)
    {
        $kegiatan = DB::table('kegiatans')->where('tanggal', $tgl)->paginate(5);

        return view('kegiatan.index', [
            'datakegiatan' => $kegiatan,
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function downloadFile($id)
    {
        $file = Kegiatan::findOrFail($id);
        $pathToFile = storage_path('app/public/' . $file->file);
        return response()->download($pathToFile);
    }
}
