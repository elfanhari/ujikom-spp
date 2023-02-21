@extends('master.siswa.main')

@section('content')
    <h5 class="mb-3 fw-bold poppins">
        Entri Pembayaran
    </h5>

    @include('pages.siswa.entri._petunjukpengisian')

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <p class="m-0 font-weight-bold text-primary d-inline">Input Pembayaran</p>
                    <a class="text-info float-right d-inline" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                    aria-controls="offcanvasTop">Petunjuk pengisian</a>
                </div>
                <div class="fs-14 card-body input-group-sm">

                    <form action="{{ route('entri.store') }}" method="POST" class="input-group-sm fs-14" enctype="multipart/form-data" accept="image/*">

                        @csrf
                        @include('pages.siswa.entri._addform')

                        <button class="btn btn-sm mt-3 btn-primary float-right" type="submit">Simpan</button>
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
