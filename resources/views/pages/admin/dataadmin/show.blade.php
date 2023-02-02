@extends('master.admin.main')

@section('content')

    <h5 class="mb-3 fw-bold text-xs-center poppins">Data admin</h5>

    <div class="row">
      <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <p class="m-0 d-inline font-weight-bold text-primary">Detail admin</p>
                <a href="{{ route('admin.edit', $admin) }}" class="float-right">Edit profil</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover fs-14 c-black">
                          <tr class="border-bottom">
                            <div class="text-center">
                              <img src="/sb-admin/img/profil.png" class="mb-3 rounded-circle" alt="" style="width: 100px;">
                            </div>
                          </tr>
                          <tr class="border-bottom">
                            <td>Nama admin</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $admin->name }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Telepon</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $admin->telepon }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Email</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $admin->email }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Username</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $admin->username }}</td>
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
