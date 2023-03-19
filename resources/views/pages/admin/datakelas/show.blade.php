@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold poppins">
        <button class="btn btn-sm btn-link p-0 me-2" onclick="history.back()">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi fw-bold bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
        </button> Data Kelas {{ $kelas->name }}
    </h5>

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
        <div class="col-12 mb-xs-3">
            <div class="card shadow fs-16 mb">
                <div class="card-header">

                    @if ($siswa->count() < 1)
                        <p class="m-0 font-weight-bold d-inline text-grey d-xs-none mt-3">Tidak ada siswa di Kelas
                            {{ $kelas->name }}</p>
                    @else
                        <a class="btn btn-sm btn-primary me-2" href="#naikKelas/{{ $kelas->identifier }}" data-bs-toggle="modal">Naik Kelas</a>
                        <a class="btn btn-sm btn-warning" href="#gantiSpp/{{ $kelas->identifier }}" data-bs-toggle="modal">Ubah SPP</a>
                    @endif

                    {{-- Petunjuk Aksi --}}
                    <button class="btn btn-info d-inline btn-sm btn-icon-split float-right ms-2 rounded-circle"
                        data-bs-toggle="modal" data-bs-target="#petunjukAksi">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                    </button>

                </div>
                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table table-sm table-hover fs-14 c-black" id="table1" id="table1">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col" class="d-xs-none">Jenis Kelamin</th>
                                    <th scope="col" class="d-xs-none">NISN</th>
                                    <th scope="col" class="d-xs-none">Tahun SPP</th>
                                    {{-- <th scope="col" class="d-xs-none">Pembayaran Terakhir</th> --}}
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($siswa as $tampilkan)
                                    <tr class="border-bottom">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tampilkan->name }}</td>
                                        <td class="d-xs-none">{{ Str::title($tampilkan->jk) }}</td>
                                        <td class="d-xs-none">{{ $tampilkan->nisn }}</td>
                                        <td class="d-xs-none">{{ $tampilkan->spp->tahun }}</td>
                                        {{-- <td class="d-xs-none">{{ $tampilkan->pembayaranSiswa->limit(1)->bulanbayar->name . ' ' .  $tampilkan->pembayaranSiswa[0]->tahunbayar}}</td> --}}
                                        <td>
                                            <a href="{{ route('siswa.show', $tampilkan) }}" type="button"
                                                    class="btn btn-success pb-1 pt-0 px-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-list-columns-reverse"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M0 .5A.5.5 0 0 1 .5 0h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 .5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10A.5.5 0 0 1 4 .5Zm-4 2A.5.5 0 0 1 .5 2h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 4h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 6h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 8h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Z" />
                                                    </svg>
                                                </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>

                </div>

                <div class="modal fade" id="naikKelas/{{ $kelas->identifier }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title poppins fw-semibold" id="exampleModalLabel">Naik
                                    Kelas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('kela.naikkelas', $kelas->identifier) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        Sebelum klik <b>Simpan</b>, Pastikan kelas yang dipilih sudah sesuai!
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    <label for="kelas_id" class="mb-1 fw-semibold">Naik ke Kelas</label>
                                    <select required name="kelas_id" id="kelas_id"
                                        class="text-black form form-control form-select mt-0  @error('kelas_id') is-invalid @enderror">
                                        <option value="" selected disabled>-- Pilih Kelas --</option>
                                        @foreach ($semuakelas as $tampilkan)
                                            <option value="{{ $tampilkan->id }}"> {{ $tampilkan->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kelas_id')
                                        <span class="invalid-feedback mt-1">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <input type="hidden" name="kelasSebelumnya" id="kelasSebelumnya"
                                    value="{{ $kelas->id }}" hidden>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="gantiSpp/{{ $kelas->identifier }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('kela.gantispp', $kelas->identifier) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title poppins fw-semibold" id="exampleModalLabel">Ganti
                                        SPP</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        Sebelum klik <b>Simpan</b>, Pastikan tahun SPP yang dipilih sudah sesuai!
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    <label for="spp_id" class="mb-1 fw-semibold">Ganti Tahun SPP</label>
                                    <select name="spp_id" id="spp_id"
                                        class="text-black form form-control form-select mt-0  @error('spp_id') is-invalid @enderror">
                                        <option value="" selected disabled>-- Pilih Tahun SPP --</option>
                                        @foreach ($semuaspp as $tampilkan)
                                            <option value="{{ $tampilkan->id }}"> {{ $tampilkan->tahun }} -
                                                Rp{{ number_format($tampilkan->nominal, 0, '.', '.') }}</option>
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('spp_id')
                                        <span class="invalid-feedback mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>

                                        <input type="hidden" name="kelasSebelumnya" id="kelasSebelumnya"
                                        value="{{ $kelas->id }}" hidden>
                                        <input type="hidden" name="sppSebelumnya" id="sppSebelumnya"
                                    value="{{ $siswa->count()<1 ? '' : $siswa[0]->spp->id }}" hidden>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
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
