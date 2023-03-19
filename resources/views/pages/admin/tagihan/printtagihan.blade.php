<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Tagihan</title>
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
    <div class="container mt-3">
        
        <img src="/img/e-spp-smk-rekayasa.png" alt="" style="width: 70px"
            class="text-start position-absolute rounded-circle" />
        <div class="text-center">
            <h3 class="fw-bold mb-1">APLIKASI PEMBAYARAN SPP</h3>
            <h3 class="fw-bold" >SMK REKAYASA</h3>
            <p>Jl. Raya Indonesia No.17, Kota Banjar</p>
            <hr />
        </div>
        <div class="my-3 fs-12">
            <p class="mb-1"><b> LAPORAN TAGIHAN</b></p>
            <p class="my-0"><b> Kelas:</b> {{ $kelas[0]->name }}</p>
            <p class="my-0"><b> Belum bayar pada:</b> {{ $bulan[0]->name . ' ' . $tahun }}</p>

         
        </div>

        <hr />

        <div class="table-responsive fs-12">
          <table class="table table-sm table-hover fs-14 c-black" id="table1">
            <thead>
                <tr class="bg-white text-black">
                    <th scope="col">#</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Kelas</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($siswa as $tampilkan)
                    <tr class="border-bottom">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tampilkan->name }}</td>
                        <td>{{ $tampilkan->nisn }}</td>
                        <td>{{ Str::title($tampilkan->jk) }}</td>
                        <td>{{ $tampilkan->kelas->name }}</td>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        </div>

        <div class="row mt-5 fs-12">
            <div class="col-3 offset-9 fs-14">
                <div>Mengetahui,</div>
                <div class="mb-5 mt-0">Kepala SMK REKAYASA,</div>
                <div class="mt-5">Suhandi Ramdani, M.Kom</div>
                <div class="mt-0">NIP. 028323422223</div>
            </div>
        </div>

    </div>

    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script>
        window.print()
    </script>
</body>

</html>
