@extends('dashboard.layouts.main')

@section('container')
<!-- Awal Menu -->
<div class="container-fluid">

<!-- Layout  Mulai 1 -->
      <div class="col-lg User me-5 p-20">
        <div class="row w-80">
            <div class="col">
                <div class="logo d-flex justify-content-center">
                  <p class="fs-1 fw-bold mt-4">Data Karyawan</p>
                </div>
            </div>
        </div>
      </div>

      @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      @if(session()->has('inputError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
           {{ session('inputError') }}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @elseif(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('message') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <form action="{{ route('users.update', $item->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row mb-3">
            <label for="inputId" class="col-sm-2 col-form-label">ID Karyawan</label>
            <div class="col-sm-10">
                <input value="{{ $item->id_karyawan }}" type="text" name="id_karyawan" class="form-control @error('inputId') is-invalid @enderror"  id="id_karyawan" placeholder="Masukan ID" readonly>
                <span id="passwordHelpInline" class="form-text">
                  Masukan 12 karakter.
                </span>
            </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Masuk</label>
          <div class="col-sm-10">
            <input value="{{ $item->tgl_masuk }}" type="date" id="tgl_masuk" name="tgl_masuk">
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
            <div class="col-sm-5 col-md-2">
              <input type="hidden" name="oldImage" value="{{ $item->profile_photo_path }}">
              @if ($item->profile_photo_path)
                <img src="{{ asset('storage/' . $item->profile_photo_path) }}" class="img-preview img-fluid mb-2">
              @else
                <img class="img-preview img-fluid mb-2">
              @endif
              <input name="profile_photo_path" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="profile_photo_path" type="file" placeholder="User Image"
              onchange="previewImage()">
            </div>
         </div>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <textarea  class="form-control" name="name" id="name" rows="3" placeholder="Masukan Nama">{{ $item->name }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Tempat</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="tempat" id="tempat" rows="3" placeholder="Masukan Tempat">{{ $item->tempat }}</textarea>
              </div>
        </div>
        <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input value="{{ $item->tgl_lahir }}" type="date" id="tgl_lahir" name="tgl_lahir">
              </div>
        </div>
        <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Agama</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="agama" id="agama" rows="3" placeholder="Agama">{{ $item->agama }}</textarea>
              </div>
        </div>
        <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Status Karyawan</label>
              <div class="col-sm-10">
                <select class="form-select" name="status_karyawan">
                  <option value="{{$item->status_karyawan}}" selected>{{$item->status_karyawan}}</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                  <option value="Aktif">Aktif</option>
                </select>
              </div>
        </div>
        <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukan Alamat">{{ $item->alamat }}</textarea>
              </div>
        </div>
        <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Role</label>
              <div class="col-sm-10">
                            <select class="form-select" name="role">
                                <option selected value="">Pilih Role Baru</option>
                                {{-- <option value="Staf SDM">Staf SDM</option>
                                <option value="Kabag SDM">Kabag SDM</option> --}}
                                <option value="Operator">Operator</option>
                                <option value="Administrator">Administrator</option>
                            </select> 
                        </div></div>
        <div class="col-lg table User me-3 rounded p-1">
              <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button class="btn btn-primary me-md-2" type="submit">Simpan</button>
              </div>
        </div>
      </form>

      <div class="col-lg table User me-2 rounded p-3">
           <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalIdentitas">Tambah</button>
            </div>
      </div>

                  <form action="/postidentitas" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal fade" id="exampleModalIdentitas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">IDENTITAS</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">ID Karyawan</label>
                                <div class="col-sm-5">
                                    <textarea readonly class="form-control" name="id_karyawan" id="id_karyawan" rows="3" placeholder="Input Here">{{ $item->id_karyawan }}</textarea>
                                </div>
                                </div>
                                <div class="row mb-3">
                                <label for="inputidentitas" class="col-sm-2 col-form-label">Identitas</label>
                                <div class="col-sm-5">
                                <select class="form-select" name="identitas">
                                    <option selected>Pilih Identitas</option>
                                    <option value="KTP">KTP</option>
                                    <option value="SIM">SIM</option>
                                </select>
                                </div>
                                </div>
                                <div class="row mb-3">
                                  <label for="inputDokumen" class="col-sm-2 col-form-label">Foto Identitas</label>
                                  <div class="col-sm-5">
                                      <input type="file" class="form-control" name="identity_picture" id="identity_picture">
                                  </div>
                                </div>
                                <div class="row mb-3">
                                <label for="input_no_identitas" class="col-sm-2 col-form-label">No Identitas</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control @error('input_no_identitas') is-invalid @enderror" name="no_identitas" id="no_identitas" rows="3" placeholder="Input Here"></textarea>
                                </div>
                                </div>
                                <div class="row mb-3">
                                <label for="input_tanggal_aktif" class="col-sm-2 col-form-label">Tanggal Aktif</label>
                                <div class="col-sm-5">
                                  <input type="date" id="tanggal_aktif" name="tanggal_aktif">
                                </div>
                                </div>
                                <div class="row mb-3">
                                <label for="input_berlaku_sampai" class="col-sm-2 col-form-label">Berlaku Sampai</label>
                                <div class="col-sm-5">
                                    <input type="date" id="berlaku_sampai" name="berlaku_sampai">
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  
                 
                  <!-- Tabel Mulai -->
                  <div class="table-responsive hideScrollbar">
                    <table class="table table table-bordered ">
                        <tr>
                            <th scope="col" class="table-primary">Identitas</th>
                            <th scope="col" class="table-primary">Foto Identitas</th>
                            <th scope="col" class="table-primary">No Identitas</th>
                            <th scope="col" class="table-primary">Tanggal Aktif</th>
                            <th scope="col" class="table-primary">Berlaku Sampai</th>
                            <th scope="col" class="table-primary">Aksi</th>
                        </tr>
                        @forelse($dataidentitas as $itemidentitas)
                            <tr>
                                <th class="lh-sm">{{ $itemidentitas->identitas }}</th>
                                @if ($itemidentitas->identity_picture)
                                  <td class="lh-sm"><button type="submit" class="btn badge bg-info text-light" data-bs-toggle="modal" data-bs-target="#modalPreviewIdentitas-{{ $itemidentitas->id }}">{{$itemidentitas->identitas}}</button></td>
                                @else
                                  <td class="lh-sm"></td>
                                @endif
                                <td class="lh-sm">{{ $itemidentitas->no_identitas }}</td>
                                <td class="lh-sm">{{ $itemidentitas->tanggal_aktif }}</td>
                                <td class="lh-sm">{{ $itemidentitas->berlaku_sampai }}</td>
                                <form action="{{ route('delete.identitas', $itemidentitas->id) }}" method="POST">
                                  @csrf
                                  @method('delete')
                                  <td><button type="submit" class="btn badge bg-danger">Hapus</button></td>
                                </form>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border text-center p-5">
                                    Belum ada identitas
                                </td>
                            </tr>
                        @endforelse
                    </table>
                  </div>
                

                <!-- Tabel Akhir -->

                <div class="row align-items-center mt-5">
                  <div class="col">
                    <div class="logo d-flex justify-content-star">
                      <p class="fs-6 fw-bold">PENDIDIKAN</p>
                    </div>
                  </div>
                  <div class="col">
                  </div>
                  <div class="col">
                    <div class="col btnInput text-end rounded p-3">
                      <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1">Tambah</button>
                    </div>
                  </div>
                </div>

              
                <!-- Layout Mulai 2 -->

                  <form action="/postpendidikan" method="post">
                    @csrf
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">PENDIDIKAN</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">ID Karyawan</label>
                                <div class="col-sm-6">
                                    <textarea readonly class="form-control" name="id_karyawan" id="id_karyawan" rows="3" placeholder="Input Here">{{ $item->id_karyawan }}</textarea>
                                </div>
                                </div>
                                <div class="row mb-3">
                                <label for="inputjenjang" class="col-sm-2 col-form-label">Jenjang</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="jenjang" id="jenjang" rows="3" placeholder="Input Here"></textarea>
                                </div>
                                </div>
                                <div class="row mb-3">
                                <label for="inputinstitusi" class="col-sm-2 col-form-label">Istitusi</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="institusi_pendidikan" id="institusi_pendidikan" rows="3" placeholder="Input Here"></textarea>
                                </div>
                                </div>
                                <div class="row mb-3">
                                <label for="inputkota" class="col-sm-2 col-form-label">Kota</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="kota_pendidikan" id="kota_pendidikan" rows="3" placeholder="Input Here"></textarea>
                                </div>
                                </div>
                                <div class="row mb-3">
                                <label for="inputtgl_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                <div class="col-sm-6">
                                    <input type="date" id="tgl_masuk" name="tgl_masuk">
                                </div>
                                </div>
                                <div class="row mb-3">
                                <label for="inputstatus" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="status" id="status" rows="3" placeholder="Input Here"></textarea>
                                </div>
                                </div>
                                <div class="row mb-3">
                                <label for="inputnilai" class="col-sm-2 col-form-label">Nilai</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="nilai" id="nilai" rows="3" placeholder="Input Here"></textarea>
                                    <span class="form-text">
                                      Pisahkan dengan tanda (.) .Contoh: 8.0
                                    </span>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>


                    <div class="table-responsive hideScrollbar">
                      <table class="table table table-bordered ">
                        <tr>
                          <th scope="col" class="table-primary">Jenjang</th>
                          <th scope="col" class="table-primary">Istitusi</th>
                          <th scope="col" class="table-primary">Kota</th>
                          <th scope="col" class="table-primary">Tanggal Masuk</th>
                          <th scope="col" class="table-primary">Status</th>
                          <th scope="col" class="table-primary">Nilai</th>
                          <th scope="col" class="table-primary">Aksi</th>
                        </tr>
                        @forelse($datapendidikan as $itempendidikan)
                            <tr>
                              <th scope="lh-sm">{{ $itempendidikan->jenjang }}</th>
                              <td class="lh-sm">{{ $itempendidikan->institusi_pendidikan }}</td>
                              <td class="lh-sm">{{ $itempendidikan->kota_pendidikan }}</td>
                              <td class="lh-sm">{{ $itempendidikan->tgl_masuk }}</td>
                              <td class="lh-sm">{{ $itempendidikan->status }}</td>
                              <td class="lh-sm">{{ $itempendidikan->nilai }}</td>
                              <form action="{{ route('delete.pendidikan', $itempendidikan->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <td><button type="submit" class="btn badge bg-danger">Hapus</button></td>
                              </form>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="border text-center p-5">
                                    Belum ada pendiddikan
                                </td>
                            </tr>
                        @endforelse
                        </table>
                      </div>

                        <div class="row align-items-center mt-5">
                          <div class="col">
                            <div class="logo d-flex justify-content-star">
                              <p class="fs-6 fw-bold">PEKERJAAN</p>
                            </div>
                          </div>
                          <div class="col">
                          </div>
                          <div class="col">
                            <div class="col btnInput text-end rounded p-3">
                              <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">Tambah</button>
                            </div>
                          </div>
                        </div>

                          <!-- Layout Mulai 2 -->
                        <form action="/postpekerjaan" method="post">
                          @csrf
                          <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">PEKERJAAN</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">ID Karyawan</label>
                                <div class="col-sm-6">
                                    <textarea readonly class="form-control" name="id_karyawan" id="id_karyawan" rows="3" placeholder="Input Here">{{ $item->id_karyawan }}</textarea>
                                </div>
                                </div>
                                <div class="row mb-3">
                                  <label for="inputinstitusi" class="col-sm-2 col-form-label">Institusi</label>
                                    <div class="col-sm-6">
                                    <textarea class="form-control" name="institusi_pekerjaan" id="institusi_pekerjaan" rows="3" placeholder="Input Here"></textarea>
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <label for="inputkota" class="col-sm-2 col-form-label">Kota</label>
                                  <div class="col-sm-6">
                                    <textarea class="form-control" name="kota_pekerjaan" id="kota_pekerjaan" rows="3" placeholder="Input Here"></textarea>
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <label for="inputjabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                  <div class="col-sm-6">
                                    <textarea class="form-control" name="jabatan" id="jabatan" rows="3" placeholder="Input Here"></textarea>
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <label for="inputtgl_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                  <div class="col-sm-6">
                                    <input type="date" id="tgl_masuk" name="tgl_masuk">
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <label for="inputtgl_keluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                                  <div class="col-sm-6">
                                    <input type="date" id="tgl_keluar" name="tgl_keluar">
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <label for="inputkeluar" class="col-sm-2 col-form-label">Keluar</label>
                                  <div class="col-sm-6">
                                    <textarea class="form-control" name="keluar" id="keluar" rows="3" placeholder="Input Here"></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                              </div>
                          </div>
                        </div>
                      </div>
                    </form>

                      <div class="table-responsive hideScrollbar">
                        <table class="table table table-bordered ">
                          <tr>
                            <th scope="col" class="table-primary">Institusi</th>
                            <th scope="col" class="table-primary">Kota</th>
                            <th scope="col" class="table-primary">Jabatan</th>
                            <th scope="col" class="table-primary">Tanggal Masuk</th>
                            <th scope="col" class="table-primary">Tanggal Keluar</th>
                            <th scope="col" class="table-primary">Keluar</th>
                            <th scope="col" class="table-primary">Aksi</th>
                          </tr>
                          @forelse($datapekerjaan as $itempekerjaan)
                            <tr>
                              <th scope="lh-sm">{{ $itempekerjaan->institusi_pekerjaan }}</th>
                              <td class="lh-sm">{{ $itempekerjaan->kota_pekerjaan }}</td>
                              <td class="lh-sm">{{ $itempekerjaan->jabatan }}</td>
                              <td class="lh-sm">{{ $itempekerjaan->tgl_masuk }}</td>
                              <td class="lh-sm">{{ $itempekerjaan->tgl_keluar }}</td>
                              <td class="lh-sm">{{ $itempekerjaan->keluar }}</td>
                              <form action="{{ route('delete.pekerjaan', $itempekerjaan->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <td><button type="submit" class="btn badge bg-danger">Hapus</button></td>
                              </form>
                            </tr>
                          @empty
                            <tr>
                                <td colspan="7" class="border text-center p-5">
                                    Belum ada pekerjaan
                                </td>
                            </tr>
                          @endforelse
                        </table>
                      </div>
                      
                        <div class="row align-items-center mt-5">
                          <div class="col">
                            <div class="logo d-flex justify-content-star">
                              <p class="fs-6 fw-bold">SERTIFIKASI</p>
                            </div>
                          </div>
                          <div class="col">
                          </div>
                          <div class="col">
                            <div class="col btnInput text-end rounded p-3">
                              <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal3">Tambah</button>
                            </div>
                          </div>
                        </div>
                        <!-- Layout Mulai 2 -->
        
                      <form action="/postsertifikasi" method="post">
                        @csrf  
                        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">SERTIFIKASI</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">ID Karyawan</label>
                                <div class="col-sm-6">
                                    <textarea readonly class="form-control" name="id_karyawan" id="id_karyawan" rows="3" placeholder="Input Here">{{ $item->id_karyawan }}</textarea>
                                </div>
                                </div>
                              <div class="row mb-3">
                                <label for="inputinstitusi" class="col-sm-2 col-form-label">Institusi</label>
                                  <div class="col-sm-6">
                                  <textarea class="form-control" name="institusi_sertifikasi" id="institusi_sertifikasi" rows="3" placeholder="Input Here"></textarea>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputsertifikasi" class="col-sm-2 col-form-label">Sertifikasi</label>
                                <div class="col-sm-6">
                                  <textarea class="form-control" name="sertifikasi" id="sertifikasi" rows="3" placeholder="Input Here"></textarea>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputtingkat" class="col-sm-2 col-form-label">Tingkat</label>
                                <div class="col-sm-6">
                                  <textarea class="form-control" name="tingkat" id="tingkat" rows="3" placeholder="Input Here"></textarea>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                    <div class="table-responsive hideScrollbar">
                      <table class="table table table-bordered ">
                        <tr>
                          <th scope="col" class="table-primary">Institusi</th>
                          <th scope="col" class="table-primary">Sertifikasi</th>
                          <th scope="col" class="table-primary">Tingkat</th>
                          <th scope="col" class="table-primary">Aksi</th>
                        </tr>
                        @forelse($datasertifikasi as $itemsertifikasi)
                          <tr>
                            <th scope="lh-sm">{{ $itemsertifikasi->institusi_sertifikasi }}</th>
                            <td class="lh-sm">{{ $itemsertifikasi->sertifikasi }}</td>
                            <td class="lh-sm">{{ $itemsertifikasi->tingkat }}</td>
                            <form action="{{ route('delete.sertifikasi', $itemsertifikasi->id) }}" method="POST">
                              @csrf
                              @method('delete')
                              <td><button type="submit" class="btn badge bg-danger">Hapus</button></td>
                            </form>
                          </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border text-center p-5">
                                    Belum ada sertifikasi
                                </td>
                            </tr>
                        @endforelse
                      </table>
                    </div>
</div>

@foreach ($dataidentitas as $data)
  <div class="modal fade" id="modalPreviewIdentitas-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold">{{ $item->name }}</h5>
        </div>
        <div class="modal-body">
          <img src="{{ asset('storage/' . $data->identity_picture) }}" class="img-fluid mb-2">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>  
@endforeach

<script type="text/javascript">
  function previewImage() {
    const image = document.querySelector('#profile_photo_path');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
  
</script>

@endsection