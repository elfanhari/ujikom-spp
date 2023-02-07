@extends('master.siswa.main')

@section('content')
    
<div class="d-flex justify-content-between align-items-center gap-3">
  <h4 class="title-section-content">History</h4>
  {{-- <a href="#" class="btn-link">View All Shoes</a> --}}
</div>

@if ($transaksi->count() < 1)
  Anda belum mempunyai transaksi.
@else
<div class="list-group row col-md-6">
  @foreach ($transaksi as $tampilkan)
      <div href="#" class="list-group-item list-group-item-action" aria-current="true">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1"><b>SPP</b></h5>
          <p class="mb-1"><b>Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</b> | <a href="" class="text-decoration-none">Detail</a></p>
        </div>
        <small>{{ $tampilkan->created_at->diffForHumans() }}</small>
      </div>
      @endforeach
    </div>
@endif

@endsection