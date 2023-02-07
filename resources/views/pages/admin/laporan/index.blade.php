@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold text-xs-center poppins">Laporan</h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-12">

            <!-- Input XS -->


            <!-- Input MD -->
            <div class="card fs-14">
                <div class="card-header">
                    <a href="{{ route('laporan.index') }}" class="float-right">Refresh halaman</a>
                    <p class="m-0 font-weight-bold text-primary">Generate Laporan</p>
                </div>
                <div class="card-body ">
                    <form action="{{ route('laporan.index') }}" method="get">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4 d-block input-group-sm">
                                <label for="petugas_id" class="mb-1">Pilih Petugas</label>
                                <select name="petugas_id" id="petugas_id" class="form-select mb-1">
                                    <option value="" disabled selected>-- Pilih petugas --</option>
                                    <option value="" {{ request('petugas_id') == '' ? 'selected' : '' }}>Semua</option>
                                    @foreach ($petugas as $tampilkan)
                                        <option value="{{ $tampilkan->id }}" {{ $tampilkan->id == request('petugas_id') ? 'selected' : '' }}>{{ $tampilkan->name }} - {{ $tampilkan->level }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 input-group-sm">
                                <label for="daritanggal" class="mb-1">Dari Tanggal</label>
                                <input type="date" name="daritanggal" id="daritanggal"
                                    class="form form-control mb-3 mt-0" placeholder="daritanggal">
                            </div>
                            <div class="col-md-4 input-group-sm">
                                <label for="sampaitanggal" class="mb-1">Sampai Tanggal</label>
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
            <div class="card mt-4">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-primary">Laporan Transaksi</p>
                    <button class="btn float-right btn btn-sm btn-outline-success">
                        Cetak Laporan
                    </button>
                </div>
                <div class="card-body">

                    <div class="table-responsive">

                        @if ($pembayaran->count() < 1)
                            Data tidak ditemukan. <a href="{{ route('laporan.index') }}">Refresh halaman</a>
                        @else
                            <table class="table table-sm table-hover fs-14 c-black">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">Waktu Transaksi</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Jumlah Bayar</th>
                                        <th scope="col">Tanggal Bayar</th>
                                        <th scope="col">Tahun SPP</th>
                                        <th scope="col">Nama Petugas</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($pembayaran as $tampilkan)
                                        <tr class="border-bottom">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tampilkan->created_at }}</td>
                                            <td>
                                              <a href="{{ route('siswa.show', $tampilkan->userSiswa->username) }}">
                                                {{ $tampilkan->userSiswa->name }}
                                              </a>
                                            </td>
                                            <td>{{ $tampilkan->userSiswa->kelas->name }}</td>
                                            <td>Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</td>
                                            <td>{{ $tampilkan->tanggalbayar }}</td>
                                            <td>{{ $tampilkan->userSiswa->spp->tahun }}</td>
                                            <td> 
                                              <a href="{{ route('petugas.show', $tampilkan->userPetugas->username) }}">
                                                {{ $tampilkan->userPetugas->name }}
                                              </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            <div class="float-right">
                                {{ $pembayaran->links() }}
                            </div>
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
