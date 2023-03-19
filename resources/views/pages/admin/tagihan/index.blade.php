@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold text-xs-center poppins">Laporan Belum Bayar</h5>

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
                    <a href="{{ route('tagihan.index') }}" class="fs-14 float-right">Refresh halaman</a>
                    <p class="m-0 font-weight-bold text-dark">Generate Laporan</p>
                </div>
                <div class="card-body ">
                    <form action="{{ route('tagihan.index') }}" method="GET" class="input-group-sm fs-14">
                        @csrf
                        <div class="row mb-3">
                            
                            <div class="col-md-4 d-block input-group-sm pb-3">
                                <label for="petugas_id" class="mb-1  fw-semibold">Pilih Kelas</label>
                                <select name="kelas_id" id="petugas_id" class="form-select mb-1" required>
                                    <option value="" disabled selected>-- Pilih kelas --</option>
                                    @foreach ($kelas as $tampilkan)
                                        <option value="{{ $tampilkan->id }}" {{ request('kelas_id') == $tampilkan->id ? 'selected' : '' }}>{{ $tampilkan->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-4 input-group-sm">
                                <label for="petugas_id" class="mb-1  fw-semibold">Pilih Bulan</label>
                                <select name="bulanbayar_id" id="petugas_id" class="form-select mb-1" required>
                                    <option value="" disabled selected>-- Pilih bulan --</option>
                                    @foreach ($bulan as $tampilkan)
                                        <option value="{{ $tampilkan->id }}" {{ request('bulanbayar_id') == $tampilkan->id ? 'selected' : '' }}>{{ $tampilkan->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 input-group-sm">
                                <label for="sampaitanggal" class="mb-1 fw-semibold">Pilih Tahun</label>
                                <select name="tahunbayar" id="petugas_id" class="form-select mb-1" required>
                                    <option value="" disabled selected>-- Pilih tahun --</option>
                                    @foreach ($tahun as $tampilkan)
                                        <option value="{{ $tampilkan }}" {{ request('tahunbayar') == $tampilkan ? 'selected' : '' }}>{{ $tampilkan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary float-right">Generate</button>
                </div>
                </form>
            </div>
        </div>

        @if (request('kelas_id'))            
        <div class="col-12 fs">
            <div class="card shadow mt-4">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-dark">Pratinjau Laporan</p>
                    <form action="{{ route('tagihan.create') }}" target="_blank" method="GET" class="d-inline">
                        @csrf
                        <input type="hidden" name="bulanbayar_id" id="bulanbayar_id" value="{{ request('bulanbayar_id') }}" hidden>
                        <input type="hidden" name="kelas_id" id="kelas_id" value="{{ request('kelas_id') }}" hidden>
                        <input type="hidden" name="tahunbayar" id="tahunbayar"
                            value="{{ request('tahunbayar') }}" hidden>
                    
                        @if ($siswa->count() > 0)
                        <button type="submit" class="btn float-right btn btn-sm btn-outline-success">
                            Cetak Laporan
                        </button>
                        @endif
                    </form>
                </div>
                <div class="card-body">

                    <div class="table-responsive">

                        @if ($siswa->count() < 1)
                            Data tidak ditemukan. <a href="{{ route('tagihan.index') }}">Refresh halaman</a>
                        @else
                            <table class="table table-sm table-hover fs-14 c-black" id="table1">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">NISN</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Kelas</th>
                                        {{-- <th scope="col">Aksi</th> --}}
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
                                            {{-- <td>Aksi</td> --}}
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>

            </div>
        </div>
        @endif

    </div>

    <script>
        var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
        var collapseList = collapseElementList.map(function(collapseEl) {
            return new bootstrap.Collapse(collapseEl)
        })
    </script>
@endsection
