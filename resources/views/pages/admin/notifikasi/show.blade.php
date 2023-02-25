@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold poppins text-xs-center">
        <a href="{{ route('admin.notifikasi.index') }}" class="btn btn-sm btn-outline-dark me-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi fw-bold bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
        </a>
        Notifikasi Saya
    </h5>

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


                    <div class="text-end text-secondary d-inline float-right fs-14">
                        {{ $notifikasi->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="card-body fs-14">
                    @if ($notifikasi->tipe == 'sukses')
                        <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                        </div>
                    @elseif ($notifikasi->tipe == 'info')
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    @elseif ($notifikasi->tipe == 'peringatan')
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    @endif

                    <p class="mt-2">
                        {!! $notifikasi->pesan !!}
                    </p>
                    @if ($notifikasi->dibaca == false)
                        <form action="{{ route('admin.notifikasi.telahdibaca', $notifikasi) }}" method="POST"
                            class="d-inline">
                            @method('PUT')
                            @csrf

                            <input type="hidden" name="dibaca" id="" value="1">
                            <input type="hidden" name="untuk" id="" value="satu">

                            <button type="submit" class="btn btn-md btn-primary px-5 rounded-pill w-100">OK</button>
                        </form>
                    @else
                        <a href="/admin/notifikasi"
                            class="btn btn-md btn-primary px-5 rounded-pill w-100">OK</a>
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
