@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold text-xs-center poppins">Data Kelas</h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">

            <!-- Input XS -->
            <div class="d-sm-none">
                
                    
                <div class="card mt-2 collapse show mb-3" id="collapse">
                    <div class="card-header fs-16">
                        <button type="button" class="btn-close float-right d-inline" data-bs-toggle="collapse"
                            data-bs-target="#collapse" aria-expanded="false" aria-controls="collapseExample"></button>
                            <p class="m-0 font-weight-bold text-primary">Input Data Kelas</p>
                        </div>
                    <div class="card-body input-group-sm">
                        <form action="{{ route('kelas.store') }}" method="POST">
                            @csrf
                            
                            @include('pages.admin.datakelas._addform')
                            
                            <button class="btn btn-sm btn-success float-right mt-3 ">Simpan</button>
                            
                        </form>
                    </div>
                </div>
               
            </div>

            <!-- Input MD -->
            <div class="card d-xs-none mb-sm-3">
                <div class="card-header fs-16">
                    <p class="m-0 font-weight-bold text-primary">Input Data Kelas</p>
                </div>
                <div class="card-body input-group-sm">
                    <form action="{{ route('kelas.store') }}" method="POST" class="input-group-sm fs-14">
                        @csrf

                        @include('pages.admin.datakelas._addform')

                        <button class="btn btn-sm btn-primary float-right mt-3">Simpan</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-xs-3">
            <div class="card fs-16 mb">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-primary mt-3">Data Kelas</p>
                    <button class="btn btn-sm btn-primary float-right d-sm-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse"
                    aria-expanded="true" aria-controls="collapseExample">
                    + Kelas
                </button>
                </div>
                <div class="card-body">

                    @if ($kela->count() > 0)
                        <form
                            class="w-xs-full float-right d-sm-inline-block form-inline input-group-sm mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group mb-3 mt-0 ">
                                <input type="text" name="search" id="search"
                                    class="form-control bg-light border-0 small" placeholder="Cari..." aria-label="Search"
                                    aria-describedby="basic-addon2" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-sm table-hover fs-14 c-black" id="table1">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Kelas</th>
                                        <th scope="col">Kompetensi Keahlian</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($kela as $tampilkan)
                                        <tr class="border-bottom">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tampilkan->name }}</td>
                                            <td>{{ $tampilkan->Kompetensikeahlian->name }}</td>
                                            <td class="">

                                                <a href="{{ route('kelas.edit', $tampilkan) }}" type="button"
                                                    class=" btn btn-primary pb-1 pt-0 px-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg> <small>Edit</small>
                                                </a>

                                                <button type="submit" class=" btn btn-danger pb-1 pt-0 px-2" data-bs-toggle="modal" data-bs-target="#modalDelete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-trash3-fill pt-0" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                    </svg> <small>Hapus</small>
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
                                                        <form action="{{ route('kelas.destroy', $tampilkan) }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Iya</button>
                                                        </form>
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
                        
                      Data tidak ditemukan. <a href="{{ route('kelas.index') }}" class="">Refresh halaman</a>
                    
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
