@extends('master.admin.main')

@section('content')

    <h5 class="mb-3 fw-bold poppins">
        <button class="btn btn-sm btn-outline-dark me-2" onclick="history.back()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi fw-bold bi-arrow-left"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
        </button> Data Admin</h5>

    <div class="row">
        <div class="col-md-6">

            <!-- Input XS -->
            <div class="d-sm-none">
               
                <div class="card shadow mt-2 mb-3" id="">
                    <div class="card-header fs-16">
                        <p class="m-0 font-weight-bold text-primary">Tambah Data Admin</p>
                    </div>
                    <div class="card-body input-group-sm">
                        <form action="{{ route('admin.store') }}" method="POST" class="input-group-sm fs-14">
                            @csrf

                            @include('pages.admin.dataadmin._addform')

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
                <div class="card-header fs-16">
                    <p class="m-0 font-weight-bold text-primary">Tambah Data Admin</p>
                </div>
                <div class="card-body input-group-sm">
                    <form action="{{ route('admin.store') }}" method="POST" class="input-group-sm fs-14">
                      @csrf

                      @include('pages.admin.dataadmin._addform')

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
    </div>

    <script>
        var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
        var collapseList = collapseElementList.map(function(collapseEl) {
            return new bootstrap.Collapse(collapseEl)
        })
    </script>
@endsection
