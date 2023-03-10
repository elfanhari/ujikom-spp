@extends('master.siswa.main')

@section('content')
    <h5 class="mb-3 fw-bold text-xs-center poppins">Profil Saya</h5>

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

        <div class="col-md-6 mb-xs-3">
            <div class="card shadow">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-grey">Profil Saya</p>
                    <a href="#editprofile" class="float-right fs-14 text-primary d-md-none">Edit profile</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover fs-14 c-black" >
                            <tr class="border-bottom">
                                <div class="text-center postion-relative">
                                    @if ($userphoto->count() > 0)
                                        <img src="/gallery/{{ $userphoto->first()->url }}"
                                            class="img-profile mb-3 rounded-circle" alt="{{ auth()->user()->name }}"
                                            style="width: 100px; object-fit: cover;">
                                    @else
                                        <img src="/img/profil.png" class="img-profile mb-3 rounded-circle"
                                            alt="{{ auth()->user()->name }}" style="width: 100px;">
                                    @endif

                                    <form action="{{ route('photo-siswa.edit', auth()->user()->id) }}" method="GET"
                                        class="d-inline">
                                        @csrf
                                        <button class="position-absolute btn ms-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                            <input type="hidden" name="redirect" id="redirect" value="{{ $redirect }}">
                                            <input type="hidden" name="name" id="name" value="saya">
                                        </button>
                                    </form>
                                </div>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Nama</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Kelas</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $user->kelas->name }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">NISN</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $user->nisn }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">NIS</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $user->nis }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Jenis Kelamin</td>
                                <td style="width: 1px;">:</td>
                                <td class="text-capitalize">{{ $user->jk }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Alamat</td>
                                <td style="width: 1px;">:</td>
                                @if ($user->alamat)
                                    <td>
                                        {{ $user->alamat }}
                                    </td>
                                @else
                                    <td class="text-muted fs-italic">
                                        -
                                    </td>
                                @endif
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Telepon</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $user->telepon }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Email</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Username</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="fw-bold">Level</td>
                                <td style="width: 1px;">:</td>
                                <td class="text-uppercase">{{ $user->level }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6">

            <!-- Input XS -->


            <!-- Input MD -->
            <div class="card shadow" id="editprofile">
                <div class="card-header">
                    <p class="m-0 font-weight-bold text-grey d-inline">Edit profil</p>
                    <a href="{{ route('password-siswa.edit') }}" class="float-right fs-14 text-primary">Edit password</a>
                </div>
                <div class="card-body input-group-sm fs-14">

                    <form action="{{ route('update-siswa.profile') }}" method="post">
                        @method('PUT')
                        @csrf
                    
                      @include('pages.siswa.profile._editprofile')

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
    </div>

    <script>
        var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
        var collapseList = collapseElementList.map(function(collapseEl) {
            return new bootstrap.Collapse(collapseEl)
        })
    </script>
@endsection
