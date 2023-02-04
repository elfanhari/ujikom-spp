@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold text-xs-center poppins">Entri Pembayaran</h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row">
      <div class="col-md-5 d-xs">

          <!-- Input XS -->


          <!-- Input MD -->
          <div class="card mb-4">
              <div class="card-header">
                  <p class="m-0 font-weight-bold text-primary">Input Pembayaran</p>
              </div>
              <div class="fs-14 card-body input-group-sm">
                  <form action="{{ route('pembayaran.store') }}" method="POST" class="input-group-sm">
                  
                  @csrf
                    @include('pages.admin.entripembayaran._addform')

                    <button class="btn btn-sm mt-3 btn-primary float-right" type="submit">Simpan</button>
                  </form>
              </div>
          </div>
      </div>
      <div class="col-md-7">
          <div class="card">
              <div class="card-header">
                  <p class="m-0 d-inline font-weight-bold text-primary">Detail Siswa</p>
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
                              <td>NISN</td>
                              <td style="width: 1px;">:</td>
                              <td>3059010384</td>
                            </tr>
                            <tr class="border-bottom">
                              <td>NIS</td>
                              <td style="width: 1px;">:</td>
                              <td>10.2021.334</td>
                            </tr>
                            <tr class="border-bottom">
                              <td>Nama Siswa</td>
                              <td style="width: 1px;">:</td>
                              <td>Elfan Hari Saputra</td>
                            </tr>
                            <tr class="border-bottom">
                              <td>Kelas</td>
                              <td style="width: 1px;">:</td>
                              <td>XII RPL 1</td>
                            </tr>
                            <tr class="border-bottom">
                              <td>Alamat</td>
                              <td style="width: 1px;">:</td>
                              <td>Jl. Julaeni Langensari, Banjar</td>
                            </tr>
                            <tr class="border-bottom">
                              <td>Telepon</td>
                              <td style="width: 1px;">:</td>
                              <td>081234567890</td>
                            </tr>
                            <tr class="border-bottom">
                              <td>Tahun SPP</td>
                              <td style="width: 1px;">:</td>
                              <td>2023</td>
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
