@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold poppins">
        <button class="btn btn-sm btn-outline-dark me-2" onclick="history.back()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi fw-bold bi-arrow-left"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
        </button> Data Siswa</h5>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-black">Detail Siswa</p>
                    <a href="{{ route('siswa.edit', $siswa) }}" class="float-right">Edit profil</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover fs-14 c-black">
                            <tr class="border-bottom">
                                <div class="text-center">
                                    <img src="/sb-admin/img/profil.png" class="mb-3 rounded-circle" alt=""
                                        style="width: 100px;">
                                </div>
                            </tr>
                            <tr class="border-bottom">
                                <td>Nama Siswa</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->name }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>NISN</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->nisn }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>NIS</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->nis }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>Jenis Kelamin</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->jk == 'laki-laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>Kelas</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->kelas->name }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>Alamat</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->alamat }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>Telepon</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->telepon }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>Email</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->email }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>Tahun SPP</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->spp->tahun }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-black">History Pembayaran</p>
                    <a href="/admin/pembayaran/create?siswa_id={{ $siswa->id }}" class="float-right text-primary">Entri
                        pembayaran</a>
                </div>
                <div class="card-body">
                    @if ($historysiswa->count() < 1)
                        <small> <b> {{ $siswa->name }} </b> Belum memiliki riwayat pembayaran.</small>
                    @else
                        <div class="table-responsive">
                            <table class="table table-sm table-hover fs-14 c-black" >
                                <tr class="border-bottom bg-dark text-white">
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
                        </div>
                    @endif
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
