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
                            <h5 class="fs-1 fw-bold">Kelola Data Departemen</h5>
                          </div>
                        </div>
                    </div>
                </div>
              
                <fieldset class="row mb-1 mt-3">
                     <div class="col inputBox me-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDepartemen">
                      Tambah
                      </button>
                  </div>
                </fieldset>
              
                
                <!-- Modal -->
                      <div class="modal fade" id="modalDepartemen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <form method="POST" action="{{ route('departemen.store') }}" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                             
                              <div class="row mb-3 mt-3">
                                <label for="inputJenis" class="col-sm-2 col-form-label">KODE</label>
                                <div class="col-sm-10">
                                  <input type="text" id="departemen" name="kode_departemen"  class="form-control" rows="2">
                                </div>
                              </div>

                              <div class="row mb-3">
                                  <label for="inputJenis" class="col-sm-2 col-form-label">NAMA</label>
                                  <div class="col-sm-10">
                                    <input type="text" id="departemen" name="departemen"  class="form-control" rows="2">
                               
                                  </div>
                              </div>
                              <div class="row mb-3">
                                  <label for="inputDeskripsi" class="col-sm-2 col-form-label">DESKRIPSI</label>
                                  <div class="col-sm-10">
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="2" placeholder="Input Here"></textarea>
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
                          <th scope="col" class="table-primary">Kode</th>
                          <th scope="col" class="table-primary">Nama</th>
                          <th scope="col" class="table-primary">Deskripsi</th>
                          <th scope="col" class="table-primary">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($dataDepartemen as $item)
                        <tr>
                          <th scope="row col-1">{{ ++$i }}</th>
                          <td class="lh-sm col-2">{{ $item->kode_departemen }}</td>
                          <td class="lh-sm col-2">{{ $item->departemen }}</td>
                          <td class="lh-sm col-3">{{ $item->deskripsi }}</td>
                            <td>
                            <button type="button" class=" btn badge bg-info text-dark me-5 " data-bs-toggle="modal" data-bs-target="#modalEditDepartemen-{{ $item->id }}">Edit</a>
                            <button type="button" class="btn badge bg-danger" data-bs-toggle="modal" data-bs-target="#modalHapusDepartemen-{{ $item->id }}">Hapus</a>
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="7" class="border text-center p-5">
                            Tidak ada Data Departemen
                          </td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                  {{ $dataDepartemen->links() }}
              </div>
              </div>
              {{-- BATASAN WAKTU --}}
              @foreach ($dataDepartemen as $item)
              <!-- Modal -->
              <div class="modal fade" id="modalHapusDepartemen-{{ $item->id }}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalHapusDataLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalHapusDataLabel">Hapus Data</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body fw-bold">
                      Hapus data Departemen?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <form action="{{ route('departemen.destroy', $item->id) }}" method="POST">
                        {!! method_field('delete') . csrf_field() !!}
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal -->
              @endforeach
              
              @foreach ($dataDepartemen as $item)
              <!-- Modal -->
              <div class="modal fade" id="modalEditDepartemen-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form method="POST" action="{{ route('departemen.update', $item->id) }}" enctype="multipart/form-data">
                          @csrf
                          @method('put')
                          <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row mb-3">
                              <label for="inputDeskripsi" class="col-sm-2 col-form-label">KODE</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputKode" name="kode_departemen" value="{{ $item->kode_departemen }}">
                                {{-- <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Input Here">{{ $item->deskripsi }}</textarea> --}}
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputDeskripsi" class="col-sm-2 col-form-label">KODE</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputKode" name="departemen" value="{{ $item->departemen }}">
                                {{-- <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Input Here">{{ $item->deskripsi }}</textarea> --}}
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputDeskripsi" class="col-sm-2 col-form-label">DESKRIPSI</label>
                              <div class="col-sm-10">
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" placeholder="Input Here">{{ $item->deskripsi }}</textarea>
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