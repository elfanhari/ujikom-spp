@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold text-xs-center poppins">Data abc</h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row mb-3">
      <div class="col-12 d-xs-none">

          <!-- Input XS -->


          <!-- Input MD -->
          <div class="card fs-14">
              <div class="card-header">
                  <p class="m-0 font-weight-bold text-primary">Generate Laporan</p>
              </div>
              <div class="card-body ">
                  <div class="row">
                    <div class="col-md-6 input-group-sm">
                      <label for="daritanggal" class="mb-1">Dari Tanggal</label>
                      <input type="date" name="daritanggal" id="daritanggal" class="form form-control mb-3 mt-0" placeholder="daritanggal">
                    </div>
                    <div class="col-md-6 input-group-sm">
                      <label for="sampaitanggal" class="mb-1">Sampai Tanggal</label>
                      <input type="date" name="sampaitanggal" id="sampaitanggal" class="form form-control mb-3 mt-0" placeholder="sampaitanggal">
                    </div>
                  </div>
                  <button class="btn btn-sm btn-primary float-right">Generate</button>
              </div>
          </div>
      </div>
      <div class="col-12 fs">
          <div class="card mt-4">
              <div class="card-header">
                  <p class="m-0 d-inline font-weight-bold text-primary">Laporan Transaksi</p>
                  <button class="btn float-right btn btn-sm btn-outline-success">
                    Cetak Laporan
                  </button>
              </div>
              <div class="card-body">
                 
                <div class="table-responsive">
                  <table class="table table-sm table-hover fs-14 c-black">
                      <thead>
                        <tr class="bg-dark text-white">
                          <th scope="col">#</th>
                          <th scope="col">Waktu Transaksi</th>
                          <th scope="col">Nama Petugas</th>
                          <th scope="col">Nama Siswa</th>
                          <th scope="col">Kelas</th>
                          <th scope="col">Tanggal Bayar</th>
                          <th scope="col">Tahun SPP</th>
                          <th scope="col">Jumlah Bayar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="border-bottom">
                          <td>1</td>
                          <td>26/01/2023 15:01:29</td>
                          <td>Omen Suparman, S.T</td>
                          <td>Elfan Hari Saputra</td>
                          <td>XII RPL 1</td>
                          <td>26/01/2023</td>
                          <td>2023</td>
                          <td>Rp200.000</td>
                        </tr>
                        <tr class="border-bottom">
                          <td>2</td>
                          <td>26/01/2023 15:01:29</td>
                          <td>Dian, S.T</td>
                          <td>Teguh Afriansyah</td>
                          <td>XI RPL 1</td>
                          <td>26/01/2023</td>
                          <td>2023</td>
                          <td>Rp200.000</td>
                        </tr>
                        <tr class="border-bottom">
                          <td>3</td>
                          <td>26/01/2023 15:01:29</td>
                          <td>Yasrifan, S.Kom</td>
                          <td>Delista Anggraini</td>
                          <td>XI AKL 3</td>
                          <td>26/01/2023</td>
                          <td>2023</td>
                          <td>Rp200.000</td>
                        </tr>
                        <tr class="border-bottom">
                          <td>4</td>
                          <td>26/01/2023 15:01:29</td>
                          <td>Deni Wungkul, S.Kom</td>
                          <td>Alfitka Haerul Kurniawan</td>
                          <td>XII TBSM 1</td>
                          <td>26/01/2023</td>
                          <td>2023</td>
                          <td>Rp200.000</td>
                        </tr>
                        <tr class="border-bottom">
                          <td>5</td>
                          <td>26/01/2023 15:01:29</td>
                          <td>Dian, S.T</td>
                          <td>Annisa</td>
                          <td>X RPL 1</td>
                          <td>26/01/2023</td>
                          <td>2023</td>
                          <td>Rp200.000</td>
                        </tr>
                        <tr class="border-bottom">
                          <td>6</td>
                          <td>26/01/2023 15:01:29</td>
                          <td>Yulia, S.Pd</td>
                          <td>Syifa Maharani</td>
                          <td>XII AKL 1</td>
                          <td>26/01/2023</td>
                          <td>2023</td>
                          <td>Rp200.000</td>
                        </tr>
                        <tr class="border-bottom">
                          <td>7</td>
                          <td>26/01/2023 15:01:29</td>
                          <td>Omen Suparman, S.T</td>
                          <td>Aliefia Rohani</td>
                          <td>X AKL 2</td>
                          <td>26/01/2023</td>
                          <td>2023</td>
                          <td>Rp200.000</td>
                        </tr>
                      </tbody>
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
