@extends('tamuDashboard.layouts.main')

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
                    
                  </div>
                  
                </fieldset>
              
                     
              
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
              
             
          </div>
</div>

@endsection