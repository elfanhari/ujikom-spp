@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold poppins text-xs-center">
        Notifikasi Saya
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
        <div class="col-md-7 mb-3 text-xs-center">
            <button class="mt-2 btn btn-warning btn-sm btn-icon-split p-0 fs-14" data-bs-toggle="modal"
                data-bs-target="#kirimNotifikasi">
                <span class="icon text-white-50 m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-send-plus-fill" viewBox="0 0 16 16">
                        <path
                            d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                        <path
                            d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                    </svg>
                </span>
                <span class="text">Kirim Notifikasi</span>
            </button>
        </div>
        <div class="col-md-6">
            <div class="my-2">

                @if ($notifikasi->count() > 0)
                    <form action="{{ route('admin.notifikasi.telahdibaca', $notifikasi[0]) }}" method="post"
                        class="d-inline ">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="untuk" id="untuk" value="semua">
                        <button class="btn fs-14 btn-link d-inline p-0 text-decoration-none" type="submit"> Telah
                            dibaca semua</button>
                    </form>

                    <form action="{{ route('admin.notifikasi.destroy', $notifikasi[0]) }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="untuk" id="untuk" value="semua">
                        <button class="btn fs-14 d-block btn-link p-0 mt-1 text-decoration-none float-end"
                            type="submit">Hapus
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
                            <div class="card shadow mb-2 bg-grey">
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
                                        {!! Str::limit($tampilkan->pesan, 80, '...') !!}</div>

                                    <a href="{{ route('admin.notifikasi.show', $tampilkan) }}"
                                        class="btn btn-sm btn-outline-primary rounded-pill mt-2 px-3">Lihat
                                        detail</a>

                                    <form action="{{ route('admin.notifikasi.destroy', $tampilkan) }}" method="post"
                                        class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="untuk" id="untuk" value="satu">
                                        <button class="btn btn-sm btn-outline-danger rounded-pill mt-2 px-3">Hapus</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-decoration-none">
                            <div class="card shadow mb-2">
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
                                    <a href="{{ route('admin.notifikasi.show', $tampilkan) }}"
                                        class="btn btn-sm btn-outline-primary rounded-pill mt-2 px-3">Lihat
                                        detail</a>

                                    <form action="{{ route('admin.notifikasi.destroy', $tampilkan) }}" method="post"
                                        class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="untuk" id="untuk" value="satu">
                                        <button class="btn btn-sm btn-outline-danger rounded-pill mt-2 px-3">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        {{-- MODAL --}}
        <div class="modal fade" id="kirimNotifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('admin.notifikasi.store') }}" method="POST" class="input-group-sm">
                @csrf

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Kirim Notifikasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="penerima_id" class="mb-1 mt-3 fw-semibold penerima_id">Kirim ke:</label>
                                    <select name="penerima_id" data-width="100%" id="penerima_id"
                                        class="text-black form form-control form-select mt-0  @error('penerima_id') is-invalid @enderror">

                                        @foreach ($siswa as $tampilkan)
                                            <option value="{{ $tampilkan->id }} "
                                                {{ $tampilkan->id == old('penerima_id') ? 'selected' : '' }}>
                                                {{ $tampilkan->name }} - {{ $tampilkan->kelas->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('penerima_id')
                                        <span class="invalid-feedback mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tipe" class="mb-1 mt-3 fw-semibold">Tipe notifikasi:</label>
                                    <select name="tipe" id="tipe"
                                        class="text-black form form-control form-select mt-0  @error('tipe') is-invalid @enderror">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="info" {{ 'info' == old('jk') ? 'selected' : '' }}> Informasi
                                        </option>
                                        <option value="sukses" {{ 'sukses' == old('jk') ? 'selected' : '' }}> Sukses
                                        </option>
                                        <option value="peringatan" {{ 'peringatan' == old('jk') ? 'selected' : '' }}>
                                            Peringatan </option>
                                    </select>
                                </div>
                                @error('tipe')
                                    <span class="invalid-feedback mt-1">{{ $message }}</span>
                                @enderror

                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label fw-bold">Pesan</label>
                                    <textarea name="pesan" class="form-control" id="message-text">{{ old('pesan') }}</textarea>
                                </div>
                                @error('pesan')
                                    <span class="invalid-feedback mt-1">{{ $message }}</span>
                                @enderror
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
    <script>
        var modalToggle = document.getElementById('kirimNotifikasi') // relatedTarget
        kirimNotifikassi.show(modalToggle)
    </script>

    <script>
        var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
        var collapseList = collapseElementList.map(function(collapseEl) {
            return new bootstrap.Collapse(collapseEl)
        })
    </script>
@endsection
