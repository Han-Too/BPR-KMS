<?php

namespace App\Http\Controllers;

use App\Models\Pengetahuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TamuPengetahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pengetahuan = Pengetahuan::latest()->paginate(5);
        return view('tamupengetahuan.index', [
            'dataPengetahuan' => $pengetahuan,
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    

    public function filterPengetahuan($tgl, Request $request)
    {
        $pengetahuan = DB::table('pengetahuans')->where('tanggal', $tgl)->paginate(5);

        return view('tamupengetahuan.index', [
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
