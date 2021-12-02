@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="row">
                        <div class="col">
                          <div class="logo d-flex justify-content-center mt-4 mb-4">
                            <h5 class="fs-1 fw-bold">Kelola User</h5>
                          </div>
                        </div>
                    </div>
                </div>


    {{-- <div class="row align-items-center p-1 mt-2">
        <div class="col">
          <div class="col btnInput text-star rounded p-2">
            <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1">Tambah</button>
          </div> --}}

        @foreach ($user as $item)
          <div class="modal fade" id="exampleModal1-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('kelolauser.update', $item->id) }}" method="POST">
                @csrf
                @method('put')
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              <div class="modal-body">
                <div class="row mb-3">
                    <label for="id_karyawan" class="col-sm-2 col-form-label fw-bold">USER ID</label>
                    <div class="col-sm-6">
                        <input value="{{$item->id_karyawan }}" type="text" class="form-control" id="id_karyawan" name="id_karyawan" placeholder="Input Here" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label fw-bold">NAMA</label>
                    <div class="col-sm-6">
                        <input value="{{$item->name }}" type="text" class="form-control" id="name" name="name" placeholder="Input Here" readonly>
                  </div>
                </div>
                {{-- <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label fw-bold">PASSWORD</label>
                    <div class="col-sm-10">
                      <input type="Tanggal" class="form-control" id="inputTanggal3" placeholder="Input Here">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label fw-bold">RETRY PASSWORD</label>
                    <div class="col-sm-10">
                        <input type="Tanggal" class="form-control" id="inputTanggal3" placeholder="Input Here">
                    </div>
                </div> --}}

                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0 fw-bold">AKSES</legend>
                        <div class="col-lg-4">
                            <select class="form-select" name="role">
                                <option selected>Pilih</option>
                                <option value="Staf SDM">Staf SDM</option>
                                <option value="Kabag SDM">Kabag SDM</option>
                                <option value="Karyawan">Karyawan</option>
                                <option value="Administrator">Administrator</option>
                            </select> 
                        </div>
                        
                            <div class="row align-items-start">
                                <div class="col-lg table User rounded p-3">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary me-1" type="submit">Tambah</button>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
                </form>
            </div>
        @endforeach
    <!-- Awal Menu -->
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table table-bordered table align-middle mt-1">
        <thead>
            <tr>
                <th scope="col" class="table-primary" >NO</th>
                <th scope="col" class="table-primary">ID KARYAWAN</th>
                <th scope="col" class="table-primary">NAMA</th>
                <th scope="col" class="table-primary">STATUS</th>
                <th scope="col" class="table-primary">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @forelse($user as $item)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td class="lh-sm">{{ $item->id_karyawan }}</td>
                    <td class="lh-sm">{{ $item->name }}</td>
                    @if ($item->status_karyawan == "Aktif")
                      <td class="badge bg-success mt-2 mb-2 ms-2">{{ $item->status_karyawan }}</td>
                    @else
                      <td class="badge bg-danger mt-2 mb-2 ms-2">{{ $item->status_karyawan }}</td>
                    @endif
                    <td><a href="#" class="btn badge bg-info text-light" data-bs-toggle="modal" data-bs-target="#exampleModal1-{{ $item->id }}">Edit</a></td>
                </tr>

            @empty
                <tr>
                    <td colspan="5" class="border text-center p-5">
                        Tidak ada data karyawan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $user->links() }}

    {{-- <div class="modal fade" id="staticBackdrop1" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
        </div> --}}
    <!-- Akhir Tabel -->
</div>

@endsection