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
            <div class="card fs-16 mb">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-primary">Data Pembayaran</p>
                    <a href="{{ route('pembayaran.create') }}" class="btn btn-sm btn-primary float-right" type="button">
                        Tambah Pembayaran
                    </a>
                </div>
                
                <div class="card-body">

                    @if ($pembayaran->count() > 0)
                        
                        <div class="table-responsive">
                            <table class="table table-sm table-hover fs-14 c-black" id="table1" id="table1">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal Pembayaran</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Pembayaran untuk</th>
                                        <th scope="col">Jumlah Bayar</th>
                                        <th scope="col">Petugas</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($pembayaran as $tampilkan)
                                        <tr class="border-bottom">
                                            <td>{{ $loop->iteration }}</td>
                                            <td> {{ date('d-m-Y', strtotime($tampilkan->tanggalbayar)) }}</td>
                                            <td>{{ $tampilkan->userSiswa->name }}</td>
                                            <td>{{ $tampilkan->userSiswa->kelas->name }}</td>
                                            <td>{{ $tampilkan->bulanbayar->name }} - {{ $tampilkan->tahunbayar }}</td>
                                            <td> Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</td>
                                            <td>{{ $tampilkan->userPetugas->name }}</td>
                                            <td class="">

                                            <a href="{{ route('pembayaran.show', $tampilkan) }}" type="button" class="btn btn-success pb-1 pt-0 px-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                    </svg>
                                                </a>

                                                @can('admin')
                                                <a href="{{ route('pembayaran.edit', $tampilkan) }}" type="button"
                                                    class=" btn btn-primary pb-1 pt-0 px-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </a>

                                                <button type="submit" class=" btn btn-danger pb-1 pt-0 px-2" data-bs-toggle="modal" data-bs-target="#modalDelete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-trash3-fill pt-0" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                    </svg>
                                                </button>
                                                <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                        Apakah anda yakin data tersebut akan dihapus?
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('pembayaran.destroy', $tampilkan) }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Iya</button>
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
                    @else
                        
                      Data tidak ditemukan. <a href="{{ route('siswa.index') }}" class="">Refresh halaman</a>
                    
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
