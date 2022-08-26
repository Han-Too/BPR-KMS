<?php

namespace App\Http\Controllers;

use App\Models\Peraturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PeraturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $peraturan = Peraturan::latest()->paginate(5);
        return view('peraturan.index', [
            'dataPeraturan' => $peraturan,
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
        $dataPeraturan = $request->validate([
            'tanggal' => 'required',
            'kode_peraturan' => 'required',
            'nomor_peraturan' => 'required',
            'institusi' => 'required',
            'file' => 'mimes:pdf,docx|max:10485',
            
        ]);

        if ($request->file)
        {
            $files = $request->file('file');
            $originalFileName = $files->getClientOriginalName();
            $dataPeraturan['file'] = $files->storeAs('post-file', $originalFileName);
        }

        Peraturan::create($dataPeraturan);

        return redirect()->route('peraturan.index')->with('succes create', 'Data berhasil di tambahkan.');
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
    public function update(Request $request, Peraturan $peraturan)
    {
        $dataPeraturan = $request->validate([
            'tanggal' => 'required',
            'kode_peraturan' => 'required',
            'nomor_peraturan' => 'required',
            'institusi' => 'required',
            'file' => 'mimes:pdf,docx|max:10485',
            
        ]);

        if ($request->file('file'))
        {
            if ($request->oldFile)
            {
                Storage::delete($request->oldFile);
            }

            $files = $request->file('file');
            $originalFileName = $files->getClientOriginalName();
            $dataPeraturan['file'] = $files->storeAs('post-file', $originalFileName);
        }

        $peraturan->update($dataPeraturan);

        return redirect()->route('peraturan.index')->with('succes update', 'Data berhasil di diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peraturan $peraturan)
    {
        if ($peraturan->file)
        {
            Storage::delete($peraturan->file);
        }
        
        $peraturan->delete();

        return redirect()->route('peraturan.index')->with('succes hapus', 'Data berhasil di dihapus.');
    }

    public function filterPeraturan($tgl, Request $request)
    {
        $peraturan = DB::table('peraturans')->where('tanggal', $tgl)->paginate(5);

        return view('peraturan.index', [
            'dataPeraturan' => $peraturan,
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function downloadFile($id)
    {
        $file = Peraturan::findOrFail($id);
        $pathToFile = storage_path('app/public/' . $file->file);
        return response()->file($pathToFile);
    }
}
