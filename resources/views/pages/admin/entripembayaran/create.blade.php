@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold text-xs-center poppins">Entri Pembayaran</h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-5">

            <!-- Input XS -->


            <!-- Input MD -->
            <div class="card mb-4">
                <div class="card-header">
                    <p class="m-0 font-weight-bold text-primary">Input Pembayaran</p>
                </div>
                <div class="fs-14 card-body input-group-sm">

                    {{-- <form action="" method="GET">
                        <div class="input-group">
                            <input type="text" name="nisn" value="{{ request('nisn') }}" class="form-control"
                                placeholder="Masukkan NISN" aria-label="Recipient's username with two button addons"
                                required>
                            <button class="btn btn-outline-primary" type="submit">Cek</button>
                        </div>
                    </form> --}}

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

                            <button class="btn btn-sm mt-3 btn-primary float-right" type="submit">Simpan</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-primary">Detail Siswa</p>
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
                                        <td>NISN</td>
                                        <td style="width: 1px;">:</td>
                                        <td>{{ $tampilkan->nisn }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td>NIS</td>
                                        <td style="width: 1px;">:</td>
                                        <td>{{ $tampilkan->nis }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td>Nama Siswa</td>
                                        <td style="width: 1px;">:</td>
                                        <td>{{ $tampilkan->name }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td>Kelas</td>
                                        <td style="width: 1px;">:</td>
                                        <td>{{ $tampilkan->kelas->name }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td>Alamat</td>
                                        <td style="width: 1px;">:</td>
                                        <td>{{ $tampilkan->alamat }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td>Telepon</td>
                                        <td style="width: 1px;">:</td>
                                        <td>{{ $tampilkan->telepon }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td>Tahun SPP</td>
                                        <td style="width: 1px;">:</td>
                                        <td>{{ $tampilkan->spp->tahun }}</td>
                                    </tr>
                                </table>
                            </div>
                        @endforeach
                    @else
                        Data tidak ditemukan.
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
