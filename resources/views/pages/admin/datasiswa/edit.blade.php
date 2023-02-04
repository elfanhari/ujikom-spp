@extends('master.admin.main')

@section('content')

    <h5 class="mb-3 fw-bold text-xs-center poppins">Data Siswa</h5>

    <div class="row">
        <div class="col-md-6">

            <!-- Input XS -->
            <div class="d-sm-none">
               
                <div class="card mt-2 mb-3" id="">
                    <div class="card-header fs-16">
                        <p class="m-0 font-weight-bold text-primary">Edit Data Siswa</p>
                    </div>
                    <div class="card-body input-group-sm">
                        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')

                            @include('pages.admin.datasiswa._editform')

                            <button class="btn btn-sm btn-primary float-right mt-3">Simpan</button>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Input MD -->
            <div class="card d-xs-none mb-sm-3">
                <div class="card-header fs-16">
                    <p class="m-0 font-weight-bold text-primary">Edit Data Siswa</p>
                </div>
                <div class="card-body input-group-sm">
                    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                      @csrf
                      @method('PUT')

                        @include('pages.admin.datasiswa._editform')

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
