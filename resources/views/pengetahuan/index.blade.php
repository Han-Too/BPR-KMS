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
                            <h5 class="fs-1 fw-bold">Kelola Data Pengetahuan</h5>
                          </div>
                        </div>
                    </div>
                </div>
              
                <fieldset class="row mb-1 mt-3">
                  <legend class="col-form-label col-sm-2 pt-1 fw-bold">TANGGAL</legend>
                  <div class="col inputBox me-3 ">
                    <input type="date" id="tgl" name="tgl">
                    <a href="" onclick="this.href='/filter/pengetahuan/'+ document.getElementById('tgl').value" class="btn btn-primary ms-3">Cari</a>
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalkegiatan">
                      Tambah
                      </button>
                  </div>
                  
                </fieldset>
              
                      {{-- <!-- Button trigger modal -->
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-1">
                         
                      </div> --}}
                
                <!-- Modal -->
                      <div class="modal fade" id="modalkegiatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <form method="POST" action="{{ route('pengetahuan.store') }}" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row mb-3">
                                  <label for="inputtgl" class="col-sm-2 col-form-label" >TANGGAL</label>
                                  <div class="col-sm-10">
                                    <input type="date" id="tanggal" name="tanggal"  rows="3" class="form-control">
                                </div>
                              </div>
                              <div class="row mb-3">
                                  <label for="inputJenis" class="col-sm-2 col-form-label">KODE PENGETAHUAN</label>
                                  <div class="col-sm-10">
                                    <input type="text" name="kode_pengetahuan"  class="form-control" rows="3">
                                  </div>
                              </div>
                              <div class="row mb-3">
                                  <label for="inputDeskripsi" class="col-sm-2 col-form-label">DESKRIPSI</label>
                                  <div class="col-sm-10">
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Input Here"></textarea>
                                  </div>
                              </div>
                              <div class="row mb-3">
                                  <label for="inputDokumen" class="col-sm-2 col-form-label">DOKUMEN</label>
                                  <div class="col-sm-10">
                                      <input type="file" class="form-control" name="file" id="file">
                                      <small class="form-text text-muted">Maksimal Ukuran 100MB</small>
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
                          <th scope="col" class="table-primary">Kode Pengetahuan</th>
                          <th scope="col" class="table-primary">Deskripsi</th>
                          <th scope="col" class="table-primary">File</th>
                          <th scope="col" class="table-primary">Aksi</th>
                          
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($dataPengetahuan as $item)
                        <tr>
                          <th scope="row col-1">{{ ++$i }}</th>
                          <td class="lh-sm col-2">{{ $item->tanggal }}</td>
                          <td class="lh-sm col-2">{{ $item->kode_pengetahuan }}</td>
                          <td class="lh-sm col-3">{{ $item->deskripsi }}</td>
                          

                          @if ($item->file)
                            <td><a href="{{ route('download-filepengetahuan', $item->id) }}" class="badge bg-warning" target="_blank">File</a></td>
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
                            Tidak ada Pengetahuan
                          </td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                  {{ $dataPengetahuan->links() }}
              </div>
              </div>
              
              @foreach ($dataPengetahuan as $item)
              <!-- Modal -->
              <div class="modal fade" id="modalHapusKegiatan-{{ $item->id }}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalHapusDataLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalHapusDataLabel">Hapus Data</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body fw-bold">
                      Hapus data Pengetahuan?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <form action="{{ route('pengetahuan.destroy', $item->id) }}" method="POST">
                        {!! method_field('delete') . csrf_field() !!}
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal -->
              @endforeach
              
              @foreach ($dataPengetahuan as $item)
              <!-- Modal -->
              <div class="modal fade" id="modalEditKegiatan-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form method="POST" action="{{ route('pengetahuan.update', $item->id) }}" enctype="multipart/form-data">
                          @csrf
                          @method('put')
                          <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row mb-3">
                              <label for="inputtgl" class="col-sm-2 col-form-label">TANGGAL</label>
                              <div class="col-sm-10">
                                <input value="{{ $item->tanggal }}" type="date" id="tanggal" name="tanggal"  class="form-control" rows="3">
                            </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputJenis" class="col-sm-2 col-form-label">KODE PENGETAHUAN</label>
                              <div class="col-sm-10">
                                <input type="text" name="kode_kegiatan" value="{{ $item->kode_pengetahuan }}" class="form-control" rows="3">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputDeskripsi" class="col-sm-2 col-form-label">DESKRIPSI</label>
                              <div class="col-sm-10">
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Input Here">{{ $item->deskripsi }}</textarea>
                              </div>
                            </div>
                            <div class="row mb-3">
                           
                            <div class="row mb-3">
                              <label for="inputDokumen" class="col-sm-2 col-form-label">DOKUMEN</label>
                              
                              <div class="col-sm-10">
                                  <input type="hidden" name="oldFile" value="{{ $item->file }}">
                                  <input type="file" class="form-control" name="file" id="file">
                                  <small class="form-text text-muted">Maksimal Ukuran 100MB</small>
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