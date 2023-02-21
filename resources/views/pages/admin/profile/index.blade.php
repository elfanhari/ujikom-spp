@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold text-xs-center poppins">Profil Saya</h5>

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
                    <p class="m-0 d-inline font-weight-bold text-primary">Profil Saya</p>
                    <a href="{{ route('password-user.edit') }}" class="float-right fs-14 text-warning">Edit password</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover fs-14 c-black" >
                            <tr class="border-bottom">
                                <div class="text-center postion-relative">
                                    @if ($userphoto->count() > 0)
                                        <img src="/gallery/{{ $userphoto->first()->url }}"
                                            class="img-profile mb-3 rounded-circle" alt="{{ auth()->user()->name }}"
                                            style="width: 100px; height: 100px; object-fit: cover;">
                                    @else
                                        <img src="/img/profil.png" class="img-profile mb-3 rounded-circle"
                                            alt="{{ auth()->user()->name }}" style="width: 100px;">
                                    @endif

                                    <form action="{{ route('photo-user.edit', auth()->user()->id) }}" method="GET"
                                        class="d-inline">
                                        @csrf
                                        <button class="position-absolute btn">
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
                                <td>Nama</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>Level</td>
                                <td style="width: 1px;">:</td>
                                <td class="text-capitalize">{{ $user->level }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>Telepon</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $user->telepon }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>Username</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>Email</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>Alamat</td>
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
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6">

            <!-- Input XS -->


            <!-- Input MD -->
            <div class="card">
                <div class="card-header">
                    <p class="m-0 font-weight-bold text-primary">Edit profil</p>
                </div>
                <div class="card-body input-group-sm fs-14">

                    <form action="{{ route('update.profile') }}" method="post">
                        @method('PUT')
                        @csrf
                    
                      @include('pages.admin.profile._editprofile')

                      <button class="btn btn-sm btn-primary float-right">Simpan</button>
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
