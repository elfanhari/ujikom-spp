@extends('master.admin.main')

@section('content')

    <h5 class="mb-3 fw-bold poppins">
        <button class="btn btn-sm btn-outline-dark me-2" onclick="history.back()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi fw-bold bi-arrow-left"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
        </button> Data petugas</h5>

    <div class="row">
      <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <p class="m-0 d-inline font-weight-bold text-primary">Detail petugas</p>
                <a href="{{ route('petugas.edit', $petuga) }}" class="float-right">Edit profil</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover fs-14 c-black" id="table1">
                          <tr class="border-bottom">
                            <div class="text-center">
                              <img src="/sb-admin/img/profil.png" class="mb-3 rounded-circle" alt="" style="width: 100px;">
                            </div>
                          </tr>
                          <tr class="border-bottom">
                            <td>Nama petugas</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $petuga->name }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Telepon</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $petuga->telepon }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Email</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $petuga->email }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Username</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $petuga->username }}</td>
                          </tr>
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
