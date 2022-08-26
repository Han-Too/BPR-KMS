<?php

namespace App\Http\Controllers;

use App\Models\Sop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TamuSOPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sop = Sop::latest()->paginate(5);
        return view('tamusop.index', [
            'dataSOP' => $sop,
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    
}
