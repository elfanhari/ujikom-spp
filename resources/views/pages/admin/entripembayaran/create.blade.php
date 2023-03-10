@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold text-xs-center poppins">Entri Pembayaran</h5>

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

    <div class="row mb-4">
        <div class="col-md-5">

            <!-- Input XS -->


            <!-- Input MD -->
            <div class="card shadow mb-4">
                <div class="card-header fs-16">
                    <button class="text-decoration-none poppins btn-link m-0 p-0 btn" onclick="history.back()">< Kembali</button>
                  </div>
                <div class="fs-14 card-body input-group-sm">

                    <form action="" method="GET" class="{{ request('siswa_id') ? 'd-none' : '' }}">
                        <div class="input-group">
                            <select name="kelas_id" id="kelas_id" value="{{ old('kelas_id') }}"
                                class="text-black disabled form form-control form-select mt-0  @error('kelas_id') is-invalid @enderror">
                                <option value="" selected disabled>-- Pilih kelas --</option>
                                @foreach ($kelas as $tampilkan)
                                    <option value="{{ $tampilkan->id }}"
                                        {{ $tampilkan->id == request('kelas_id') ? 'selected' : '' }}>{{ $tampilkan->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                                <span class="invalid-feedback mt-1">{{ $message }}</span>
                            @enderror
                            <button class="btn btn-outline-primary" type="submit">Cek</button>
                        </div>
                    </form>

                    @if ($siswa->count() > 0)
                        <form action="" method="get"
                            class="{{ !request('kelas_id') ? 'd-none' : '' }} input-group-sm fs-14">
                            <div class="input-group mt-3">
                                <select name="siswa_id" id="siswa_id" value="{{ old('siswa_id') }}"
                                    class="text-black form form-control form-select mt-0  @error('siswa_id') is-invalid @enderror">
                                    <option value="" selected disabled>-- Pilih siswa --</option>
                                    @foreach ($siswa as $tampilkan)
                                        <option value="{{ $tampilkan->id }}"
                                            {{ $tampilkan->id == request('siswa_id') ? 'selected' : '' }}>
                                            {{ $tampilkan->name }}</option>
                                    @endforeach
                                </select>
                                @error('siswa_id')
                                    <span class="invalid-feedback mt-1">{{ $message }}</span>
                                @enderror
                                <button class="btn btn-outline-primary" type="submit">Cek</button>
                            </div>
                        </form>
                    @else
                        <p class="mt-3">Siswa tidak ada.</p>
                    @endif

                    @if ($siswaCek->count() > 0)
                        <form action="{{ route('pembayaran.store') }}" method="POST" class="input-group-sm fs-14">

                            @csrf
                            @include('pages.admin.entripembayaran._addform')

                            <button class="mt-3 btn btn-success btn-sm btn-icon-split p-0 float-right fs-14">
                                <span class="icon text-white-50 m-0">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Simpan</span>
                            </button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-grey">Detail Siswa</p>
                </div>
                <div class="card-body">
                    @if ($siswaCek->count() > 0)
                        @foreach ($siswaCek as $tampilkan)
                            <div class="table-responsive">
                                <table class="table table-sm table-hover fs-14 c-black">
                                    <tr class="border-bottom">
                                        <div class="text-center">
                                            @if ($userphoto->count() > 0)
                                                <img src="/gallery/{{ $userphoto->first()->url }}"
                                                    class="img-profile mb-3 rounded-circle" alt="{{ $tampilkan->name }}"
                                                    style="width: 100px; height: auto; overflow: hidden;">
                                            @else
                                                <img src="/img/profil.png" class="img-profile mb-3 rounded-circle"
                                                    alt="{{ $tampilkan->name }}" style="width: 100px;">
                                            @endif
                                        </div>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="fw-bold">Nama</td>
                                        <td style="width: 1px;">:</td>
                                        <td>{{ $tampilkan->name }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="fw-bold">Kelas</td>
                                        <td style="width: 1px;">:</td>
                                        <td>{{ $tampilkan->kelas->name }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="fw-bold">Email</td>
                                        <td style="width: 1px;">:</td>
                                        <td>{{ $tampilkan->email }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="fw-bold">Tahun SPP</td>
                                        <td style="width: 1px;">:</td>
                                        <td>{{ $tampilkan->spp->tahun }} - Rp{{ number_format($tampilkan->spp->nominal, 0, '.', '.') }}</td>
                                    </tr>
                                </table>
                            </div>
                        @endforeach
                    @else
                        Data tidak ditemukan.
                    @endif

                    @if (request('siswa_id'))
                    <div class="mt-3">
                        <div class="my-2 text-black text-xs-center fw-bold">
                            History Pembayaran {{ Str::before($siswaCek[0]->name , ' ') }}
                        </div>
                        <div class="table-responsive">
                            
                            @if ($historysiswa->count() < 1)
                                <small> <a href="">{{ $siswaCek[0]->name }}</a> belum memiliki riwayat
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
