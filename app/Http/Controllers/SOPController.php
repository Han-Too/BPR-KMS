<?php

namespace App\Http\Controllers;

use App\Models\SOP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SOPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sop = SOP::latest()->paginate(5);
        return view('sop.index', [
            'datasop' => $sop,
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
            'jenis' => 'required',
            'deskripsi' => 'required',
            'file' => 'mimes:pdf|max:2048',
        ]);

        if ($request->file)
        {
            $files = $request->file('file');
            $originalFileName = $files->getClientOriginalName();
            $dataSOP['file'] = $files->storeAs('post-file', $originalFileName);
        }

        SOP::create($dataSOP);

        return redirect()->route('SOP.index')->with('succes create', 'Data berhasil di tambahkan.');
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
    public function update(Request $request, SOP $SOP)
    {
        $dataSOP = $request->validate([
            'tanggal' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
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
            $dataSOP['file'] = $files->storeAs('post-file', $originalFileName);
        }

        $SOP->update($dataSOP);

        return redirect()->route('SOP.index')->with('succes update', 'Data berhasil di diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SOP $SOP)
    {
        if ($SOP->file)
        {
            Storage::delete($SOP->file);
        }
        
        $SOP->delete();

        return redirect()->route('SOP.index')->with('succes hapus', 'Data berhasil di dihapus.');
    }

    public function filterSOP($tgl, Request $request)
    {
        $SOP = DB::table('sops')->where('tanggal', $tgl)->paginate(5);

        return view('SOP.index', [
            'dataSOP' => $SOP,
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function downloadFile($id)
    {
        $file = SOP::findOrFail($id);
        $pathToFile = storage_path('app/public/' . $file->file);
        return response()->download($pathToFile);
    }
}
