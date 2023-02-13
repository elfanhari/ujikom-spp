@extends('master.siswa.main')

@section('content')
    <h5 class="mb-3 fw-bold poppins text-xs-center">
        Riwayat Transaksi
    </h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-md-6">

            @if ($transaksi->count() < 1)
                Anda belum mempunyai transaksi.
            @else
                @foreach ($transaksi as $tampilkan)
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="fw-bold">SPP</h4>
                                <div class="">
                                    <h4 class="mb-0">
                                        <b>Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</b>
                                    </h4>
                                </div>    
                            </div>
                            <small class="text-secondary">{{ $tampilkan->created_at->diffForHumans() }}</small>
                            <div class="fs-14 mt-2 d-block">Pembayaran untuk <p class="text-primary d-inline mb-0">{{ $tampilkan->bulanbayar->name }} - {{ $tampilkan->tahunbayar }}</p> </div>
                        </div>
                    </div>
                @endforeach

            @endif
        </div>
    </div>

    <script>
        var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
        var collapseList = collapseElementList.map(function(collapseEl) {
            return new bootstrap.Collapse(collapseEl)
        })
    </script>
@endsection
