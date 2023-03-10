@extends('master.admin.main')

@section('content')
<h5 class="mb-3 fw-bold poppins">
    <button class="btn btn-sm btn-link p-0 me-2" onclick="history.back()">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
            class="bi fw-bold bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg>
    </button> Detail Log Aktivitas
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

            <div class="card shadow">
                <div class="card-header">

                    <div class="text-end text-secondary d-inline float-right fs-14">
                      {{ Str::before(date('d-m-Y', strtotime($log->created_at)), ' ') }}
                      |
                      {{ Str::after($log->created_at, ' ') }}
                    </div>
                </div>
                <div class="card-body fs-14">
                    
                    @if ($log->user->level == 'siswa')
                      <p class="mt-2">
                        <b>{{ $log->user->name . ' -  ' . $log->user->kelas->name .' (' . strtoupper($log->user->level) . ')' }}</b> {!! $log->aktivitas !!}
                      </p>
                    @else
                      <p class="mt-2">
                        <b>{{ $log->user->name .' (' . strtoupper($log->user->level) . ')' }}</b> {!! $log->aktivitas !!}
                      </p>
                    @endif

                    @php
                          $identifierPembayaran = Str::after($log->aktivitas, 'Kode transaksi: ');
                        @endphp
                        <a href="/admin/pembayaran/{{ $identifierPembayaran }}"
                            class="btn btn-md btn-primary px-5 rounded-pill w-100">Lihat transaksi</a>
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
