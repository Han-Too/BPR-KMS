<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
              <div class="logo d-flex justify-content-center mt-3 mb-4">
                <h5 class="fs-1 fw-bold">Presensi</h5>
              </div>
            </div>
        </div>
      </div>
    <div class="table-responsive hideScrollbar">
        <table class="table table table-bordered ">
          <tr>
            <th scope="col" class="table-primary">NO</th>
            <th scope="col" class="table-primary">NAMA</th>
            <th scope="col" class="table-primary">MASUK</th>
            <th scope="col" class="table-primary">IZIN</th>
            <th scope="col" class="table-primary">SAKIT</th>
            <th scope="col" class="table-primary">ALPHA</th>
            <th scope="col" class="table-primary">TERLAMBAT</th>
            <th scope="col" class="table-primary">JAM TERLAMBAT</th>
            <th scope="col" class="table-primary">TOTAL WAKTU</th>
            <th scope="col" class="table-primary">TANGGAL</th>
          </tr>
          @forelse ($dataCetak as $item)
            <tr>
              <th scope="lh-sm">{{ $nomor++ }}</th>
              <td class="lh-sm">{{ $item->user->name }}</td>
              <td class="lh-sm">{{ $item->total_masuk }}</td>
              <td scope="lh-sm">{{ $item->total_izin }}</td>
              <td class="lh-sm">{{ $item->total_sakit }}</td>
              <td class="lh-sm">{{ $item->total_alpha }}</td>
              <td scope="lh-sm">{{ $item->total_terlambat }}</td>
              <td class="lh-sm">{{ $item->jam_terlambat }}</td>
              <td class="lh-sm">{{ $item->total_waktu }}</td>
              <td class="lh-sm">{{ $item->tgl }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="10" class="border text-center p-5">
                  Belum ada data
              </td>
            </tr>
          @endforelse
        </table>
    </div>
  </div>

  <script type="text/javascript">
    window.print();
  </script>
</body>
</html>