@extends('master.admin.main')

@section('content')

    <h5 class="mb-3 fw-bold text-xs-center poppins">Data Pembayaran</h5>

    <div class="row">
      
      <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                <p class="m-0 d-inline font-weight-bold text-primary">Detail Pembayaran</p>
                <a href="{{ route('pembayaran.edit', $pembayaran) }}" class="float-right">Edit pembayaran</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover fs-14 c-black">
                          <tr class="border-bottom">
                            <td>Waktu Transaksi</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->created_at }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Nama Siswa</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->userSiswa->name }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Kelas</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->userSiswa->kelas->name }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Tanggal Pembayaran</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->tanggalbayar }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Bulan Bayar</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->bulanbayar }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Tahun Bayar</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->tahunbayar }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Tahun SPP</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->userSiswa->spp->tahun }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Nominal SPP</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->userSiswa->spp->nominal }}</td>
                          </tr>
                    </table>
                </div>
            </div>
          </div>
      </div>

      <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                <p class="m-0 d-inline font-weight-bold text-primary">Detail Siswa</p>
                <a href="{{ route('siswa.edit', $pembayaran->userSiswa->username) }}" class="float-right">Edit siswa</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover fs-14 c-black">
                          <tr class="border-bottom">
                            <div class="text-center">
                              <img src="/sb-admin/img/profil.png" class="mb-3 rounded-circle" alt="" style="width: 100px;">
                            </div>
                          </tr>
                          <tr class="border-bottom">
                            <td>Nama siswa</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->userSiswa->name }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>NISN</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->userSiswa->nisn }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>NIS</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->userSiswa->nis }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Kelas</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->userSiswa->kelas->name }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Alamat</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->userSiswa->alamat }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Telepon</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->userSiswa->telepon }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Tahun SPP</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->userSiswa->spp->tahun }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Email</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->userSiswa->email }}</td>
                          </tr>
                    </table>
                </div>
            </div>
          </div>
      </div>

    </div>

    <script>
        var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
        var collapseList = collapseElementList.map(function(collapseEl) {
            return new bootstrap.Collapse(collapseEl)
        })
    </script>
@endsection
