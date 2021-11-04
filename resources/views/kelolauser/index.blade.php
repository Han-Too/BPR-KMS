@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="col">
        <div class="logo d-flex justify-content-center mt-4">
          <h5 class="fs-1 fw-bold">Kelola User</h5>
        </div>
    </div>


    <div class="row align-items-center p-1 mt-2">
        <div class="col">
          <div class="col btnInput text-star rounded p-2">
            <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1">Tambah</button>
          </div>
          <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              <div class="modal-body">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">USER ID</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Input Here">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">NAMA</label>
                    <div class="col-sm-10">
                        <input type="Tanggal" class="form-control" id="inputTanggal3" placeholder="Input Here">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">PASSWORD</label>
                    <div class="col-sm-10">
                      <input type="Tanggal" class="form-control" id="inputTanggal3" placeholder="Input Here">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">RETRY PASSWORD</label>
                    <div class="col-sm-10">
                        <input type="Tanggal" class="form-control" id="inputTanggal3" placeholder="Input Here">
                    </div>
                </div>

                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">MENU</legend>
                        <div class="col-sm-10 col-lg-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="defaultCheck" id="defaultCheck1" value="option1" checked>
                                    <label class="form-check-label" for="defaultCheck1">Data Karyawan</label>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="defaultCheck" id="defaultCheck2" value="option1" checked>
                                        <label class="form-check-label" for="defaultCheck2">Penggajian</label>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="defaultCheck" id="defaultCheck3" value="option1" checked>
                                        <label class="form-check-label" for="defaultCheck3">Presensi</label>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="defaultCheck" id="defaultCheck4" value="option1" checked>
                                        <label class="form-check-label" for="defaultCheck4">Kelola User</label>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="defaultCheck" id="defaultCheck5" value="option1" checked>
                                        <label class="form-check-label" for="defaultCheck5">Pelaporan dan Kegiatan</label>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="defaultCheck" id="defaultCheck6" value="option1" checked>
                                        <label class="form-check-label" for="defaultCheck6">Kemajuan Pelaporan dan Kegiatan</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">AKSES</legend>
                                        <div class="col-lg">
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Pillih</option>
                                                <option value="1">Lihat</option>
                                                <option value="2">Pribadi</option>
                                                <option value="3">Semua</option>
                                            </select> 
                                        </div>
                                    </legend>
                                </fieldset>
                            </div>
                            <div class="row align-items-start">
                                <div class="col-lg table User me-3 rounded p-3">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary me-md-2" type="button">Tambah</button>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Awal Menu -->
    <div class="table-responsive">
        <table class="table table table-bordered ">
            <thead>
                <tr>
                    <th scope="col" class="table-primary">NO</th>
                    <th scope="col" class="table-primary">ID</th>
                    <th scope="col" class="table-primary">NAMA</th>
                    <th scope="col" class="table-primary">STATUS</th>
                    <th scope="col" class="table-primary">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td class="lh-sm">181011450006</td>
                    <td class="lh-sm">Muhammad Rizky Aditya Rhamadhan</td>
                    <td class="lh-sm badge bg-success ms-1 mt-1">Aktif</td>
                    <td><a href="#" class="badge bg-info text-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Edit</a> <a href="#" class="badge bg-danger">Hapus</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="staticBackdrop1" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <div class="modal-body">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">USER ID</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Input Here">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">NAMA</label>
                <div class="col-sm-10">
                    <input type="Tanggal" class="form-control" id="inputTanggal3" placeholder="Input Here">
              </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">PASSWORD</label>
                <div class="col-sm-10">
                  <input type="Tanggal" class="form-control" id="inputTanggal3" placeholder="Input Here">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">RETRY PASSWORD</label>
                <div class="col-sm-10">
                    <input type="Tanggal" class="form-control" id="inputTanggal3" placeholder="Input Here">
                </div>
            </div>

            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">MENU</legend>
                    <div class="col-sm-10 col-lg-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="gridRadios" id="defaultCheck1" value="option1" checked>
                                <label class="form-check-label" for="defaultCheck1">Data Karyawan</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="gridRadios" id="defaultCheck2" value="option2" checked>
                                    <label class="form-check-label" for="defaultCheck2">Penggajian</label>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="gridRadios" id="defaultCheck3" value="option3" checked>
                                    <label class="form-check-label" for="defaultCheck3">Presensi</label>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="gridRadios" id="defaultCheck4" value="option4" checked>
                                    <label class="form-check-label" for="defaultCheck4">Kelola User</label>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="gridRadios" id="defaultCheck5" value="option5" checked>
                                    <label class="form-check-label" for="defaultCheck5">Pelaporan dan Kegiatan</label>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="gridRadios" id="defaultCheck6" value="option6" checked>
                                    <label class="form-check-label" for="defaultCheck6">Kemajuan Pelaporan dan Kegiatan</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col">
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">AKSES</legend>
                                <div class="col-lg">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Pillih</option>
                                        <option value="1">Lihat</option>
                                        <option value="2">Pribadi</option>
                                        <option value="3">Semua</option>
                                    </select> 
                                </div>
                            </legend>
                        </fieldset>
                        </div>     
                        <div class="row align-items-start">
                            <div class="col-lg table User me-3 rounded p-3">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="button">Simpan</button>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Tabel -->
</div>

@endsection