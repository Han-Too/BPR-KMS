<?php

namespace App\Http\Controllers;

use App\Models\Peraturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TamuPeraturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $peraturan = Peraturan::latest()->paginate(5);
        return view('tamuperaturan.index', [
            'dataPeraturan' => $peraturan,
        ])->with('i', ($request->input('page', 1) - 1) * 5);
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
        return response()->download($pathToFile);
    }
}
