@extends('master.admin.main')

@section('content')

<h5 class="mb-3 fw-bold text-xs-center poppins">
    Data Siswa 
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

    @can('admin')
    <div class="row mb-3">
        <div class="col-md-4">

            <!-- Input MD -->
            <div class="card shadow d-xs-none mb-sm-3 shadow">
                <div class="card-header fs-16">
                    <p class="m-0 font-weight-bold text-grey">Input Data Siswa</p>
                </div>
                <div class="card-body input-group-sm">
                    <form action="{{ route('siswa.store') }}" method="POST" class="input-group-sm fs-14">
                        @csrf

                        @include('pages.admin.datasiswa._addform')

                        <button class="mt-3 btn btn-success btn-sm btn-icon-split p-0 float-right fs-14">
                            <span class="icon text-white-50 m-0">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-xs-3">
            <div class="card shadow fs-16 shadow-sm">
                <div class="card-header">
                    <p class="m-0 font-weight-bold d-inline text-grey d-xs-none mt-3">Data Siswa</p>


                    {{-- Petunjuk Aksi --}}
                    <button class="btn btn-info d-inline btn-sm btn-icon-split float-right ms-2 rounded-circle"
                        data-bs-toggle="modal" data-bs-target="#petunjukAksi">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                    </button>

                    <a href="{{ route('siswa.create') }}"
                        class="btn btn-sm float-left btn-primary d-sm-none btn-icon-split">
                        <span class="icon text-white-30" style="padding-top: 0.20rem !important;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </span>
                        <span class="text">Siswa</span>
                    </a>

                    <button class="btn btn-warning btn-sm float-right d-inline btn-icon-split p-0 fs-14"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span class="icon text-white-50 m-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-cloud-upload-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z" />
                            </svg>
                        </span>
                        <span class="text">Import Data</span>
                    </button>

                </div>
                <div class="card-body">

                    @if ($siswa->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-sm table-hover fs-14 c-black" id="table1">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col" class="d-xs-none">NISN</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col" class="d-xs-none">Email</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($siswa as $tampilkan)
                                        <tr class="border-bottom">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tampilkan->name }}</td>
                                            <td class="d-xs-none">{{ $tampilkan->nisn }}</td>
                                            <td>{{ $tampilkan->kelas->name }}</td>
                                            <td class="d-xs-none">{{ $tampilkan->email }}</td>
                                            <td class="">

                                                <a href="{{ route('siswa.show', $tampilkan) }}" type="button"
                                                    class="btn btn-success pb-1 pt-0 px-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-columns-reverse" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 .5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10A.5.5 0 0 1 4 .5Zm-4 2A.5.5 0 0 1 .5 2h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 4h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 6h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 8h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Z"/>
                                                      </svg>
                                                </a>

                                                <a href="{{ route('siswa.edit', $tampilkan) }}" type="button"
                                                    class=" btn btn-primary pb-1 pt-0 px-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </a>

                                                @if ($pembayaran->where('siswa_id', $tampilkan->id)->count() < 1)
                                                    <button type="submit" class=" btn btn-danger pb-1 pt-0 px-2 d-inline"
                                                        data-bs-toggle="modal" data-bs-target="#modalDelete/{{ $tampilkan->identifier }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-trash3-fill pt-0"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                        </svg>
                                                    </button>
                                                @else
                                                    <button type="submit" class=" btn btn-danger pb-1 pt-0 px-2 d-inline"
                                                        data-bs-toggle="modal" data-bs-target="#modalGagalDelete/{{ $tampilkan->identifier }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-trash3-fill pt-0"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                        </svg>
                                                    </button>
                                                @endif

                                                <div class="modal fade" id="modalDelete/{{ $tampilkan->identifier }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fw-semibold poppins" id="exampleModalLabel">Hapus Data
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Data: <p class="text-primary fw-bold">{{ $tampilkan->name . ' - ' . $tampilkan->kelas->name }}</p>
                                                                Apakah anda yakin data tersebut akan dihapus?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <form action="{{ route('siswa.destroy', $tampilkan) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="modalGagalDelete/{{ $tampilkan->identifier }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fw-semibold poppins" id="exampleModalLabel">Peringatan
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Data: <p class="text-primary fw-bold">{{ $tampilkan->name . ' - ' . $tampilkan->kelas->name }}</p>
                                                                Data tersebut tidak dapat dihapus karena <b> {{ $tampilkan->name . ' - ' . $tampilkan->kelas->name }} </b> telah melakukan beberapa transaksi!
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-dismiss="modal">Oke</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @else
                        Data tidak ditemukan. <a href="{{ route('siswa.index') }}" class="">Refresh halaman</a>
                    @endif

                </div>

            </div>
        </div>
    </div>
    @endcan

    @can('petugas')
        <div class="row mb-3">
            <div class="col-12">
                <div class="card shadow fs-16 shadow-sm">
                    <div class="card-header">
                        <p class="m-0 font-weight-bold d-inline text-grey d-xs-none mt-3">Data Siswa</p>
    
    
                        {{-- Petunjuk Aksi --}}
                        <button class="btn btn-info d-inline btn-sm btn-icon-split float-right ms-2 rounded-circle"
                            data-bs-toggle="modal" data-bs-target="#petunjukAksi">
                            <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                            </span>
                        </button>
    
                        <a href="{{ route('siswa.create') }}"
                            class="btn btn-sm float-left btn-primary d-sm-none btn-icon-split">
                            <span class="icon text-white-30" style="padding-top: 0.20rem !important;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </span>
                            <span class="text">Siswa</span>
                        </a>
    
                    </div>
                    <div class="card-body">
    
                        @if ($siswa->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-sm table-hover fs-14 c-black" id="table1">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">NISN</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    
                                        @foreach ($siswa as $tampilkan)
                                            <tr class="border-bottom">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $tampilkan->name }}</td>
                                                <td>{{ $tampilkan->nisn }}</td>
                                                <td>{{ $tampilkan->kelas->name }}</td>
                                                <td>{{ $tampilkan->email }}</td>
                                                <td class="">
    
                                                    <a href="{{ route('siswa.show', $tampilkan) }}" type="button"
                                                        class="btn btn-success pb-1 pt-0 px-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                            <path
                                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                        </svg>
                                                    </a>
    
                                                </td>
                                            </tr>
                                        @endforeach
    
                                    </tbody>
                                </table>
                            </div>
                        @else
                            Data tidak ditemukan. <a href="{{ route('siswa.index') }}" class="">Refresh halaman</a>
                        @endif
    
                    </div>
    
                </div>
            </div>
        </div>
    @endcan

    {{-- Modal Import Data --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            
            <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data">
            @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title poppins fw-semibold" id="exampleModalLabel">Import Data Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>Penting!</strong> File yang diunggah harus berupa dokumen Microsoft Excel dengan ekstensi
                            .xlsx
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="file" class="form-control" id="inputGroupFile01" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            
            </form>

        </div>
    </div>

    <script>
        var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
        var collapseList = collapseElementList.map(function(collapseEl) {
            return new bootstrap.Collapse(collapseEl)
        })
    </script>
@endsection
