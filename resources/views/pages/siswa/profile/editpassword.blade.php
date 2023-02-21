@extends('master.siswa.main')

@section('content')

    <h5 class="mb-3 fw-bold text-xs-center poppins">Profile</h5>

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
                        <p class="m-0 font-weight-bold text-primary">Edit Password</p>
                    </div>
                    <div class="card-body input-group-sm">
                        <form action="{{ route('password-siswa.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            @include('pages.siswa.profile._editpassword')

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
            <div class="card d-xs-none mb-sm-3">
                <div class="card-header fs-16">
                    <p class="m-0 font-weight-bold text-primary">Edit Password</p>
                </div>
                <div class="card-body input-group-sm">
                    <form action="{{ route('password-siswa.update') }}" method="POST">
                      @csrf
                      @method('PUT')

                        @include('pages.siswa.profile._editpassword')

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
