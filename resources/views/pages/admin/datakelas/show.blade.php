@extends('master.admin.main')

@section('content')

<h5 class="mb-3 fw-bold poppins">
  <button class="btn btn-sm btn-link p-0 me-2" onclick="history.back()">
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
          class="bi fw-bold bi-arrow-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd"
              d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
      </svg>
  </button> Data Kelas
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
                    <p class="m-0 font-weight-bold d-inline text-grey d-xs-none mt-3">Data Kelas</p>

                    {{-- Petunjuk Aksi --}}
                    <button class="btn btn-info d-inline btn-sm btn-icon-split float-right ms-2 rounded-circle"
                        data-bs-toggle="modal" data-bs-target="#petunjukAksi">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                    </button>

                    <button class="btn btn-sm float-left btn-primary d-sm-none btn-icon-split" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="true"
                        aria-controls="collapseExample">
                        <span class="icon text-white-30" style="padding-top: 0.20rem !important;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </span>
                        <span class="text">Kelas</span>
                    </button>

                </div>
                <div class="card-body">


                        <div class="table-responsive">
                            <table class="table table-sm table-hover fs-14 c-black" id="table1" id="table1">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col" class="d-xs-none">NISN</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($siswa as $tampilkan)
                                        <tr class="border-bottom">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tampilkan->name }}</td>
                                            <td class="d-xs-none">{{ $tampilkan->nisn }}</td>
                                            <td>
                                              Detail | Naik Kelas
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

    <script>
        var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
        var collapseList = collapseElementList.map(function(collapseEl) {
            return new bootstrap.Collapse(collapseEl)
        })
    </script>
@endsection
