@extends('master.admin.main')

@section('content')

    <h5 class="mb-3 fw-bold text-xs-center poppins">Data Siswa</h5>

    <div class="row">
      <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <p class="m-0 d-inline font-weight-bold text-primary">Detail Siswa</p>
                <a href="{{ route('siswa.edit', $siswa) }}" class="float-right">Edit profil</a>
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
                            <td>Nama Siswa</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $siswa->name }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>NISN</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $siswa->nisn }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>NIS</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $siswa->nis }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Jenis Kelamin</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $siswa->jk == 'laki-laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Kelas</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $siswa->kelas->name }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Alamat</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $siswa->alamat }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Telepon</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $siswa->telepon }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Email</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $siswa->email }}</td>
                          </tr>
                          <tr class="border-bottom">
                            <td>Tahun SPP</td>
                            <td style="width: 1px;">:</td>
                            <td>{{ $siswa->spp->tahun }}</td>
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
