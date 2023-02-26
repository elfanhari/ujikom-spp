@extends('master.admin.main')

@section('content')

<h5 class="mb-3 fw-bold text-xs-center poppins">
    Edit Data Admin
</h5>

    <div class="row">
        <div class="col-md-6">

            <!-- Input MD -->
            <div class="card shadow mb-sm-3">
                <div class="card-header fs-16">
                        <button class="text-decoration-none poppins d-inline btn-link m-0 p-0 btn" onclick="history.back()">< Kembali</button>
                        <a href="{{ route('updatepassword.edit', $admin) }}" class="float-right text-warning fs-16">Edit password</a>
                </div>
                <div class="card-body input-group-sm">
                    <form action="{{ route('admin.update', $admin) }}" method="POST" class="input-group-sm fs-14">
                      @csrf
                      @method('PUT')

                        @include('pages.admin.dataadmin._editform')

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
