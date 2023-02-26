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
                            <tr class="border-bottom">
                                <td class="fw-bold">Kode Transaksi</td>
                                <td style="width: 1px;">:</td>
                                <td class="text-uppercase">{{ $pembayaran->identifier }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Waktu Transaksi</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    {{ Str::before(date('d-m-Y', strtotime($pembayaran->created_at)), ' ')}} 
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
                                    <option value="diproses" {{ $pembayaran->status == 'diproses' ? 'selected' : '' }}>DIPROSES</option>
                                    <option value="sukses" {{ $pembayaran->status == 'sukses' ? 'selected' : '' }}>SUKSES</option>
                                    <option value="gagal" {{ $pembayaran->status == 'gagal' ? 'selected' : '' }}>GAGAL</option>
                                </select>
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
                        <a href="{{ route('siswa.edit', $pembayaran->userSiswa->username) }}" class="float-right">Edit
                            siswa</a>
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
                                <td>{{ $pembayaran->userSiswa->spp->tahun }} - Rp{{ number_format($pembayaran->userSiswa->spp->nominal, 0, '.', '.') }}</td>
                            </tr>
                        </table>


                    </div>
                    <div class="mt-3">
                        <div class="my-2 text-black text-xs-center fw-bold">
                            History Pembayaran
                        </div>
                        <div class="table-responsive">

                            @if ($historysiswa->where('status', 'sukses')->count() < 1)
                                <small> <a href="{{ route('siswa.show', $pembayaran->userSiswa->identifier) }}">{{ $pembayaran->userSiswa->name }}</a> belum memiliki riwayat
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
                                            <td class="d-xs-none">Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</td>
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
