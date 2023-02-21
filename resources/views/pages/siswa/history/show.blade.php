@extends('master.siswa.main')

@section('content')
    <h5 class="mb-3 fw-bold poppins text-xs-center">
        <a href="{{ route('riwayat.index') }}" class="btn btn-sm btn-outline-dark me-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi fw-bold bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
        </a>
        Riwayat Transaksi
    </h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-primary">Detail Pembayaran</p>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover fs-14 c-black">
                                <tr class="border-bottom">
                                    <td class="fw-bold">Kode Transaksi</td>
                                    <td style="width: 1px;">:</td>
                                    <td class="text-uppercase">{{ $pembayaran->identifier }}</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold">Waktu Transaksi</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ $pembayaran->created_at }}</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold">Nama Siswa</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ $pembayaran->userSiswa->name }}</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold">Kelas</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ $pembayaran->userSiswa->kelas->name }}</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold">Jumlah Bayar</td>
                                    <td style="width: 1px;">:</td>
                                    <td>Rp{{ number_format($pembayaran->jumlahbayar, 0, '.', '.') }}</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold">Tanggal Pembayaran</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ date('d-m-Y', strtotime($pembayaran->tanggalbayar)) }}</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold">Pembayaran untuk</td>
                                    <td style="width: 1px;">:</td>
                                    <td>{{ $pembayaran->bulanbayar->name }} - {{ $pembayaran->tahunbayar }} </td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold">Jenis Pembayaran</td>
                                    <td style="width: 1px;">:</td>
                                    <td class="text-uppercase">{{ $pembayaran->jenistransaksi }}</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold">Metode Pembayaran</td>
                                    <td style="width: 1px;">:</td>
                                    <td class="text-uppercase">{{ $pembayaran->metodepembayaran->payment }}</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold">Status</td>
                                    <td style="width: 1px;">:</td>
                                    <td>
                                        @if ($pembayaran->status == 'diproses')
                                            <span class="badge bg-warning">{{ strtoupper($pembayaran->status) }}</span>
                                        @elseif ($pembayaran->status == 'sukses')
                                            <span class="badge bg-success">{{ strtoupper($pembayaran->status) }}</span>
                                        @elseif ($pembayaran->status == 'gagal')
                                            <span class="badge bg-danger">{{ strtoupper($pembayaran->status) }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @if ($buktipembayaran->count() > 0)
                                    <tr class="border-bottom">
                                        <td class="fw-bold">Bukti Pembayaran</td>
                                        <td style="width: 1px;">:</td>
                                        <td>
                                            <img src="/buktipembayaran/{{ $buktipembayaran->first()->url }}" class="mb-3"
                                                alt="{{ $pembayaran->userSiswa->name }}"
                                                style="width: 160px; height: auto; overflow: hidden;">
                                        </td>
                                    </tr>
                                @endif

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
