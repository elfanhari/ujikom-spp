@extends('master.siswa.main')

@section('content')
    <h5 class="mb-3 fw-bold poppins text-xs-center">
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
            <div class="my-2">
                @if ($notifikasi->count() > 0)
                <form action="{{ route('notifikasi.telahdibaca', $notifikasi[0]) }}" method="post" class="d-inline ">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="untuk" id="untuk" value="semua">
                    <button class="btn fs-14 btn-link p-0 text-decoration-none" type="submit">Tandai semua telah
                        dibaca</button>
                </form>

                <form action="{{ route('notifikasi.destroy', $notifikasi[0]) }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="untuk" id="untuk" value="semua">
                    <button class="btn fs-14 btn-link p-0 text-decoration-none float-right" type="submit">Hapus
                        semua</button>
                </form>
                @endif
            </div>
            @if ($notifikasi->count() < 1)
            <div class="text-xs-center">
                Tidak ada notifikasi kepada anda.
            </div>
            @else
                @foreach ($notifikasi as $tampilkan)
                    @if ($tampilkan->dibaca == false)
                        <div class="text-decoration-none">
                            <div class="card mb-2 bg-grey">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle p-2 bg-warning border border-light rounded-circle">
                                            <span class="visually-hidden">New alerts</span>
                                        </span>
                                        <div class="mb-2">

                                            @if ($tampilkan->tipe == 'sukses')
                                                <div class="icon-circle bg-success">
                                                    <i class="fas fa-donate text-white"></i>
                                                </div>
                                            @elseif ($tampilkan->tipe == 'info')
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-file-alt text-white"></i>
                                                </div>
                                            @elseif ($tampilkan->tipe == 'peringatan')
                                                <div class="icon-circle bg-warning">
                                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                                </div>
                                            @endif

                                        </div>
                                        <div>
                                            <small class="text-secondary">{{ $tampilkan->created_at->diffForHumans() }}
                                            </small>

                                        </div>
                                    </div>
                                    <div class="fs-14 mt-2 d-block text-black">
                                        {{ Str::limit($tampilkan->pesan, 80, '...') }}</div>

                                    <a href="{{ route('notifikasi.show', $tampilkan) }}"
                                        class="btn btn-sm btn-outline-primary rounded-pill mt-2 px-3">Lihat
                                        detail</a>

                                    <form action="{{ route('notifikasi.destroy', $tampilkan) }}" method="post"
                                        class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="untuk" id="untuk" value="satu">
                                        <button class="btn btn-sm btn-outline-danger rounded-pill mt-2 px-3">Hapus</button>
                                    </form>

                                </div>
                            </div>
                        @else
                            <div class="text-decoration-none">
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">

                                            <div class="mb-2">

                                                @if ($tampilkan->tipe == 'sukses')
                                                    <div class="icon-circle bg-success">
                                                        <i class="fas fa-donate text-white"></i>
                                                    </div>
                                                @elseif ($tampilkan->tipe == 'info')
                                                    <div class="icon-circle bg-primary">
                                                        <i class="fas fa-file-alt text-white"></i>
                                                    </div>
                                                @elseif ($tampilkan->tipe == 'peringatan')
                                                    <div class="icon-circle bg-warning">
                                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="">
                                                <small
                                                    class="text-secondary">{{ $tampilkan->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                        <b></b>
                                        <div class="fs-14 mt-2 d-block"> {{ Str::limit($tampilkan->pesan, 80, '...') }}
                                        </div>
                                        <a href="{{ route('notifikasi.show', $tampilkan) }}"
                                            class="btn btn-sm btn-outline-primary rounded-pill mt-2 px-3">Lihat
                                            detail</a>

                                        <form action="{{ route('notifikasi.destroy', $tampilkan) }}" method="post"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="untuk" id="untuk" value="satu">
                                            <button
                                                class="btn btn-sm btn-outline-danger rounded-pill mt-2 px-3">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    @endif
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
