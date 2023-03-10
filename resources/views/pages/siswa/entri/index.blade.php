@extends('master.siswa.main')

@section('content')
<h5 class="mb-3 fw-bold text-xs-center poppins">Entri Pembayaran</h5>

    @include('pages.siswa.entri._petunjukpengisian')

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
             {{ session('info') }}
        </div>
    @endif

    @if (session()->has('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @include('_failed')
             {!! session('gagal') !!}
        </div>
    @endif

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <a class="text-info float-right d-inline" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                    aria-controls="offcanvasTop">Petunjuk pengisian</a>
                </div>
                <div class="fs-14 card-body input-group-sm">

                    <form action="{{ route('entri.store') }}" method="POST" class="input-group-sm fs-14" enctype="multipart/form-data" accept="image/*">

                        @csrf
                        @include('pages.siswa.entri._addform')

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
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <p class="m-0 d-inline text-xs-center font-weight-bold text-grey">History Pembayaran Saya</p>
                </div>
                <div class="card-body">
                    @if ($historysiswa->where('status', 'sukses')->count() < 1)
                        <small> <b> {{ $siswa->name }} </b> Belum memiliki riwayat pembayaran.</small>
                    @else
                        <div class="table-responsive">
                            <table class="table table-sm table-hover fs-14 c-black">
                                <tr class="border-bottom bg-dark text-white">
                                    <td>#</td>
                                    <td>Tanggal</td>
                                    <td>Pembayaran untuk</td>
                                    <td class="d-xs-none">Nominal bayar</td>
                                </tr>
                                @foreach ($historysiswa->where('status', 'sukses') as $tampilkan)
                                    <tr class="border-bottom">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d-m-Y', strtotime($tampilkan->tanggalbayar)) }}</td>
                                        <td>{{ $tampilkan->bulanbayar->name }} - {{ $tampilkan->tahunbayar }}</td>
                                        <td class="d-xs-none">Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endif
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
