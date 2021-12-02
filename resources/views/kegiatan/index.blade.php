@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="row">
                        <div class="col">
                          <div class="logo d-flex justify-content-center mt-4">
                            <h5 class="fs-1 fw-bold">Laporan dan Kegiatan</h5>
                          </div>
                        </div>
                    </div>
                </div>
              
                <fieldset class="row mb-1 mt-3">
                  <legend class="col-form-label col-sm-1 pt-0 fw-bold">TANGGAL</legend>
                  <div class="col inputBox me-3">
                    <input type="date" id="tgl" name="tgl">
                    <a href="" onclick="this.href='/filter/kegiatan/'+ document.getElementById('tgl').value" class="btn btn-primary ms-3">Cari</a>
                  </div>
                </fieldset>
              
                      <!-- Button trigger modal -->
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-1">
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalkegiatan">
                          Tambah
                          </button>
                      </div>
                
                <!-- Modal -->
                      <div class="modal fade" id="modalkegiatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <form method="POST" action="{{ route('kegiatan.store') }}" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row mb-3">
                                  <label for="inputtgl" class="col-sm-2 col-form-label">TANGGAL</label>
                                  <div class="col-sm-10">
                                    <input type="date" id="tanggal" name="tanggal">
                                </div>
                              </div>
                              <div class="row mb-3">
                                  <label for="inputJenis" class="col-sm-2 col-form-label">JENIS</label>
                                  <div class="col-sm-10">
                                  <select class="form-select" aria-label="Default select example" name="jenis" id="jenis">
                                      <option selected>Pilih</option>
                                      <option value="Pelaporan">Pelaporan</option>
                                      <option value="Rapat">Rapat</option>
                                      <option value="Kegiatan">Kegiatan</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="row mb-3">
                                  <label for="inputDeskripsi" class="col-sm-2 col-form-label">DESKRIPSI</label>
                                  <div class="col-sm-10">
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Input Here"></textarea>
                                  </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputStatus" class="col-sm-2 col-form-label">STATUS</label>
                                <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" id="status" name="status">
                                    <option selected>Pilih</option>
                                    <option value="Menunggu">Menunggu</option>
                                    <option value="Sedang Berlangsung">Sedang Berlangsung</option>
                                    <option value="Selesai">Selesai</option>
                                  </select>
                                </div>
                              </div>
                              <div class="row mb-3">
                                  <label for="inputDokumen" class="col-sm-2 col-form-label">DOKUMEN</label>
                                  <div class="col-sm-10">
                                      <input type="file" class="form-control" name="file" id="file">
                                  </div>
                              </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
              
              
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

                  @if(session()->has('succes create'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('succes create') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @elseif(session()->has('succes hapus'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('succes hapus') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @elseif(session()->has('succes update'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('succes update') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                  <table class="table table table-bordered table align-middle mt-2">
                    <thead>
                      <tr>
                          <th scope="col" class="table-primary">NO</th>
                          <th scope="col" class="table-primary">Tanggal</th>
                          <th scope="col" class="table-primary">Jenis</th>
                          <th scope="col" class="table-primary">Deskripsi</th>
                          <th scope="col" class="table-primary">Status</th>
                          <th scope="col" class="table-primary">File</th>
                          <th scope="col" class="table-primary">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($datakegiatan as $item)
                        <tr>
                          <th scope="row col-1">{{ ++$i }}</th>
                          <td class="lh-sm col-2">{{ $item->tanggal }}</td>
                          <td class="lh-sm col-2">{{ $item->jenis }}</td>
                          <td class="lh-sm col-3">{{ $item->deskripsi }}</td>
                          @if ($item->status == "Sedang Berlangsung")
                            <td class="badge bg-success mt-2 ms-2 mb-2 me-1">{{ $item->status }}</td>
                          @elseif ($item->status == "Menunggu")
                            <td class="badge bg-warning mt-2 ms-2 mb-2 me-1">{{ $item->status }}</td>
                          @else
                            <td class="badge bg-danger mt-2 ms-2 mb-2 me-1">{{ $item->status }}</td>
                          @endif

                          @if ($item->file)
                            <td><a href="{{ route('download-file', $item->id) }}" class="badge bg-danger">PDF</a></td>
                          @else
                            <td><a href="#" class="badge bg-danger"></a></td>
                          @endif

                          <td>
                            <button type="button" class=" btn badge bg-info text-dark me-1" data-bs-toggle="modal" data-bs-target="#modalEditKegiatan-{{ $item->id }}">Edit</a>
                            <button type="button" class="btn badge bg-danger" data-bs-toggle="modal" data-bs-target="#modalHapusKegiatan-{{ $item->id }}">Hapus</a>
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="7" class="border text-center p-5">
                            Tidak ada kegiatan
                          </td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                  {{ $datakegiatan->links() }}
              </div>
              </div>
              
              @foreach ($datakegiatan as $item)
              <!-- Modal -->
              <div class="modal fade" id="modalHapusKegiatan-{{ $item->id }}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalHapusDataLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalHapusDataLabel">Hapus Data</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body fw-bold">
                      Hapus data kegiatan?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST">
                        {!! method_field('delete') . csrf_field() !!}
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal -->
              @endforeach
              
              @foreach ($datakegiatan as $item)
              <!-- Modal -->
              <div class="modal fade" id="modalEditKegiatan-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form method="POST" action="{{ route('kegiatan.update', $item->id) }}" enctype="multipart/form-data">
                          @csrf
                          @method('put')
                          <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row mb-3">
                              <label for="inputtgl" class="col-sm-2 col-form-label">TANGGAL</label>
                              <div class="col-sm-10">
                                <input value="{{ $item->tanggal }}" type="date" id="tanggal" name="tanggal">
                            </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputJenis" class="col-sm-2 col-form-label">JENIS</label>
                              <div class="col-sm-10">
                              <select class="form-select" aria-label="Default select example" name="jenis" id="jenis">
                                  @if ("Pelaporan" == $item->jenis)
                                    <option value="Pelaporan" selected>Pelaporan</option>
                                  @elseif("Rapat" == $item->jenis)
                                    <option value="Rapat" selected>Rapat</option>
                                  @elseif("Kegiatan" == $item->jenis)
                                    <option value="Kegiatan" selected>Kegiatan</option>
                                  @endif
                                  <option value="Pelaporan">Pelaporan</option>
                                  <option value="Rapat">Rapat</option>
                                  <option value="Kegiatan">Kegiatan</option>
                              </select>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputDeskripsi" class="col-sm-2 col-form-label">DESKRIPSI</label>
                              <div class="col-sm-10">
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Input Here">{{ $item->deskripsi }}</textarea>
                              </div>
                            </div>
                            <div class="row mb-3">
                            <label for="inputStatus" class="col-sm-2 col-form-label">STATUS</label>
                            <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="status" name="status">
                                @if ("Menunggu" == $item->status)
                                  <option value="Menunggu" selected>Menunggu</option>
                                @elseif("Sedang Berlangsung" == $item->status)
                                  <option value="Sedang Berlangsung" selected>Sedang Berlangsung</option>
                                @elseif("Selesai" == $item->status)
                                <option value="Selesai" selected>Selesai</option>
                                @endif
                                <option value="Menunggu">Menunggu</option>
                                <option value="Sedang Berlangsung">Sedang Berlangsung</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                            </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputDokumen" class="col-sm-2 col-form-label">DOKUMEN</label>
                              <div class="col-sm-10">
                                  <input type="hidden" name="oldFile" value="{{ $item->file }}">
                                  <input type="file" class="form-control" name="file" id="file">
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                          </div>
                        </form>
                      </div>
                  </div>
                </div>
                @endforeach
          </div>
</div>

@endsection