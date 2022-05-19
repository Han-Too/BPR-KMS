@extends('dashboard.layouts.main')

@section('container')
<!-- Awal Menu -->
<div class="container-fluid">
          <!-- Text -->
            <div class="container">
              <div class="row">
                  <div class="col">
                    <div class="container">
                      <div class="row">
                          <div class="col">
                            <div class="logo d-flex justify-content-center mt-4">
                              <h5 class="fs-1 fw-bold">Data Karyawan</h5>
                            </div>
                          </div>
                      </div>
                    </div>
              <!-- Text -->
          <div class="col-lg table User me-3 rounded p-2">
            <div class="d-grid gap-2 d-md-flex justify-content-md-star">
              <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalTambahData">
                  Tambah
              </button>
            </div>
          </div>
              <!-- Mulai Tabel -->
            
            <div class="table-responsive">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session()->has('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @elseif(session()->has('error'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
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
                                  <td><a href="{{ route('users.edit', $item->id) }}" class="badge bg-info text-dark">Detail</a> <a href="#" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#modalHapusData-{{ $item->id }}">Hapus</a></td>
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
        </div>
    <!-- Akhir Tabel -->

    <!-- Modal -->
    @foreach ($user as $item)
    <div class="modal fade" id="modalHapusData-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalHapusDataLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalHapusDataLabel">Hapus Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body fw-bold">
            Hapus data ini?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <form method="post" action="{{ route('users.destroy', $item->id_karyawan) }}">
              {!! method_field('delete') . csrf_field() !!}
              <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    @endforeach

    <!-- Modal -->
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="modal fade" id="modalTambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalTambahData" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body fw-bold">
                <div class="col-lg User me-5 p-20">
                    <div class="row w-80">
                        <div class="col">
                            <div class="logo d-flex justify-content-center">
                              <p class="fs-2 fw-bold ">Data Karyawan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputID" class="col-sm-2 col-form-label">ID Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ old('id_karyawan') }}" name="id_karyawan" class="form-control" id="id_karyawan" placeholder="Masukan ID">
                        <span id="passwordHelpInline" class="form-text">
                        Masukan 12 karakter.
                        </span>
                    </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTanggal" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                  <div class="col-sm-10">
                    <input type="date" id="tgl_masuk" name="tgl_masuk">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTanggal" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="password" placeholder="Minimal 8 karakter">
                      <input type="checkbox" class="form-checkbox"> Show Password
                  </div>
                </div>

                <!-- Layout Akhir 1 -->

                <!-- text 2 -->
                <div class="col-lg User me- p-20">
                <div class="row w-80">
                    <div class="col">
                    <div class="logo d-flex justify-content-star">
                        <p class="fs-6 fw-bold">IDENTITAS</p>
                    </div>
                    </div>
                </div>
                </div>
                    <!-- Text 2 Akhir -->

                <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Photo Profile</label>
                    <div class="col-sm-10">
                    <input name="profile_photo_path" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="profile_photo_path" type="file" placeholder="User Image">
                    </div>
                </div>
                <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" name="name" id="name" rows="3" placeholder="Masukan Nama">{{ old('name') }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tempat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="tempat" id="tempat" rows="3" placeholder="Masukan Tempat">{{ old('tempat') }}</textarea>
                    </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-10">
                        <input type="date" id="tgl_lahir" name="tgl_lahir">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Agama</label>
                          <div class="col-sm-10">
                          <textarea class="form-control" name="agama" id="agama" rows="3" placeholder="Masukan Agama">{{ old('agama') }}</textarea>
                          </div>
                      </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Status Karyawan</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="status_karyawan">
                            <option selected>Pilih Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                        <span class="form-text">
                            Contoh: Aktif Atau Tidak Aktif.
                        </span>
                    </div>
                    </div>
                    <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukan Alamat">{{ old('alamat') }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                          <select class="form-select" name="role">
                                              <option value="Staf SDM">Staf SDM</option>
                                              <option value="Kabag SDM">Kabag SDM</option>
                                              <option value="Operator">Operator</option>
                                              <option selected value="Administrator">Administrator</option>
                                          </select> 
                                      </div></div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </div>
        </div>
      </div>
  </form>
    <!-- Modal -->

      </div>
    </div>
  </div>
</div>
@endsection