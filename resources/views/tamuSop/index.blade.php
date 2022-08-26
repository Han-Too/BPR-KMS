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
                            <h5 class="fs-1 fw-bold">Data SOP</h5>
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

                  <table class="table table table-bordered table align-middle mt-2">
                    <thead>
                      <tr>
                          <th scope="col" class="table-primary">NO</th>
                          <th scope="col" class="table-primary">Tanggal</th>
                          <th scope="col" class="table-primary">Kode SOP</th>
                          <th scope="col" class="table-primary">Nomor Dokumen</th>
                          <th scope="col" class="table-primary">Deskripsi</th>
                          <th scope="col" class="table-primary">Revisi</th>
                          <th scope="col" class="table-primary">Kode Jabatan</th>
                          <th scope="col" class="table-primary">File</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($dataSOP as $item)
                        <tr>
                          <th scope="row col-1">{{ ++$i }}</th>
                          <td class="lh-sm col-2">{{ $item->tanggal }}</td>
                          <td class="lh-sm col-2">{{ $item->kode_sop }}</td>
                          <td class="lh-sm col-2">{{ $item->nomor_dokumen }}</td>
                          <td class="lh-sm col-2">{{ $item->deskripsi }}</td>
                          <td class="lh-sm col-2">{{ $item->revisi }}</td>
                          <td class="lh-sm col-2">{{ $item->kode_jabatan }}</td>
                          
                          

                          @if ($item->file)
                            <td><a href="{{ route('download-filesop', $item->id) }}" class="badge bg-danger">PDF</a></td>
                          @else
                            <td><a href="#" class="badge bg-danger"></a></td>
                          @endif

                        
                        </tr>
                      @empty
                        <tr>
                          <td colspan="9" class="border text-center p-5">
                            Tidak ada SOP
                          </td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                  {{ $dataSOP->links() }}
              </div>
              </div>
             
          </div>
</div>

@endsection