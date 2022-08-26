<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TamuKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kegiatan = Kegiatan::latest()->paginate(5);
        return view('tamukegiatan.index', [
            'datakegiatan' => $kegiatan,
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    

    
}
