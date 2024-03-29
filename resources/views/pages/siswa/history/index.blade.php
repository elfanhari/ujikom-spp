@extends('master.siswa.main')

@section('content')
    <h5 class="mb-3 fw-bold poppins text-xs-center">
        Riwayat Transaksi
    </h5>

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

    <div class="row mb-3">
        <div class="col-md-6">

            @if ($pembayaran->count() < 1)
            <div class="text-xs-center">
                Anda belum mempunyai riwayat pembayaran.
            </div>
            @else
                @foreach ($pembayaran as $tampilkan)
                    <a href="{{ route('riwayat.show', $tampilkan) }}" class="card shadow mb-2 text-decoration-none text-black">
                        <div class="card-body">
                            <div class=" justify-content-between">
                                
                                @if ($tampilkan->status == 'diproses')
                                    <span class="badge rounded-pill px-2 bg-warning">{{ strtoupper($tampilkan->status) }}</span>
                                @elseif ($tampilkan->status == 'sukses')
                                    <span class="badge rounded-pill px-2 bg-success">{{ strtoupper($tampilkan->status) }}</span>
                                @elseif ($tampilkan->status == 'gagal')
                                    <span class="badge rounded-pill px-2 bg-danger">{{ strtoupper($tampilkan->status) }}</span>
                                @endif
                                <div class="float-right">
                                    <h5 class="mb-0">
                                        <b>Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</b>
                                    </h5>
                                </div>
                            </div>
                            <small class="text-secondary">{{ $tampilkan->created_at->diffForHumans() }}</small>
                            <div class="fs-14 d-block">Pembayaran untuk <p class="text-primary d-inline mb-0">
                                    {{ $tampilkan->bulanbayar->name }} - {{ $tampilkan->tahunbayar }}</p>
                            </div>
                            <div class="fs-14 fs-italic">
                                Kode Transaksi : <b class="text-uppercase">{{ $tampilkan->identifier }}</b>
                            </div>


                        </div>
                    </a>
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
