<?php

namespace App\Http\Controllers;

use App\Models\Sop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sop = Sop::latest()->paginate(5);
        return view('sop.index', [
            'dataSOP' => $sop,
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
        $dataSOP = $request->validate([
            
            'tanggal' => 'required',
            'kode_sop' => 'required',
            'nomor_dokumen' => 'required',
            'deskripsi' => 'required',
            'file' => 'mimes:pdf,docx|max:10485',
            'revisi' => 'required',
            'kode_jabatan' => 'required',
            
        ]);

        if ($request->file)
        {
            $files = $request->file('file');
            $originalFileName = $files->getClientOriginalName();
            $dataSOP['file'] = $files->storeAs('post-file', $originalFileName);
        }

        Sop::create($dataSOP);

        return redirect()->route('sop.index')->with('succes create', 'Data berhasil di tambahkan.');
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
    public function update(Request $request, Sop $sop)
    {
        $dataSOP = $request->validate([
            'tanggal' => 'required',
            'kode_sop' => 'required',
            'nomor_dokumen' => 'required',
            'deskripsi' => 'required',
            'file' => 'mimes:pdf,docx|max:10485',
            'revisi' => 'required',
            'kode_jabatan' => 'required',
        ]);

        if ($request->file('file'))
        {
            if ($request->oldFile)
            {
                Storage::delete($request->oldFile);
            }

            $files = $request->file('file');
            $originalFileName = $files->getClientOriginalName();
            $dataSOP['file'] = $files->storeAs('post-file', $originalFileName);
        }

        $sop->update($dataSOP);

        return redirect()->route('sop.index')->with('succes update', 'Data berhasil di diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sop $sop)
    {
        if ($sop->file)
        {
            Storage::delete($sop->file);
        }
        
        $sop->delete();

        return redirect()->route('sop.index')->with('succes hapus', 'Data berhasil di dihapus.');
    }

    public function filterPeraturan($tgl, Request $request)
    {
        $sop = DB::table('sops')->where('tanggal', $tgl)->paginate(5);

        return view('sop.index', [
            'dataSOP' => $sop,
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function downloadFile($id)
    {
        $file = Sop::findOrFail($id);
        $pathToFile = storage_path('app/public/' . $file->file);
        return response()->file($pathToFile);
    }
}
