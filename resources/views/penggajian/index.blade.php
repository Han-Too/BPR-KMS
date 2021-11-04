@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <!-- Text -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="logo d-flex justify-content-center mt-4">
                <h5 class="fs-1 fw-bold">Penggajian</h5>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary mb-2 " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Tambah
    </button>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table table-bordered table align-middle mt-4">
            <thead>
                <tr>
                    <th scope="col" class="table-primary">NO</th>
                    <th scope="col" class="table-primary">ID KARYAWAN</th>
                    <th scope="col" class="table-primary">NAMA</th>
                    <th scope="col" class="table-primary">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penggajian as $item)
                    <tr>
                        <th scope="row">{{ $nomor++ }}</th>
                        <td class="lh-sm">{{ $item->id_karyawan }}</td>
                        <td class="lh-sm">{{ $item->nama_karyawan }}</td>
                        <td><a href="#" class="badge bg-info text-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop1-{{ $item->id }}">Edit</a> <a href="#" class="badge bg-danger">Hapus</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border text-center p-5">
                            Belum ada data
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
    
<!-- Modal -->
<form action="{{ route('penggajian.store') }}" method="post">
@csrf
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body fw-bold">
                <div class="row mb-3">
                    <label for="inputId" class="col-sm-2 col-form-label">ID KARYAWAN</label>
                        <div class="col-sm-10">
                            <input type="text" name="id_karyawan" class="form-control" id="id_karyawan" placeholder="Masukan ID">
                        </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNama" class="col-sm-2 col-form-label">NAMA KARYAWAN</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_karyawan" class="form-control" id="nama_karyawan" placeholder="Masukan NAMA">
                        </div>
                </div>
                <div class="row mb-3">
                    <label for="inputJabatan" class="col-sm-2 col-form-label">JABATAN</label>
                        <div class="col-sm-10">
                            <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Masukan JABATAN">
                        </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNPWP" class="col-sm-2 col-form-label">NPWP</label>
                        <div class="col-sm-10">
                            <input type="text" name="npwp" class="form-control" id="npwp" placeholder="Masukan NPWP">
                        </div>
                </div>
                <div class="col-lg User me-5 p-20">
                    <div class="row w-80">
                        <div class="col">
                            <div class="logo d-flex justify-content-center mt-4">
                            <p class="fs-3 fw-bold">PENDAPATAN</p>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row mb-3">
                        <label for="inputGajipokok" class="col-sm-2 col-form-label">GAJI POKOK</label>
                        <div class="col-sm-10">
                            <input type="text" name="gaji_pokok" class="form-control" id="gaji_pokok" placeholder="Rp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputTunjanganPokok" class="col-sm-2 col-form-label">TUNJANGAN KES</label>
                        <div class="col-sm-10">
                            <input type="text" name="tunjangan_kesehatan" class="form-control" id="tunjangan_kesehatan" placeholder="Rp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputThr" class="col-sm-2 col-form-label">THR</label>
                        <div class="col-sm-10">
                        <input type="text" name="thr" class="form-control" id="thr" placeholder="Rp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputlembur" class="col-sm-2 col-form-label">LEMBUR</label>
                        <div class="col-sm-10">
                            <input type="text" name="lembur" class="form-control" id="lembur" placeholder="Rp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputTunjanganBpjs" class="col-sm-2 col-form-label">TUNJANGAN BPJS</label>
                        <div class="col-sm-10">
                            <input type="text" name="tunjangan_bpjs" class="form-control" id="tunjangan_bpjs" placeholder="Rp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputIuran" class="col-sm-2 col-form-label">IURAN BPJS KESEHATAN</label>
                        <div class="col-sm-10">
                            <input type="text" name="iuran_bpjs_kesehatan" class="form-control" id="iuran_bpjs_kesehatan" placeholder="Rp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputJaminanHariTua" class="col-sm-2 col-form-label">JAMINAN HARI TUA</label>
                        <div class="col-sm-10">
                            <input type="text" name="jaminan_hari_tua" class="form-control" id="jaminan_hari_tua" placeholder="Rp">
                    </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputJaminanKematian" class="col-sm-2 col-form-label">JAMINAN KEMATIAN</label>
                        <div class="col-sm-10">
                        <input type="text" name="jaminan_kematian" class="form-control" id="jaminan_kematian" placeholder="Rp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputjaminanKecelakaan" class="col-sm-2 col-form-label">JAMINAN KECELAKAAN</label>
                        <div class="col-sm-10">
                            <input type="text" name="jaminan_kecelakaan" class="form-control" id="jaminan_kecelakaan" placeholder="Rp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputJaminanPesiun" class="col-sm-2 col-form-label">JAMINAN PENSIUN</label>
                        <div class="col-sm-10">
                        <input type="text" name="jaminan_pesiun" class="form-control" id="jaminan_pesiun" placeholder="Rp">
                        </div>
                    </div>
                    
                    <div class="col-lg User me-5 p-20">
                        <div class="row w-80">
                            <div class="col">
                                <div class="logo d-flex justify-content-center">
                                <p class="fs-3 fw-bold">POTONGAN</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Layout Mulai 2 -->
                    <div class="row mb-3">
                        <label for="inputPph21" class="col-sm-2 col-form-label">PPH21</label>
                        <div class="col-sm-10">
                            <input type="text" name="pph21" class="form-control" id="pph21" placeholder="Rp">
                    </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPotDplk" class="col-sm-2 col-form-label">POT.DPLK</label>
                        <div class="col-sm-10">
                        <input type="text" name="pot_dplk" class="form-control" id="pot_dplk" placeholder="Rp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPotDenda" class="col-sm-2 col-form-label">POT.DENDA</label>
                        <div class="col-sm-10">
                            <input type="text" name="pot_denda" class="form-control" id="pot_denda" placeholder="Rp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPotKredit" class="col-sm-2 col-form-label">POT.KREDIT</label>
                        <div class="col-sm-10">
                            <input type="text" name="pot_kredit" class="form-control" id="pot_kredit" placeholder="Rp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputBK" class="col-sm-2 col-form-label">BPJS KESEHATAN</label>
                        <div class="col-sm-10">
                            <input type="text" name="bpjs_kes" class="form-control" id="bpjs_kes" placeholder="Rp">
                    </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputBJ" class="col-sm-2 col-form-label">BPJS JAMOSTEK</label>
                        <div class="col-sm-10">
                        <input type="text" name="bpjs_jamsostek" class="form-control" id="bpjs_jamsostek" placeholder="Rp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputIB" class="col-sm-2 col-form-label">IURAN BPJSTK</label>
                        <div class="col-sm-10">
                            <input type="text" name="iuran_bpjstk" class="form-control" id="iuran_bpjstk" placeholder="Rp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputIJ" class="col-sm-2 col-form-label">IURAN JP</label>
                        <div class="col-sm-10">
                        <input type="text" name="iuran_jp" class="form-control" id="iuran_jp" placeholder="Rp">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
            </div>
    </div>
</form>


@foreach ($penggajian as $item)
    <!-- Modal -->
        <div class="modal fade" id="staticBackdrop1-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <form action="{{ route('penggajian.update', $item->id) }}" method="post">
                @csrf
                @method('put')    
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body fw-bold">
                    <div class="row mb-3">
                        <label for="inputId" class="col-sm-2 col-form-label">ID KARYAWAN</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->id_karyawan }}" type="text" name="id_karyawan" class="form-control" id="id_karyawan" placeholder="Masukan ID">
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNama" class="col-sm-2 col-form-label">NAMA KARYAWAN</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->nama_karyawan }}" type="text" name="nama_karyawan" class="form-control" id="nama_karyawan" placeholder="Masukan NAMA">
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputJabatan" class="col-sm-2 col-form-label">JABATAN</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->jabatan }}" type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Masukan JABATAN">
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNPWP" class="col-sm-2 col-form-label">NPWP</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->npwp }}" type="text" name="npwp" class="form-control" id="npwp" placeholder="Masukan NPWP">
                            </div>
                    </div>
                    <div class="col-lg User me-5 p-20">
                        <div class="row w-80">
                            <div class="col">
                                <div class="logo d-flex justify-content-center mt-4">
                                <p class="fs-3 fw-bold">PENDAPATAN</p>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row mb-3">
                            <label for="inputGajipokok" class="col-sm-2 col-form-label">GAJI POKOK</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->gaji_pokok }}" type="text" name="gaji_pokok" class="form-control" id="gaji_pokok" placeholder="Rp">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputTunjanganPokok" class="col-sm-2 col-form-label">TUNJANGAN KES</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->tunjangan_kesehatan }}" type="text" name="tunjangan_kesehatan" class="form-control" id="tunjangan_kesehatan" placeholder="Rp">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputThr" class="col-sm-2 col-form-label">THR</label>
                            <div class="col-sm-10">
                            <input value="{{ $item->thr }}" type="text" name="thr" class="form-control" id="thr" placeholder="Rp">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputlembur" class="col-sm-2 col-form-label">LEMBUR</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->lembur }}" type="text" name="lembur" class="form-control" id="lembur" placeholder="Rp">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputTunjanganBpjs" class="col-sm-2 col-form-label">TUNJANGAN BPJS</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->tunjangan_bpjs }}" type="text" name="tunjangan_bpjs" class="form-control" id="tunjangan_bpjs" placeholder="Rp">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputIuran" class="col-sm-2 col-form-label">IURAN BPJS KESEHATAN</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->iuran_bpjs_kesehatan }}" type="text" name="iuran_bpjs_kesehatan" class="form-control" id="iuran_bpjs_kesehatan" placeholder="Rp">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputJaminanHariTua" class="col-sm-2 col-form-label">JAMINAN HARI TUA</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->jaminan_hari_tua }}" type="text" name="jaminan_hari_tua" class="form-control" id="jaminan_hari_tua" placeholder="Rp">
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputJaminanKematian" class="col-sm-2 col-form-label">JAMINAN KEMATIAN</label>
                            <div class="col-sm-10">
                            <input value="{{ $item->jaminan_kematian }}" type="text" name="jaminan_kematian" class="form-control" id="jaminan_kematian" placeholder="Rp">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputjaminanKecelakaan" class="col-sm-2 col-form-label">JAMINAN KECELAKAAN</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->jaminan_kecelakaan }}" type="text" name="jaminan_kecelakaan" class="form-control" id="jaminan_kecelakaan" placeholder="Rp">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputJaminanPesiun" class="col-sm-2 col-form-label">JAMINAN PENSIUN</label>
                            <div class="col-sm-10">
                            <input value="{{ $item->jaminan_pesiun }}" type="text" name="jaminan_pesiun" class="form-control" id="jaminan_pesiun" placeholder="Rp">
                            </div>
                        </div>
                        
                        <div class="col-lg User me-5 p-20">
                            <div class="row w-80">
                                <div class="col">
                                    <div class="logo d-flex justify-content-center">
                                    <p class="fs-3 fw-bold">POTONGAN</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Layout Mulai 2 -->
                        <div class="row mb-3">
                            <label for="inputPph21" class="col-sm-2 col-form-label">PPH21</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->pph21 }}" type="text" name="pph21" class="form-control" id="pph21" placeholder="Rp">
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPotDplk" class="col-sm-2 col-form-label">POT.DPLK</label>
                            <div class="col-sm-10">
                            <input value="{{ $item->pot_dplk }}" type="text" name="pot_dplk" class="form-control" id="pot_dplk" placeholder="Rp">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPotDenda" class="col-sm-2 col-form-label">POT.DENDA</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->pot_denda }}" type="text" name="pot_denda" class="form-control" id="pot_denda" placeholder="Rp">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPotKredit" class="col-sm-2 col-form-label">POT.KREDIT</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->pot_kredit }}" type="text" name="pot_kredit" class="form-control" id="pot_kredit" placeholder="Rp">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputBK" class="col-sm-2 col-form-label">BPJS KESEHATAN</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->bpjs_kes }}" type="text" name="bpjs_kes" class="form-control" id="bpjs_kes" placeholder="Rp">
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputBJ" class="col-sm-2 col-form-label">BPJS JAMOSTEK</label>
                            <div class="col-sm-10">
                            <input value="{{ $item->bpjs_jamsostek }}" type="text" name="bpjs_jamsostek" class="form-control" id="bpjs_jamsostek" placeholder="Rp">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputIB" class="col-sm-2 col-form-label">IURAN BPJSTK</label>
                            <div class="col-sm-10">
                                <input value="{{ $item->iuran_bpjstk }}" type="text" name="iuran_bpjstk" class="form-control" id="iuran_bpjstk" placeholder="Rp">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputIJ" class="col-sm-2 col-form-label">IURAN JP</label>
                            <div class="col-sm-10">
                            <input value="{{ $item->iuran_jp }}" type="text" name="iuran_jp" class="form-control" id="iuran_jp" placeholder="Rp">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
@endforeach
    <!-- Akhir Tabel -->

@endsection