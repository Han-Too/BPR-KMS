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
        <div class="col-lg User me- p-20">
          <div class="row w-80">
            <div class="col">
              <div class="logo d-flex justify-content-star">
                <p class="fs-6 fw-bold">IDENTITAS</p>
              </div>
            </div>
          </div>
        </div>
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
                                <option selected disabled>Pilih Role Baru</option>
                                {{-- <option value="Staf SDM">Staf SDM</option>
                                <option value="Kabag SDM">Kabag SDM</option> --}}
                                <option value="Operator">Operator</option>
                                <option value="Administrator">Administrator</option>
                            </select> 
                        </div></div>
                       
        <div class="col-lg table User me-3 rounded p-1">
              <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button class="btn btn-primary btn-block me-md-2" type="submit">Simpan</button>
             
              </div>
        </div>
      </form>

      {{-- <div class="col-lg table User me-2 rounded p-3">
           <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalIdentitas">Tambah</button>
            </div>
      </div> --}}

             

{{-- @foreach ($dataidentitas as $data)
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
@endforeach --}}

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