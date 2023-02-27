@extends('master.admin.main')

@section('content')
<h5 class="mb-3 fw-bold poppins">
    <button class="btn btn-sm btn-link p-0 me-2" onclick="history.back()">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
            class="bi fw-bold bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg>
    </button> Data Siswa
</h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 mb-xs-3">
            <div class="card shadow">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-grey">Detail Siswa</p>
                    @can('admin')
                        <a href="{{ route('siswa.edit', $siswa) }}" class="float-right">Edit profil</a>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover fs-14 c-black">
                            <tr class="border-bottom">
                                <div class="text-center postion-relative">
                                    @if ($userphoto->count() > 0)
                                        <img src="/gallery/{{ $userphoto->first()->url }}"
                                            class="img-profile mb-3 rounded-circle" alt="{{ $siswa->name }}"
                                            style="width: 100px; height: auto; overflow: hidden;">
                                    @else
                                        <img src="/img/profil.png" class="img-profile mb-3 rounded-circle"
                                            alt="{{ $siswa->name }}" style="width: 100px;">
                                    @endif

                                    @can('admin')
                                    <form action="{{ route('photo-user.edit', $siswa->id) }}" method="GET"
                                        class="d-inline">
                                        @csrf
                                        <button class="position-absolute btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                            <input type="hidden" name="redirect" id="redirect"
                                                value="{{ $redirect }}">
                                                <input type="hidden" name="name" id="name" value="{{ $siswa->name }}">
                                        </button>
                                    </form>
                                    @endcan

                                </div>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Nama Siswa</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->name }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">NISN</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->nisn }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">NIS</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->nis }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Jenis Kelamin</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->jk == 'laki-laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Kelas</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->kelas->name }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Alamat</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->alamat }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Telepon</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->telepon }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Email</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->email }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Tahun SPP</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $siswa->spp->tahun }} - Rp{{ number_format($siswa->spp->nominal, 0, '.', '.') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-grey">History Pembayaran</p>
                    <a href="/admin/entri?siswa_id={{ $siswa->id }}" class="float-right text-primary">Entri
                        pembayaran</a>
                </div>
                <div class="card-body">
                    @if ($historysiswa->where('status', 'sukses')->count() < 1)
                        <small> <b> {{ $siswa->name }} </b> Belum memiliki riwayat pembayaran.</small>
                    @else
                        <div class="table-responsive">
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
