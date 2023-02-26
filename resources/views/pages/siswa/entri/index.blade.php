@extends('master.siswa.main')

@section('content')
<h5 class="mb-3 fw-bold text-xs-center poppins">Entri Pembayaran</h5>

    @include('pages.siswa.entri._petunjukpengisian')

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <a class="text-info float-right d-inline" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                    aria-controls="offcanvasTop">Petunjuk pengisian</a>
                </div>
                <div class="fs-14 card-body input-group-sm">

                    <form action="{{ route('entri.store') }}" method="POST" class="input-group-sm fs-14" enctype="multipart/form-data" accept="image/*">

                        @csrf
                        @include('pages.siswa.entri._addform')

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
