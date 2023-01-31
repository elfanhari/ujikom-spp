@extends('master.admin.main')

@section('content')

    <h5 class="mb-3 fw-bold text-xs-center">Data Kompetensi Keahlian</h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">

            <!-- Input XS -->
            <div class="d-sm-none">
                <button class="btn btn-sm btn-primary mb-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse" aria-expanded="true" aria-controls="collapseExample">
                    Edit Kompetensi Keahlian
                </button>
                <div class="card mt-2 collapse mb-3 show" id="collapse">
                    <div class="card-header fs-16">
                      <button type="button" class="btn-close float-right d-inline" data-bs-toggle="collapse"
                            data-bs-target="#collapse" aria-expanded="false" aria-controls="collapseExample"></button>
                        <p class="m-0 font-weight-bold text-primary">Edit Data Prodi</p>
                    </div>
                    <div class="card-body input-group-sm">
                        <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
                            @csrf

                            @include('pages.admin.dataprodi._editform')

                            <button class="btn btn-sm btn-primary float-right mt-3">Simpan</button>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Input MD -->
            <div class="card d-xs-none mb-sm-3">
                <div class="card-header fs-16">
                    <p class="m-0 font-weight-bold text-primary">Edit Data Prodi</p>
                </div>
                <div class="card-body input-group-sm">
                    <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
                      @csrf
                      @method('PUT')

                        @include('pages.admin.dataprodi._editform')

                        {{-- <input type="text" name="" id="" value="{{ $prodi->name }}"> --}}

                        <button class="btn btn-sm btn-primary float-right mt-3">Simpan</button>

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
