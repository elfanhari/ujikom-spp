@extends('master.admin.main')

@section('content')

    <h5 class="mb-3 fw-bold text-xs-center">Data SPP</h5>

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
               
                <div class="card mt-2 mb-3" id="">
                    <div class="card-header fs-16">
                        <p class="m-0 font-weight-bold text-primary">Edit Data SPP</p>
                    </div>
                    <div class="card-body input-group-sm">
                        <form action="{{ route('spp.update', $spp->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            @include('pages.admin.dataspp._editform')

                            <button class="btn btn-sm btn-primary float-right mt-3">Simpan</button>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Input MD -->
            <div class="card d-xs-none mb-sm-3">
                <div class="card-header fs-16">
                    <p class="m-0 font-weight-bold text-primary">Edit Data SPP</p>
                </div>
                <div class="card-body input-group-sm">
                    <form action="{{ route('spp.update', $spp->id) }}" method="POST">
                      @csrf
                      @method('PUT')

                        @include('pages.admin.dataspp._editform')

                        <button class="btn btn-sm btn-primary float-right mt-2">Simpan</button>

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
