@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold text-xs-center poppins">Profil Saya</h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row mb-3">
                      
      <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                  <p class="m-0 d-inline font-weight-bold text-primary">Profil Saya</p>
                  <a href="#" class="float-right fs-14 text-warning">Edit password</a>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-sm table-hover fs-14 c-black">
                            <tr class="border-bottom">
                              <div class="text-center">
                                <img src="/img/profil.png" class="mb-3 rounded-circle" alt="" style="width: 100px;">
                              </div>
                            </tr>
                            <tr class="border-bottom">
                              <td>Nama</td>
                              <td style="width: 1px;">:</td>
                              <td>{{ $user->name }}</td>
                            </tr>
                            <tr class="border-bottom">
                              <td>Level</td>
                              <td style="width: 1px;">:</td>
                              <td class="text-capitalize">{{ $user->level }}</td>
                            </tr>
                            <tr class="border-bottom">
                              <td>Telepon</td>
                              <td style="width: 1px;">:</td>
                              <td>{{ $user->telepon }}</td>
                            </tr>
                            <tr class="border-bottom">
                              <td>Username</td>
                              <td style="width: 1px;">:</td>
                              <td>{{ $user->username }}</td>
                            </tr>
                            <tr class="border-bottom">
                              <td>Email</td>
                              <td style="width: 1px;">:</td>
                              <td>{{ $user->email }}</td>
                            </tr>
                            <tr class="border-bottom">
                              <td>Alamat</td>
                              <td style="width: 1px;">:</td>
                                @if ($user->alamat)
                                  <td>
                                      {{ $user->alamat }}
                                  </td>
                                @else
                                  <td class="text-muted fs-italic">
                                    - 
                                  </td>
                                @endif
                            </tr>
                          </table>
                  </div>
              </div>
           
          </div>
      </div>
      <div class="col-md-6">

        <!-- Input XS -->


        <!-- Input MD -->
        <div class="card">
            <div class="card-header">
                <p class="m-0 font-weight-bold text-primary">Edit profil</p>
            </div>
            <div class="card-body input-group-sm fs-14">
                <label for="namakelas" class="text-dark mb-1">Nama</label>
                <input type="text" value="{{ old('name', $user->name) }}" name="namakelas" id="namakelas" class="text-black form form-control mb-3 mt-0" placeholder="Maman Sudirman, S.T">
                <label for="namakelas" class="text-dark mb-1">Username</label>
                <input type="text" value="{{ old('username', $user->username) }}" name="namakelas" id="namakelas" class="text-black form form-control mb-3 mt-0" placeholder="mamanracing">
                <label for="namakelas" class="text-dark mb-1">Password</label>
                <input type="text" name="namakelas" id="namakelas" class="text-black form form-control mb-3 mt-0" placeholder="Masukkan password baru">
                <label for="namakelas" class="text-dark mb-1">Konfirmasi Password</label>
                <input type="text" name="namakelas" id="namakelas" class="text-black form form-control mb-3 mt-0" placeholder="Masukkan konfirmasi password.">
                <button class="btn btn-sm btn-primary float-right">Simpan</button>
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
