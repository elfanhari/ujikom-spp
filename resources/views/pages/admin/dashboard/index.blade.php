@extends('master.admin.main')

@section('content')

@if (session()->has('info'))
<div class="alert alert-info alert-sm alert-dismissible fade show" role="alert">
    @include('_closebutton')
    <small>  Selamat, anda masuk sebagai <b> {{ session('info') }} </b> </small>
</div>
@endif

<h5 class="mb-3 fw-bold text-xs-center poppins">
    Dashboard 
</h5>
    
    <div class="row">

        @can('petugas')
        <a href="{{ route('pembayaran.index') }}" class="col-xl-3 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-info mb-1">
                                Pembayaran</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $pembayaran->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
          </a>
        @endcan

        @can('admin')
        <a href="{{ route('prodi.index') }}" class="col-xl-3 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-info mb-1">
                                Prodi</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $prodi->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
          </a>
          <a href="{{ route('kelas.index') }}" class="col-xl-3 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-warning mb-1">
                                Kelas</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $kelas->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
          </a>
          <a href="{{ route('siswa.index') }}" class="col-xl-3 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-danger mb-1">
                                Siswa</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $siswa->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
          </a>
          <a href="{{ route('spp.index') }}" class="col-xl-3 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-success mb-1">
                                SPP</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $spp->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
          </a>
          <a href="{{ route('petugas.index') }}" class="col-xl-3 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-danger mb-1">
                                Petugas</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $petugas->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
          </a>
          <a href="{{ route('admin.index') }}" class="col-xl-3 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-success mb-1">
                                Admin</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $admin->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
          </a>

          <a href="{{ route('pembayaran.index') }}" class="col-xl-3 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-info mb-1">
                                Pembayaran</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $pembayaran->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
          </a>

          <a href="" class="col-xl-3 col-md-6 mb-4 text-decoration-none">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-warning mb-1">
                                Laporan</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">2</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
          </a>
        @endcan

    </div>

    <script>
        var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
        var collapseList = collapseElementList.map(function(collapseEl) {
            return new bootstrap.Collapse(collapseEl)
        })
    </script>
@endsection
