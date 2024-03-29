@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold text-xs-center poppins">
        Data SPP 
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

    <div class="row">
        <div class="col-md-4">

            <!-- Input XS -->
            <div class="d-sm-none">
                <div class="card shadow mt-2 collapse @error(request('')) show @enderror mb-3" id="collapse">
                    <div class="card-header fs-16">
                        <button type="button" class="btn-close float-right d-inline" data-bs-toggle="collapse"
                            data-bs-target="#collapse" aria-expanded="false" aria-controls="collapseExample"></button>
                        <p class="m-0 font-weight-bold text-grey">Input Data SPP</p>
                    </div>
                    <div class="card-body input-group-sm">
                        <form action="{{ route('spp.store') }}" method="POST" class="input-group-sm fs-14">
                            @csrf

                            @include('pages.admin.dataspp._addform')

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

            <!-- Input MD -->
            <div class="card shadow d-xs-none mb-sm-3">
                <div class="card-header">
                    <p class="m-0 font-weight-bold d-inline text-grey d-xs-none mt-3">Input Data SPP</p>

                </div>
                <div class="card-body input-group-sm">
                    <form action="{{ route('spp.store') }}" method="POST" class="input-group-sm fs-14">
                        @csrf

                        @include('pages.admin.dataspp._addform')

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
            <div class="card shadow fs-16 mb">
                <div class="card-header">
                    <p class="m-0 font-weight-bold d-inline text-grey d-xs-none mt-3">Data SPP</p>
                    
                    {{-- Petunjuk Aksi --}}
                    <button class="btn btn-info d-inline btn-sm btn-icon-split float-right ms-2 rounded-circle"
                        data-bs-toggle="modal" data-bs-target="#petunjukAksi">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                    </button>

                    <button class="btn btn-sm float-left btn-primary d-sm-none btn-icon-split" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse" aria-expanded="true" aria-controls="collapseExample">
                        <span class="icon text-white-30" style="padding-top: 0.20rem !important;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </span>
                        <span class="text">SPP</span>
                    </button>

                </div>
                <div class="card-body">

                    @if ($spp->count() > 0)
                        
                        <div class="table-responsive">
                            <table class="table table-sm table-hover fs-14 c-black" id="table1">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">Tahun SPP</th>
                                        <th scope="col">Nominal</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($spp as $tampilkan)
                                        <tr class="border-bottom">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tampilkan->tahun }}</td>
                                            <td>Rp{{ number_format($tampilkan->nominal, 0, '.', '.') }}</td>
                                            <td class="">

                                                <a href="{{ route('spp.edit', $tampilkan) }}" type="button"
                                                    class=" btn btn-primary pb-1 pt-0 px-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </a>

                                                @if ($user->where('spp_id', $tampilkan->id)->count() < 1)
                                                <button type="submit" class=" btn btn-danger pb-1 pt-0 px-2 " data-bs-toggle="modal" data-bs-target="#modalDelete/{{ $tampilkan->identifier }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-trash3-fill pt-0" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                    </svg>
                                                </button>
                                                @else
                                                <button type="submit" class=" btn btn-danger pb-1 pt-0 px-2 " data-bs-toggle="modal" data-bs-target="#modalGagalDelete/{{ $tampilkan->identifier }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-trash3-fill pt-0" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                    </svg>
                                                </button>
                                                @endif


                                                <div class="modal fade" id="modalDelete/{{ $tampilkan->identifier }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title poppins fw-semibold" id="exampleModalLabel">Hapus Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                        Data: <p class="text-primary fw-bold">Tahun {{ $tampilkan->tahun }} - Rp{{ number_format($tampilkan->nominal, 0, '.', '.') }}</p>
                                                        Apakah anda yakin data tersebut akan dihapus?
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('spp.destroy', $tampilkan) }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Hapus</button>
                                                        </form>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                
                                                <div class="modal fade" id="modalGagalDelete/{{ $tampilkan->identifier }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title poppins fw-semibold" id="exampleModalLabel">Peringatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                        Data: <p class="text-primary fw-bold">Tahun {{ $tampilkan->tahun }} - Rp{{ number_format($tampilkan->nominal, 0, '.', '.') }}</p>
                                                        Data tersebut tidak dapat dihapus karena terdapat beberapa siswa dengan  <b> Tahun SPP {{ $tampilkan->tahun }}! </b>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>
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
                        
                      Data tidak ditemukan. <a href="{{ route('spp.index') }}" class="">Refresh halaman</a>
                    
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
