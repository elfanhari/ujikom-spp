@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold text-xs-center poppins">Laporan Transaksi</h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
             {{ session('info') }}
        </div>
    @endif

    @if (session()->has('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @include('_failed')
             {!! session('gagal') !!}
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-12">

            <!-- Input MD -->
            <div class="card shadow">
                <div class="card-header">
                    <a href="{{ route('laporan.index') }}" class="fs-14 float-right">Refresh halaman</a>
                    <p class="m-0 font-weight-bold text-dark">Generate Laporan</p>
                </div>
                <div class="card-body ">
                    <form action="{{ route('laporan.index') }}" method="GET" class="input-group-sm fs-14">
                        @csrf
                        <div class="row mb-3">
                            
                            <div class="col-md-4 d-block input-group-sm pb-3">
                                <label for="petugas_id" class="mb-1  fw-semibold">Pilih Petugas</label>
                                <select name="petugas_id" id="petugas_id" class="form-select mb-1">
                                    <option value="" disabled selected>-- Pilih petugas --</option>
                                    {{-- <option value="" {{ request('petugas_id') == '' ? 'selected' : '' }}>Semua
                                    </option> --}}
                                    @if (auth()->user()->level == 'admin')
                                        @foreach ($petugas as $tampilkan)
                                            <option 
                                                value="{{ $tampilkan->id }}"
                                                {{ $tampilkan->id == request('petugas_id') ? 'selected' : '' }} {{ $tampilkan->id == auth()->user()->id ? 'selected' : '' }}>
                                                {{ $tampilkan->name }} - {{ strtoupper($tampilkan->level) }} 
                                            </option>
                                        @endforeach
                                    @else
                                        <option 
                                            value="{{ auth()->user()->id }}"
                                            {{ auth()->user()->id == request('petugas_id') ? 'selected' : '' }} {{ auth()->user()->id == auth()->user()->id ? 'selected' : '' }}>
                                            {{ auth()->user()->name }} - {{ strtoupper(auth()->user()->level) }} 
                                        </option>
                                    @endif
                                </select>
                            </div>
                            
                            <div class="col-md-4 input-group-sm">
                                <label for="daritanggal" class="mb-1 fw-semibold">Dari Tanggal</label>
                                <input type="date" name="daritanggal" id="daritanggal"
                                    class="form form-control mb-3 mt-0" placeholder="daritanggal">
                            </div>
                            <div class="col-md-4 input-group-sm">
                                <label for="sampaitanggal" class="mb-1 fw-semibold">Sampai Tanggal</label>
                                <input value="{{ old('sampaitanggal') }}" type="date" name="sampaitanggal"
                                    id="sampaitanggal" class="form form-control mb-3 mt-0" placeholder="sampaitanggal">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary float-right">Generate</button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-12 fs">
            <div class="card shadow mt-4">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-dark">Pratinjau Laporan</p>
                    <form action="{{ route('laporan.create') }}" target="_blank" method="GET" class="d-inline">
                        @csrf
                        <input type="hidden" name="petugas_id" id="petugas_id" value="{{ request('petugas_id') }}">
                        <input type="hidden" name="daritanggal" id="daritanggal" value="{{ request('daritanggal') }}">
                        <input type="hidden" name="sampaitanggal" id="sampaitanggal"
                            value="{{ request('sampaitanggal') }}">
                    
                        @if ($pembayaran->count() > 0)
                        <button type="submit" class="btn float-right btn btn-sm btn-outline-success">
                            Cetak Laporan
                        </button>
                        @endif
                    </form>
                </div>
                <div class="card-body">

                    <div class="table-responsive">

                        @if ($pembayaran->count() < 1)
                            Data tidak ditemukan. <a href="{{ route('laporan.index') }}">Refresh halaman</a>
                        @else
                            <table class="table table-sm table-hover fs-14 c-black" id="table1">
                                <thead>
                                    <tr class="bg-dark text-white">
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
                                            <td>
                                                {{ Str::before(date('d-m-Y', strtotime($tampilkan->created_at)), ' ')}} 
                                                |
                                                {{ Str::after($tampilkan->created_at, ' ') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('siswa.show', $tampilkan->userSiswa->identifier) }}"
                                                    class="text-decoration-none">
                                                    {{ $tampilkan->userSiswa->name }}
                                                </a>
                                            </td>
                                            <td>{{ $tampilkan->userSiswa->kelas->name }}</td>
                                            <td>{{ $tampilkan->bulanbayar->name }} - {{ $tampilkan->tahunbayar }}</td>
                                            <td>Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</td>
                                            <td>{{ date('d-m-Y', strtotime($tampilkan->tanggalbayar)) }}</td>
                                            <td>
                                               
                                                    <a href="{{ route('petugas.show', $tampilkan->userPetugas->identifier) }}"
                                                        class="text-decoration-none">
                                                        {{ $tampilkan->userPetugas->name }}
                                                    </a>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @endif

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
