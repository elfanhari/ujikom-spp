@extends('master.admin.main')

@section('content')

    <h5 class="mb-3 fw-bold poppins">
        <button class="btn btn-sm btn-link p-0 me-2" onclick="history.back()">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi fw-bold bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
        </button> Data Pembayaran
    </h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row mb-3">

        <div class="col-md-6 mb-xs-3">

            <div class="card shadow">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-grey">Detail Pembayaran</p>
                    @can('admin')
                        <a href="{{ route('pembayaran.edit', $pembayaran) }}" class="float-right">Edit pembayaran</a>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover fs-14 c-black">

                            @if ($pembayaran->status == 'sukses')
                                <a href="{{ route('pembayaran.print', $pembayaran) }}" target="_blank"
                                    class="mt-0 mb-3 btn btn-danger btn-sm btn-icon-split fs-14">
                                    <span class="icon text-white m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                            <path
                                                d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                        </svg>
                                    </span>
                                    <span class="text">Print Struk</span>
                                </a>

                                <form action="{{ route('pembayaran.kirimstruk', $pembayaran) }}" method="POST">
                                @csrf
                                    <button type="submit" class="mt-0 mb-3 ms-2 float-right btn btn-info btn-sm btn-icon-split fs-14">
                                        <span class="icon text-white m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z" />
                                                <path
                                                    d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z" />
                                            </svg>
                                        </span>
                                        <span class="text">Kirim Struk</span>
                                    </button>
                                </form>

                            @endif

                            <tr class="border-bottom">
                                <td class="fw-bold">Kode Transaksi</td>
                                <td style="width: 1px;">:</td>
                                <td class="text-uppercase">{{ $pembayaran->identifier }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Waktu Transaksi</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    {{ Str::before(date('d-m-Y', strtotime($pembayaran->created_at)), ' ') }}
                                    |
                                    {{ Str::after($pembayaran->created_at, ' ') }}
                                </td>
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
                                <td class="fw-bold">Jenis Transaksi</td>
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

                        <form action="{{ route('statuspembayaran.update', $pembayaran) }}" method="post" class="mt-2">
                            @method('PUT')
                            @csrf

                            <label for=""><small><i>Ubah status transaksi</i></small></label>
                            <div class="input-group">
                                <select name="status" class="form-select" id="inputGroupSelect04"
                                    aria-label="Example select with button addon">
                                    <option disabled>-- Pilih --</option>
                                    <option value="diproses" {{ $pembayaran->status == 'diproses' ? 'selected' : '' }}>
                                        DIPROSES</option>
                                    <option value="sukses" {{ $pembayaran->status == 'sukses' ? 'selected' : '' }}>SUKSES
                                    </option>
                                    <option value="gagal" {{ $pembayaran->status == 'gagal' ? 'selected' : '' }}>GAGAL
                                    </option>
                                </select>
                                <input type="hidden" name="petugas_id" value="{{ auth()->user()->id }}">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>

                        </form>


                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-grey">Detail Siswa</p>
                    @can('admin')
                        <a href="/admin/entri?siswa_id={{ $pembayaran->userSiswa->id }}" class="float-right">Entri
                            pembayaran</a>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover fs-14 c-black">
                            <tr class="border-bottom">
                                <div class="text-center">
                                    @if ($userphoto->count() > 0)
                                        <img src="/gallery/{{ $userphoto->first()->url }}"
                                            class="img-profile mb-3 rounded-circle"
                                            alt="{{ $pembayaran->userSiswa->name }}"
                                            style="width: 100px; height: auto; overflow: hidden;">
                                    @else
                                        <img src="/img/profil.png" class="img-profile mb-3 rounded-circle"
                                            alt="{{ $pembayaran->userSiswa->name }}" style="width: 100px;">
                                    @endif
                                </div>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Nama</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $pembayaran->userSiswa->name }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Kelas</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $pembayaran->userSiswa->kelas->name }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Email</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $pembayaran->userSiswa->email }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Tahun SPP</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $pembayaran->userSiswa->spp->tahun }} -
                                    Rp{{ number_format($pembayaran->userSiswa->spp->nominal, 0, '.', '.') }}</td>
                            </tr>
                        </table>


                    </div>
                    <div class="mt-3">
                        <div class="my-2 text-black text-xs-center fw-bold">
                            History Pembayaran
                        </div>
                        <div class="table-responsive">

                            @if ($historysiswa->where('status', 'sukses')->count() < 1)
                                <small> <a
                                        href="{{ route('siswa.show', $pembayaran->userSiswa->identifier) }}">{{ $pembayaran->userSiswa->name }}</a>
                                    belum memiliki riwayat
                                    pembayaran.</small>
                            @else
                                <table class="table table-sm table-hover fs-14 c-black">
                                    <tr class="border-bottom bg-dark text-white">
                                        <td>#</td>
                                        <td>Tanggal</td>
                                        <td>Pembayaran untuk</td>
                                        <td class="d-xs-none">Nominal bayar</td>
                                    </tr>
                                    @foreach ($historysiswa->where('status', 'sukses') as $tampilkan)
                                        <tr class="border-bottom">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date('d-m-Y', strtotime($tampilkan->tanggalbayar)) }}</td>
                                            <td>{{ $tampilkan->bulanbayar->name }} - {{ $tampilkan->tahunbayar }}</td>
                                            <td class="d-xs-none">
                                                Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</td>
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
