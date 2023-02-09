@extends('master.admin.main')

@section('content')

    <h5 class="mb-3 fw-bold text-xs-center poppins">Data Pembayaran</h5>

    <div class="row mb-3">
      
      <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                <p class="m-0 d-inline font-weight-bold text-primary">Detail Pembayaran</p>
                @can('admin')
                  <a href="{{ route('pembayaran.edit', $pembayaran) }}" class="float-right">Edit pembayaran</a>
                @endcan
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
                            <td>Jumlah Bayar</td>
                            <td style="width: 1px;">:</td>
                            <td>Rp{{ number_format($pembayaran->jumlahbayar, 0, '.', '.') }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Tanggal Pembayaran</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ date('d-m-Y', strtotime($pembayaran->tanggalbayar)) }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Pembayaran untuk</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->bulanbayar->name }} - {{ $pembayaran->tahunbayar }} </td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Tahun SPP</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->userSiswa->spp->tahun }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Nominal SPP</td>
                            <td style="width: 1px;">:</td>
                            <td>Rp{{ number_format($pembayaran->userSiswa->spp->nominal, 0, '.', '.') }}</td>                          
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
                @can('admin')
                  <a href="{{ route('siswa.edit', $pembayaran->userSiswa->username) }}" class="float-right">Edit siswa</a>
                @endcan
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
                            <td>Email</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->userSiswa->email }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Tahun SPP</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $pembayaran->userSiswa->spp->tahun }}</td>
                          </tr>
                    </table>
                </div>
                <div class="mt-3">
                  <div class="my-2 text-black text-xs-center fw-bold">
                    History Pembayaran Siswa
                  </div>
                  <div class="table-responsive">

                    @if ($historysiswa->count()<1)
                     <small> <a href="">{{ $pembayaran->userSiswa->name }}</a> belum memiliki riwayat pembayaran.</small>
                    @else
                    <table class="table table-sm table-hover fs-14 c-black">
                      <tr class="border-bottom bg-dark text-white"">
                        <td>#</td>
                        <td>Tanggal</td>
                        <td>Pembayaran untuk</td>
                        <td>Nominal bayar</td>
                      </tr>
                      @foreach ($historysiswa as $tampilkan)
                      <tr class="border-bottom">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ date('d-m-Y', strtotime($tampilkan->tanggalbayar)) }}</td>
                        <td>{{ $tampilkan->bulanbayar->name }} - {{ $tampilkan->tahunbayar }}</td>
                        <td>Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</td>
                      </tr>
                      @endforeach
                    </table>
                    @endif
                  </div>
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
