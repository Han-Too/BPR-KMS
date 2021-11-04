@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
              <div class="logo d-flex justify-content-center">
                <h5 class="fs-1 fw-bold">Presensi</h5>
              </div>
            </div>
        </div>
      </div>

      <div class="col-lg tableTable mb-4">
            <div class="row align-center">
            <div class="col-lg-1 inputText me-3">
                <p>MENU</p>
            </div>

            <div class="col-lg-2">
                <select class="form-select" aria-label="Default select example" name="tables">
                    <option value="1" selected>Presensi Harian</option>
                    <option value="2">Presensi Waktu Tertentu</option>
                    <option value="3">Presensi Bulanan</option>
                </select> 
                </div>

                <div class="col-lg-3">
                    <button type="submit" class="btn btn-primary ">Pilih</button>
                </div>
            </div>
      </div>

        <div class="col-lg tableTable">
            <div class="row align-center">
            <div class="col-lg-1 inputText me-3">
                <p>TANGGAL</p>
            </div>
            
            <div class="col inputBox me-3">
                <input type="date" id="birthday" name="birthday">
                <input type="time" id="appt" name="appt">
                <button type="button" class="btn btn-primary ms-3">Cari</button>
            </div>
            </div>
        </div>
        
        
        <div class="row align-items-center mt-5">
            <div class="col">
            <div class="logo d-flex justify-content-star">
                <p class="fs-6 fw-bold">DETAIL PRESENSI</p>
            </div>
            </div>
        </div>
        <!-- Table Awal 2 -->
        <div class="table-responsive hideScrollbar">
            <table class="table table table-bordered ">
            <tr>
                <th scope="col" class="table-primary">NO</th>
                <th scope="col" class="table-primary">NIK</th>
                <th scope="col" class="table-primary">NAMA</th>
                <th scope="col" class="table-primary">WAKTU</th>
            </tr>
            <tr>
                <th scope="lh-sm"></th>
                <td class="lh-sm"></td>
                <td class="lh-sm"></td>
            </tr>
            </table>
    <!-- Table 2 Akhir -->        
    </div>
</div>

@endsection