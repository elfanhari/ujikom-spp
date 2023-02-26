@extends('master.admin.main')

@section('content')

<h5 class="mb-3 fw-bold text-xs-center poppins">
    Edit Data SPP
</h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-md-6">

            <!-- Input XS -->
            <div class="d-sm-none">
               
                <div class="card shadow mt-2 mb-3" id="">
                    <div class="card-header fs-16">
                        <button class="text-decoration-none poppins btn-link m-0 p-0 btn" onclick="history.back()">< Kembali</button>
                    </div>
                    <div class="card-body input-group-sm">
                        <form action="{{ route('spp.update', $spp) }}" method="POST" class="input-group-sm">
                            @csrf
                            @method('PUT')

                            @include('pages.admin.dataspp._editform')

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
                    <button class="text-decoration-none poppins btn-link m-0 p-0 btn" onclick="history.back()">< Kembali</button>
                </div>
                <div class="card-body input-group-sm">
                    <form action="{{ route('spp.update', $spp) }}" method="POST" class="input-group-sm">
                      @csrf
                      @method('PUT')

                        @include('pages.admin.dataspp._editform')

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
