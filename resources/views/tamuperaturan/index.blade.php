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
                            <h5 class="fs-1 fw-bold">Data Peraturan</h5>
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
                          <th scope="col" class="table-primary">Tahun</th>
                          <th scope="col" class="table-primary">Kode Peraturan</th>
                          <th scope="col" class="table-primary">Nomor Peraturan</th>
                          <th scope="col" class="table-primary">Institusi</th>
                          <th scope="col" class="table-primary">File</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($dataPeraturan as $item)
                        <tr>
                          <th scope="row col-1">{{ ++$i }}</th>
                          <td class="lh-sm col-2">{{ $item->tanggal }}</td>
                          <td class="lh-sm col-2">{{ $item->kode_peraturan }}</td>
                          <td class="lh-sm col-3">{{ $item->nomor_peraturan }}</td>
                          <td class="lh-sm col-3">{{ $item->institusi}}</td>
                          
                          @if ($item->file)
                            <td><a href="{{ route('download-fileperaturan', $item->id) }}" class="badge bg-danger" target="_blank">PDF</a></td>
                          @else
                            <td><a href="#" class="badge bg-danger"></a></td>
                          @endif

                          
                        </tr>
                      @empty
                        <tr>
                          <td colspan="7" class="border text-center p-7">
                            Tidak ada Peraturan
                          </td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                  {{ $dataPeraturan->links() }}
              </div>
              </div>
              
             
          </div>
</div>

@endsection