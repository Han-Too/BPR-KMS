<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\PresensiBulanan;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $presensiHarian = Presensi::with('user')->paginate(5);
        $presensiBulanan = PresensiBulanan::with('user')->paginate(5);

        return view('presensi.index', [
            'dataHarian' => $presensiHarian,
            'dataBulanan' => $presensiBulanan,
        ])->with('tabel1', ($request->input('page', 1) - 1) * 5)
        ->with('tabel2', ($request->input('page', 1) - 1) * 5);
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filterPresensiHarian(Request $request, $tgl1, $tgl2)
    {
        if (($tgl1 == null) || ($tgl2 == null))
        {
            $presensiHarian = Presensi::with('user')->latest()->paginate(5);
            $presensiBulanan = PresensiBulanan::with('user')->latest()->paginate(5); 
        } else {
            $presensiHarian = Presensi::with('user')->whereBetween('waktu', [$tgl1, $tgl2])->latest()->paginate(5);
            $presensiBulanan = PresensiBulanan::with('user')->latest()->paginate(5);
        }

        return view('presensi.index', [
            'dataHarian' => $presensiHarian,
            'dataBulanan' => $presensiBulanan,
        ])->with('tabel1', ($request->input('page', 1) - 1) * 5)
        ->with('tabel2', ($request->input('page', 1) - 1) * 5);
    }

    public function filterPresensiBulanan(Request $request, $filter1, $filter2)
    {
        if (($filter1 == null) || ($filter2 == null))
        {
            $presensiHarian = Presensi::with('user')->latest()->paginate(5);
            $presensiBulanan = PresensiBulanan::with('user')->latest()->paginate(5); 
        } else {
            $presensiHarian = Presensi::with('user')->latest()->paginate(5);
            $presensiBulanan = PresensiBulanan::with('user')->whereBetween('tgl', [$filter1, $filter2])->latest()->paginate(5);
        }

        return view('presensi.index', [
            'dataHarian' => $presensiHarian,
            'dataBulanan' => $presensiBulanan,
        ])->with('tabel1', ($request->input('page', 1) - 1) * 5)
        ->with('tabel2', ($request->input('page', 1) - 1) * 5);
    }

    public function cetakPresensiPertanggal($tglawal, $tglakhir)
    {
        $dataCetak = PresensiBulanan::with('user')->whereBetween('tgl', [$tglawal, $tglakhir])->get();
        return view('presensi.cetak-presensi', [
            'dataCetak' => $dataCetak, 
            'nomor' => 1,
        ]);
    }
}
