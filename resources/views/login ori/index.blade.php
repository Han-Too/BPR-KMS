<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ ('css/login/bootstrap.min.css') }}">

    <link rel="icon" href="{{ asset('img/dashboard/logo_bpr.png') }}">
    <title>Bank BPR Sehat Sejahtera | Login</title>
  </head>
  <body>
    
    <!-- Begin -->

    <!-- navbar -->
    <div class="container loginForm">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-4 pt-5 pb-5 ">

                <!-- Logo Mulai -->

                <div class="logo d-flex justify-content-center">
                    <img src="{{ asset('img/login/logo.png') }}" alt="Logo Bank Bpr" width="80px">
                    <div class="title mt-auto mb-auto ms-4">
                        <h5 class="text-center">Aplikasi KMS Bank BPR Sehat Sejahtera</h5>
                        
                    </div>
                </div>

                <!-- Logo Selesai -->
            </div>
            <marquee direction="right"><h5>Selamat datang di website kami! Kami informasikan bahwa selalu patuhi protokol kesehatan</h5></marquee> <br>
        </div>   
    </div>

    <!-- akhir navbar -->

    <!-- Awal Tabel -->
    
    <div class="container">
        <div class="row">

            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginError') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="col-lg-3 loginForm me-3 shadow-lg rounded p-3">
                <form method="post" action="/postlogin">
                  @csrf
                    <div class="thumbnail mb-3 text-center">
                        <img src="{{ asset('img/dashboard/user.png') }}" class=" rounded w-50 h-50">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="fw-bold">User ID</label>
                      <input type="text" value="{{ old('id_karyawan') }}" name="id_karyawan" class="form-control" id="id_karyawan" required >
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="fw-bold">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                      <button class="btn btn-primary" type="submit">login</button>
                    </div>
                </form>
            </div>

            <div class="col-lg tableTable">
              
        <div class="table-responsive">
            <p class="h3 text-center"> Tabel SOP</p>
            <table class="table table-responsive table-bordered table-striped table align-middle ">
              <thead>
                <tr>
                    <th scope="col" class="table-info text-center">Deskripsi</th>
                    <th scope="col" class="table-info text-center">File</th>
                </tr>
              </thead>
              <tbody>
                @forelse($kegiatan as $item)
                  <tr>
                      <td class="lh-sm text-center">{{ $item->deskripsi }}</td>
                    
                      
                      @if ($item->file)
                      <td><center><a href="{{ route('download-file', $item->id) }}" class="badge bg-danger">PDF</a></center></td>
                      @else
                        <td><a href="#" class="badge bg-danger"></a></td>
                      @endif
                  </tr>
        
                @empty
                  <tr>
                      <td colspan="5" class="border text-center p-5">
                        Tidak ada SOP
                      </td>
                  </tr>
                @endforelse
              </tbody>
           </table>
</div> 
</div>

<div class="col-lg tableTable">
              
  <div class="table-responsive">
      <p class="h3 text-center"> Tabel Peraturan</p>
      <table class="table table-responsive table-bordered table-striped table align-middle ">
        <thead>
          <tr>
              <th scope="col" class="table-info text-center">Deskripsi</th>
              <th scope="col" class="table-info text-center">File</th>
          </tr>
        </thead>
        <tbody>
          @forelse($kegiatan as $item)
            <tr>
                <td class="lh-sm text-center">{{ $item->deskripsi }}</td>
              
                
                @if ($item->file)
                <td><center><a href="{{ route('download-file', $item->id) }}" class="badge bg-danger">PDF</a></center></td>
                @else
                  <td><a href="#" class="badge bg-danger"></a></td>
                @endif
            </tr>
  
          @empty
            <tr>
                <td colspan="5" class="border text-center p-5">
                  Tidak ada peraturan
                </td>
            </tr>
          @endforelse
        </tbody>
     </table>
</div> 
</div>

<div class="col-lg tableTable">
              
  <div class="table-responsive">
      <p class="h3 text-center"> Tabel Kegiatan</p>
      <table class="table table-responsive table-bordered table-striped table align-middle ">
        <thead>
          <tr>
              <th scope="col" class="table-info text-center">Deskripsi</th>
              <th scope="col" class="table-info text-center">File</th>
          </tr>
        </thead>
        <tbody>
          @forelse($kegiatan as $item)
            <tr>
                <td class="lh-sm text-center">{{ $item->deskripsi }}</td>
              
                
                @if ($item->file)
                <td><center><a href="{{ route('download-file', $item->id) }}" class="badge bg-danger">PDF</a></center></td>
                @else
                  <td><a href="#" class="badge bg-danger"></a></td>
                @endif
            </tr>
  
          @empty
            <tr>
                <td colspan="5" class="border text-center p-5">
                  Tidak ada kegiatan
                </td>
            </tr>
          @endforelse
        </tbody>
     </table>
</div> 

</div>
        </div></div>

    </div>
  </div>

    <!-- Akhir Tabel -->

    <div class="container mt-5">
        
    </div>

    <!-- Finish -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script src="{{ ('js/login/bootstrap.min.js') }}"></script>

  </body>
</html>