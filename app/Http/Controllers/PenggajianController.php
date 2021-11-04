<?php

namespace App\Http\Controllers;

use App\Models\Penggajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataGaji = Penggajian::paginate(10);

        return view('penggajian.index', [
            'penggajian' => $dataGaji,
            'nomor' => 1,
        ]);
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
        $datapenggajian = $request->validate([
            'id_karyawan' => 'required',
            'nama_karyawan' => 'required',
            'jabatan' => 'required',
            'npwp' => 'required',
            'gaji_pokok' => 'required',
            'tunjangan_kesehatan' => 'required',
            'thr' => 'required',
            'lembur' => 'required',
            'tunjangan_bpjs' => 'required',
            'iuran_bpjs_kesehatan' => 'required',
            'jaminan_hari_tua' => 'required',
            'jaminan_kematian' => 'required',
            'jaminan_kecelakaan' => 'required',
            'jaminan_pesiun' => 'required',
            'pph21' => 'required',
            'pot_dplk' => 'required',
            'pot_denda' => 'required',
            'pot_kredit' => 'required',
            'bpjs_kes' => 'required',
            'bpjs_jamsostek' => 'required',
            'iuran_bpjstk' => 'required',
            'iuran_jp' => 'required',
        ]);

        Penggajian::create($datapenggajian);
        $request->session()->flash('success', 'Data berhasil di tambahkan.');

        return redirect()->route('penggajian.index');
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
    public function edit()
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
        $datapenggajian = $request->validate([
            'id_karyawan' => 'required',
            'nama_karyawan' => 'required',
            'jabatan' => 'required',
            'npwp' => 'required',
            'gaji_pokok' => 'required',
            'tunjangan_kesehatan' => 'required',
            'thr' => 'required',
            'lembur' => 'required',
            'tunjangan_bpjs' => 'required',
            'iuran_bpjs_kesehatan' => 'required',
            'jaminan_hari_tua' => 'required',
            'jaminan_kematian' => 'required',
            'jaminan_kecelakaan' => 'required',
            'jaminan_pesiun' => 'required',
            'pph21' => 'required',
            'pot_dplk' => 'required',
            'pot_denda' => 'required',
            'pot_kredit' => 'required',
            'bpjs_kes' => 'required',
            'bpjs_jamsostek' => 'required',
            'iuran_bpjstk' => 'required',
            'iuran_jp' => 'required',
        ]);

        Penggajian::where('id', $id)->update($datapenggajian);
        $request->session()->flash('success', 'Data berhasil di update.');

        return redirect()->route('penggajian.index');
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
}
