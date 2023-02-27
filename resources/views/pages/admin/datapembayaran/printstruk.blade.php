<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nota Pembayaran</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />
    <style>
        .fs-12 {
            font-size: 12px;
        }

        fs-14 {
            font-size: 14px;
        }
    </style>
</head>

<body style="font-family: Times New Roman">
    <div class="container mt-1">
        <img
          src="/img/e-spp-smk-rekayasa.png"
          alt=""
          style="width: 80px"
          class="text-start position-absolute rounded-circle"
        />
        <div class="text-center">
          <h3 class="my-0">APLIKASI PEMBAYARAN SPP</h3>
          <h3 class="my-0">SMK REKAYASA</h3>
          <p class="my-0">Jl. Raya Indonesia No.17, Kota Banjar</p>
          <hr />
        </div>
        <div class="row">
          <div class="col-6">
            <table class="table-borderless">
              <tr>
                <td>Nama</td>
                <td style="width: 1px;" class="px-3">:</td>
                <td>{{ $pembayaran->userSiswa->name }}</td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td style="width: 1px;" class="px-3">:</td>
                <td>{{ $pembayaran->userSiswa->kelas->name  }}</td>
              </tr>
            </table>
          </div>
          <div class="col-6">
            <table class="table-borderless">
              <tr>
                <td>Kode Transaksi</td>
                <td style="width: 1px;" class="px-3">:</td>
                <td class="text-uppercase">{{ $pembayaran->identifier  }}</td>
              </tr>
              <tr>
                <td>Waktu Transaksi</td>
                <td style="width: 1px;" class="px-3">:</td>
                <td>
                    {{ Str::before(date('d-m-Y', strtotime($pembayaran->created_at)), ' ')}} 
                    |
                    {{ Str::after($pembayaran->created_at, ' ') }}
                </td>
              </tr>
            </table>
          </div>
        </div>
  
        <hr />
  
        <div class="table-responsive mt-5">
          <table class="table table-sm table-hover">
            <thead>
              <tr class="text-black border-bottom">
                <th scope="col">#</th>
                <th scope="col">Nama Pembayaran</th>
                <th scope="col">Pembayaran Untuk</th>
                <th scope="col">Nominal</th>
              </tr>
            </thead>
            <tbody>
              <tr class="">
                <td>1</td>
                <td>Pembayaran SPP</td>
                <td>{{ $pembayaran->bulanbayar->name }} - {{ $pembayaran->tahunbayar }} </td>
                <td>Rp{{ number_format($pembayaran->jumlahbayar, 0, '.', '.') }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row mt-5">
          <div class="col-3 offset-9 fs-14">
            <div class="mb-5 mt-0">Petugas,</div>
            <div class="mt-5">{{ $pembayaran->userPetugas->name }}</div>
          </div>
        </div>
  
      </div>

    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script>
        window.print()
    </script>
</body>

</html>
