<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Transaksi</title>
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

<body style="font-family: Mulish">
    <div class="container mt-3">
        <img src="/img/aplikasi-pembayaran-spp.png" alt="" style="width: 70px"
            class="text-start position-absolute" />
        <div class="text-center">
            <h3>APLIKASI PEMBAYARAN SPP</h3>
            <h3 class="fw-bold" >SMK NEGERI 3 BANJAR</h3>
            <hr />
        </div>
        <div class="my-3 fs-12">
            <p class="mb-1"><b> LAPORAN TRANSAKSI</b></p>
            @if ($petugas_id == null)
            <p class="my-0"><b> Petugas:</b> Semua Petugas</p>
            @else
            <p class="my-0"><b> Petugas:</b> {{ $pembayaran[0]->userPetugas->name }}</p>
            @endif
            <p class="my-0"><b> Tanggal:</b> {{ ($daritanggal) }} -
                {{ ($sampaitanggal) }}</p>
        </div>

        <hr />

        <div class="table-responsive fs-12">
          <table class="table table-sm table-hover fs-14 c-black" id="table1">
            <thead>
                <tr class="bg-white text-black">
                    <th scope="col">#</th>
                    <th scope="col">Waktu Transaksi</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Pembayaran untuk</th>
                    <th scope="col">Jumlah Bayar</th>
                    <th scope="col">Tanggal Bayar</th>
                    <th scope="col">Nama Petugas</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($pembayaran as $tampilkan)
                    <tr class="border-bottom">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tampilkan->created_at }}</td>
                        <td>
                          <a href="{{ route('siswa.show', $tampilkan->userSiswa->id) }}" class="text-decoration-none">
                            {{ $tampilkan->userSiswa->name }}
                          </a>
                        </td>
                        <td>{{ $tampilkan->userSiswa->kelas->name }}</td>
                        <td>{{ $tampilkan->bulanbayar->name }} - {{ $tampilkan->tahunbayar }}</td>
                        <td>Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</td>
                        <td>{{ date('d-m-Y', strtotime($tampilkan->tanggalbayar)) }}</td>
                        <td> 
                            @if ($tampilkan->jenistransaksi == 'petugas')
                            <a href="{{ route('petugas.show', $tampilkan->userPetugas->identifier) }}"
                                class="text-decoration-none">
                                {{ $tampilkan->userPetugas->name }}
                            </a>
                        @else
                            -
                        @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        </div>

        <div class="row mt-5 fs-12">
            <div class="col-3 offset-9 fs-14">
                <div>Mengetahui,</div>
                <div class="mb-5 mt-0">Kepala SMK Negeri 3 Banjar,</div>
                <div class="mt-5">Maman Sudirman, MM</div>
                <div class="mt-0">NIP. 01412478478174</div>
            </div>
        </div>

    </div>

    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script>
        window.print()
    </script>
</body>

</html>
