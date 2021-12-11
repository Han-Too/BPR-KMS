@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
              <div class="container">
                <div class="row">
                    <div class="col">
                      <div class="logo d-flex justify-content-center">
                        <h5 class="fs-1 fw-bold">Presensi</h5>
                      </div>
                    </div>
                </div>
              </div>

        <div class="col-lg tableTable mt-4">
            <div class="row align-center">
            <div class="col-lg-1 inputText me-3">
                <p class="fw-bold">TANGGAL</p>
            </div>
            
            <div class="col inputBox me-3">
              <input type="datetime-local" id="tgl1" name="tgl1">&nbsp;<b>SAMPAI</b>&nbsp;
              <input type="datetime-local" id="tgl2" name="tgl2">
              <a href="" onclick="this.href='/filter-presensi-harian/'+ document.getElementById('tgl1').value + '/' + document.getElementById('tgl2').value" class="btn btn-primary ms-2">Cari</a>
          </div>
          </div>
        </div>

        <div class="row align-items-center mt-2">
            <div class="col">
            <div class="logo d-flex justify-content-star">
                <p class="fs-6 fw-bold">PRESENSI HARIAN</p>
            </div>
            </div>
        </div>
        <!-- Table Awal 2 -->
        <div class="table-responsive hideScrollbar mb-5">
            <table class="table table table-bordered ">
            <tr>
                <th scope="col" class="table-primary">NO</th>
                <th scope="col" class="table-primary">NAMA</th>
                <th scope="col" class="table-primary">WAKTU</th>
            </tr>
                  @forelse ($dataHarian as $item)
                      <tr>
                        <th scope="lh-sm">{{ ++$tabel1 }}</th>
                        <td class="lh-sm">{{ $item->user->name }}</td>
                        <td class="lh-sm">{{ $item->waktu }}</td>
                      </tr>  
                  @empty
                    <tr>
                      <td colspan="3" class="border text-center p-5">
                          Belum ada data
                      </td>
                    </tr>  
                  @endforelse
            </table>
            {{ $dataHarian->links() }}
        </div>
        
        <div class="col-lg tableTable mt-4">
          <div class="row align-center">
          <div class="col-lg-1 inputText me-3">
              <p class="fw-bold">TANGGAL</p>
          </div>
          
          <div class="col inputBox me-3">
              <input type="date" id="filter1" name="filter1">&nbsp;<b>SAMPAI</b>&nbsp;
              <input type="date" id="filter2" name="filter2">
              <a href="" onclick="this.href='/filter-presensi-bulanan/'+ document.getElementById('filter1').value + '/' + document.getElementById('filter2').value" class="btn btn-primary ms-2">Cari</a>
          </div>
          </div>
        </div>
        
        <div class="row align-items-center mt-1">
            <div class="col">
              <div class="logo d-flex justify-content-star">
                <p class="fs-6 fw-bold">PRESENSI BULANAN</p>
              </div>
            </div>
        </div>
          <!-- Table Awal 2 -->
        <div class="table-responsive hideScrollbar">
            <table class="table table table-bordered ">
              <tr>
                <th scope="col" class="table-primary">NO</th>
                <th scope="col" class="table-primary">NAMA</th>
                <th scope="col" class="table-primary">MASUK</th>
                <th scope="col" class="table-primary">IZIN</th>
                <th scope="col" class="table-primary">SAKIT</th>
                <th scope="col" class="table-primary">ALPHA</th>
                <th scope="col" class="table-primary">TERLAMBAT</th>
                <th scope="col" class="table-primary">JAM TERLAMBAT</th>
                <th scope="col" class="table-primary">TOTAL WAKTU</th>
                <th scope="col" class="table-primary">TANGGAL</th>
              </tr>
              @forelse ($dataBulanan as $item)
                <tr>
                  <th scope="lh-sm">{{ ++$tabel2 }}</th>
                  <td class="lh-sm">{{ $item->user->name }}</td>
                  <td class="lh-sm">{{ $item->total_masuk }}</td>
                  <td scope="lh-sm">{{ $item->total_izin }}</td>
                  <td class="lh-sm">{{ $item->total_sakit }}</td>
                  <td class="lh-sm">{{ $item->total_alpha }}</td>
                  <td scope="lh-sm">{{ $item->total_terlambat }}</td>
                  <td class="lh-sm">{{ $item->jam_terlambat }}</td>
                  <td class="lh-sm">{{ $item->total_waktu }}</td>
                  <td class="lh-sm">{{ $item->tgl }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="10" class="border text-center p-5">
                      Belum ada data
                  </td>
                </tr>
              @endforelse
            </table>
            {{ $dataBulanan->links() }}
        </div>
        <div class="row align-items-center p-1 mt-3 mb-3">
            <div class="col btnInput text-star">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cetakpresensi">Cetak Presensi</button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="cetakpresensi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Presensi Bulanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="col-lg tableTable">
                  <div class="row align-center">
                  <div class="col-lg-1 inputText me-3">
                      <p><b>Tanggal Awal</b></p>
                  </div>
                  <div class="col inputBox ms-4 me-3">
                      <input type="date" id="tglawal" name="tglawal" class="form-control">
                  </div>
                  </div>
                </div>
                <div class="col-lg tableTable mt-1">
                  <div class="row align-center">
                  <div class="col-lg-1 inputText me-3">
                      <p><b>Tanggal Akhir</b></p>
                  </div>
                  <div class="col inputBox ms-4 me-3">
                      <input type="date" id="tglakhir" name="tglakhir" class="form-control">
                  </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="" onclick="this.href='/data-cetak-presensi/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-danger">Cetak</a>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>     
</div>

@endsection