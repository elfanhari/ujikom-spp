@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold text-xs-center text-black poppins
    ">Data Pembayaran</h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row">

        <div class="col mb-xs-3">

            <div class="card shadow">
                <div class="card-header">
                    {{-- Petunjuk Aksi --}}
                    <button class="btn btn-info btn-sm btn-icon-split float-right ms-2 rounded-circle" data-bs-toggle="modal"
                        data-bs-target="#petunjukAksi">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                    </button>
                    <a href="{{ route('pembayaran.create') }}" class="btn btn-sm float-start btn-primary btn-icon-split">
                        <span class="icon text-white-30" style="padding-top: 0.20rem !important;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </span>
                        <span class="text">Transaksi</span>
                    </a>

                </div>
                <div class="card-body">

                    <ul class="nav nav-tabs d-flex justify-content-start align-items-center" id="tableTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="semua-tab" data-bs-toggle="tab" data-bs-target="#semua"
                                type="button" role="tab" aria-controls="semua" aria-selected="true">Semua</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="sukses-tab" data-bs-toggle="tab" data-bs-target="#sukses"
                                type="button" role="tab" aria-controls="sukses" aria-selected="false">Sukses</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="diproses-tab" data-bs-toggle="tab" data-bs-target="#diproses"
                                type="button" role="tab" aria-controls="diproses"
                                aria-selected="false">Diproses</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="gagal-tab" data-bs-toggle="tab" data-bs-target="#gagal"
                                type="button" role="tab" aria-controls="gagal" aria-selected="false">Gagal</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="tableTabContent">

                        <div class="tab-pane fade show active" id="semua" role="tabpanel" aria-labelledby="semua-tab">
                            <div class="mt-3">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-hover fs-14 transaction-table c-black active"
                                    id="table1">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Kode</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Pembayaran untuk</th>
                                            <th scope="col">Jumlah Bayar</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Petugas</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($semua as $tampilkan)
                                            <tr class="border-bottom">
                                                <td>{{ $loop->iteration }}</td>
                                                <td> {{ date('d-m-Y', strtotime($tampilkan->tanggalbayar)) }}</td>
                                                <td class="text-uppercase">{{ Str::limit($tampilkan->identifier, 5, '...') }}</td>
                                                <td>{{ $tampilkan->userSiswa->name }}</td>
                                                <td>{{ $tampilkan->userSiswa->kelas->name }}</td>
                                                <td>{{ $tampilkan->bulanbayar->name }} - {{ $tampilkan->tahunbayar }}</td>
                                                <td> Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</td>
                                                <td>
                                                    @if ($tampilkan->status == 'diproses')
                                                        <span
                                                            class="badge bg-warning">{{ strtoupper($tampilkan->status) }}</span>
                                                    @elseif ($tampilkan->status == 'sukses')
                                                        <span
                                                            class="badge bg-success">{{ strtoupper($tampilkan->status) }}</span>
                                                    @elseif ($tampilkan->status == 'gagal')
                                                        <span
                                                            class="badge bg-danger">{{ strtoupper($tampilkan->status) }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $tampilkan->petugas_id != null ? $tampilkan->userPetugas->name : '-' }}
                                                </td>
                                                <td class="">

                                                    <a href="{{ route('pembayaran.show', $tampilkan) }}" type="button"
                                                        class="btn btn-success pb-1 pt-0 px-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-list-columns-reverse" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M0 .5A.5.5 0 0 1 .5 0h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 .5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10A.5.5 0 0 1 4 .5Zm-4 2A.5.5 0 0 1 .5 2h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 4h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 6h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 8h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Z" />
                                                        </svg>
                                                    </a>

                                                    @can('admin')
                                                        <a href="{{ route('pembayaran.edit', $tampilkan) }}" type="button"
                                                            class=" btn btn-primary pb-1 pt-0 px-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                        </a>

                                                        {{-- <button type="submit" class=" btn btn-danger pb-1 pt-0 px-2"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalDeleteSemua/{{ $tampilkan}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-trash3-fill pt-0" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                            </svg>
                                                        </button> --}}

                                                        <div class="modal fade"
                                                            id="modalDeleteSemua/{{ $tampilkan->identifier }}" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title fw-semibold poppins"
                                                                            id="exampleModalLabel">Hapus Data
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="mb-3 mt-0">DATA:</p>
                                                                        Nama Siswa: <p class="text-primary fw-bold mb-2">
                                                                            {{ $tampilkan->userSiswa->name }} -
                                                                            {{ $tampilkan->userSiswa->kelas->name }}</p>
                                                                        Kode Transaksi: <p class="text-primary fw-bold">
                                                                            {{ strtoupper($tampilkan->identifier) }}</p>
                                                                        Apakah anda yakin data tersebut akan dihapus?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <form
                                                                            action="{{ route('pembayaran.destroy', $tampilkan) }}"
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
                                                    @endcan

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="sukses" role="tabpanel" aria-labelledby="sukses-tab">
                            <div class="mt-3">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-hover fs-14 transaction-table c-black" id="table2">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Kode</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Pembayaran untuk</th>
                                            <th scope="col">Jumlah Bayar</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Petugas</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sukses as $tampilkan)
                                            <tr class="border-bottom">
                                                <td>{{ $loop->iteration }}</td>
                                                <td> {{ date('d-m-Y', strtotime($tampilkan->tanggalbayar)) }}</td>
                                                <td class="text-uppercase">{{ Str::limit($tampilkan->identifier, 5, '...') }}</td>
                                                <td>{{ $tampilkan->userSiswa->name }}</td>
                                                <td>{{ $tampilkan->userSiswa->kelas->name }}</td>
                                                <td>{{ $tampilkan->bulanbayar->name }} - {{ $tampilkan->tahunbayar }}</td>
                                                <td> Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</td>
                                                <td>
                                                    @if ($tampilkan->status == 'diproses')
                                                        <span
                                                            class="badge bg-warning">{{ strtoupper($tampilkan->status) }}</span>
                                                    @elseif ($tampilkan->status == 'sukses')
                                                        <span
                                                            class="badge bg-success">{{ strtoupper($tampilkan->status) }}</span>
                                                    @elseif ($tampilkan->status == 'gagal')
                                                        <span
                                                            class="badge bg-danger">{{ strtoupper($tampilkan->status) }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $tampilkan->petugas_id != null ? $tampilkan->userPetugas->name : '-' }}
                                                </td>
                                                <td class="">

                                                    <a href="{{ route('pembayaran.show', $tampilkan) }}" type="button"
                                                        class="btn btn-success pb-1 pt-0 px-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-list-columns-reverse" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M0 .5A.5.5 0 0 1 .5 0h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 .5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10A.5.5 0 0 1 4 .5Zm-4 2A.5.5 0 0 1 .5 2h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 4h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 6h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 8h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Z" />
                                                        </svg>
                                                    </a>

                                                    @can('admin')
                                                        <a href="{{ route('pembayaran.edit', $tampilkan) }}" type="button"
                                                            class=" btn btn-primary pb-1 pt-0 px-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                        </a>

                                                        {{-- <button type="submit" class=" btn btn-danger pb-1 pt-0 px-2"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalDeleteSukses/{{ $tampilkan->identifier }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-trash3-fill pt-0" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                            </svg>
                                                        </button> --}}
                                                        <div class="modal fade"
                                                            id="modalDeleteSukses/{{ $tampilkan->identifier }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title fw-semibold poppins"
                                                                            id="exampleModalLabel">Hapus Data
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="mb-3 mt-0">DATA:</p>
                                                                        Nama Siswa: <p class="text-primary fw-bold mb-2">
                                                                            {{ $tampilkan->userSiswa->name }} -
                                                                            {{ $tampilkan->userSiswa->kelas->name }}</p>
                                                                        Kode Transaksi: <p class="text-primary fw-bold">
                                                                            {{ strtoupper($tampilkan->identifier) }}</p>
                                                                        Apakah anda yakin data tersebut akan dihapus?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <form
                                                                            action="{{ route('pembayaran.destroy', $tampilkan) }}"
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
                                                    @endcan

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="diproses" role="tabpanel" aria-labelledby="diproses-tab">
                            <div class="mt-3">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-hover fs-14 transaction-table c-black" id="table3">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Kode</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Pembayaran untuk</th>
                                            <th scope="col">Jumlah Bayar</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Petugas</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($diproses as $tampilkan)
                                            <tr class="border-bottom">
                                                <td>{{ $loop->iteration }}</td>
                                                <td> {{ date('d-m-Y', strtotime($tampilkan->tanggalbayar)) }}</td>
                                                <td class="text-uppercase">{{ Str::limit($tampilkan->identifier, 5, '...') }}</td>
                                                <td>{{ $tampilkan->userSiswa->name }}</td>
                                                <td>{{ $tampilkan->userSiswa->kelas->name }}</td>
                                                <td>{{ $tampilkan->bulanbayar->name }} - {{ $tampilkan->tahunbayar }}</td>
                                                <td> Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</td>
                                                <td>
                                                    @if ($tampilkan->status == 'diproses')
                                                        <span
                                                            class="badge bg-warning">{{ strtoupper($tampilkan->status) }}</span>
                                                    @elseif ($tampilkan->status == 'sukses')
                                                        <span
                                                            class="badge bg-success">{{ strtoupper($tampilkan->status) }}</span>
                                                    @elseif ($tampilkan->status == 'gagal')
                                                        <span
                                                            class="badge bg-danger">{{ strtoupper($tampilkan->status) }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $tampilkan->petugas_id != null ? $tampilkan->userPetugas->name : '-' }}
                                                </td>
                                                <td class="">

                                                    <a href="{{ route('pembayaran.show', $tampilkan) }}" type="button"
                                                        class="btn btn-success pb-1 pt-0 px-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-list-columns-reverse" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M0 .5A.5.5 0 0 1 .5 0h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 .5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10A.5.5 0 0 1 4 .5Zm-4 2A.5.5 0 0 1 .5 2h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 4h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 6h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 8h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Z" />
                                                        </svg>
                                                    </a>

                                                    @can('admin')
                                                        <a href="{{ route('pembayaran.edit', $tampilkan) }}" type="button"
                                                            class=" btn btn-primary pb-1 pt-0 px-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                        </a>

                                                        {{-- <button type="submit" class=" btn btn-danger pb-1 pt-0 px-2"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalDeleteDiproses/{{ $tampilkan->identifier }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-trash3-fill pt-0" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                            </svg>
                                                        </button> --}}
                                                        <div class="modal fade"
                                                            id="modalDeleteDiproses/{{ $tampilkan->identifier }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <<div class="modal-header">
                                                                        <h5 class="modal-title fw-semibold poppins"
                                                                            id="exampleModalLabel">Hapus Data
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="mb-3 mt-0">DATA:</p>
                                                                    Nama Siswa: <p class="text-primary fw-bold mb-2">
                                                                        {{ $tampilkan->userSiswa->name }} -
                                                                        {{ $tampilkan->userSiswa->kelas->name }}</p>
                                                                    Kode Transaksi: <p class="text-primary fw-bold">
                                                                        {{ strtoupper($tampilkan->identifier) }}</p>
                                                                    Apakah anda yakin data tersebut akan dihapus?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <form
                                                                        action="{{ route('pembayaran.destroy', $tampilkan) }}"
                                                                        method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Iya</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                </div>
                            @endcan

                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="gagal" role="tabpanel" aria-labelledby="gagal-tab">
                        <div class="mt-3">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-hover fs-14 transaction-table c-black" id="table4">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Pembayaran untuk</th>
                                        <th scope="col">Jumlah Bayar</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Petugas</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gagal as $tampilkan)
                                        <tr class="border-bottom">
                                            <td>{{ $loop->iteration }}</td>
                                            <td> {{ date('d-m-Y', strtotime($tampilkan->tanggalbayar)) }}</td>
                                            <td class="text-uppercase">{{ Str::limit($tampilkan->identifier, 5, '...') }}</td>
                                            <td>{{ $tampilkan->userSiswa->name }}</td>
                                            <td>{{ $tampilkan->userSiswa->kelas->name }}</td>
                                            <td>{{ $tampilkan->bulanbayar->name }} - {{ $tampilkan->tahunbayar }}</td>
                                            <td> Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</td>
                                            <td>
                                                @if ($tampilkan->status == 'diproses')
                                                    <span
                                                        class="badge bg-warning">{{ strtoupper($tampilkan->status) }}</span>
                                                @elseif ($tampilkan->status == 'sukses')
                                                    <span
                                                        class="badge bg-success">{{ strtoupper($tampilkan->status) }}</span>
                                                @elseif ($tampilkan->status == 'gagal')
                                                    <span
                                                        class="badge bg-danger">{{ strtoupper($tampilkan->status) }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $tampilkan->petugas_id != null ? $tampilkan->userPetugas->name : '-' }}
                                            </td>
                                            <td class="">

                                                <a href="{{ route('pembayaran.show', $tampilkan) }}" type="button"
                                                    class="btn btn-success pb-1 pt-0 px-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-list-columns-reverse"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M0 .5A.5.5 0 0 1 .5 0h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 .5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10A.5.5 0 0 1 4 .5Zm-4 2A.5.5 0 0 1 .5 2h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 4h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 6h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 8h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Z" />
                                                    </svg>
                                                </a>

                                                @can('admin')
                                                    <a href="{{ route('pembayaran.edit', $tampilkan) }}" type="button"
                                                        class=" btn btn-primary pb-1 pt-0 px-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-pencil-square"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>

                                                    <button type="submit" class=" btn btn-danger pb-1 pt-0 px-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalDeleteGagal/{{ $tampilkan->identifier }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-trash3-fill pt-0"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                        </svg>
                                                    </button>
                                                    <div class="modal fade"
                                                        id="modalDeleteGagal/{{ $tampilkan->identifier }}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title fw-semibold poppins"
                                                                        id="exampleModalLabel">Hapus Data
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="mb-3 mt-0">DATA:</p>
                                                                    Nama Siswa: <p class="text-primary fw-bold mb-2">
                                                                        {{ $tampilkan->userSiswa->name }} -
                                                                        {{ $tampilkan->userSiswa->kelas->name }}</p>
                                                                    Kode Transaksi: <p class="text-primary fw-bold">
                                                                        {{ strtoupper($tampilkan->identifier) }}</p>
                                                                    Apakah anda yakin data tersebut akan dihapus?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <form
                                                                        action="{{ route('pembayaran.destroy', $tampilkan) }}"
                                                                        method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Iya</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endcan

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
