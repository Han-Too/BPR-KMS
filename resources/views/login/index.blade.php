<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ ('css/login/bootstrap.min.css') }}">

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
                    <img src="img/login/logo.png" alt="Logo Bank Bpr" width="80px">
                    <div class="title mt-auto mb-auto ms-4">
                        <h5>Aplikasi HRMS Bank BPR Sehat Sejahtera</h5>
                    </div>
                </div>

                <!-- Logo Selesai -->
            </div>
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
                        <img src="img/login/profil.png" class="img-thumbnail rounded w-50 h-50">
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

                <div class="row w-80">
                    <div class="col">
                        <div class="input-group align-middle flex-nowrap">
                            <p class="pt-2">Tanggal</p>
                            <input type="text" class="form-control ms-3" placeholder=" Input Here" aria-label="Input Here" aria-describedby="addon-wrapping">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                          <p class="pt-2">Tahun</p>
                          <input type="text" class="form-control ms-3" placeholder="Input Here" aria-label="Input Here" aria-describedby="addon-wrapping">
                          </div>
                    </div>
                    <div class="d-grid gap-4 col-2 mx-auto mb-3">
                      <button type="button" class="btn btn-primary btn-sm">Cari</button>
                    </div>
                </div>

                <div class="table-responsive">
                  <table class="table table table-bordered table align-middle ">
                    <thead>
                      <tr>
                          <th scope="col" class="table-primary" >Tanggal</th>
                          <th scope="col" class="table-primary">Kegiatan</th>
                          <th scope="col" class="table-primary">Status</th>
                      </tr>
                    </thead>
                  <tbody>
                    @forelse($kegiatan as $item)
                      <tr>
                          <th scope="row">{{ $item->tanggal }}</th>
                          <td class="lh-sm">{{ $item->kegiatan }}</td>
                          @if ($item->status == "Sedang Berlangsung")
                            <td class="badge bg-success mt-2 ms-2 mb-2 ">{{ $item->status }}</td>
                          @else
                            <td class="badge bg-warning mt-2 ms-2 mb-2 ">{{ $item->status }}</td>
                          @endif
                      </tr>

                    @empty
                      <tr>
                          <td colspan="3" class="border text-center p-5">
                            Tidak ada kegiatan
                          </td>
                      </tr>
                    @endforelse
                  </tbody>
              </div>
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