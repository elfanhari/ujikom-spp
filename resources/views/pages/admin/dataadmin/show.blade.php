@extends('master.admin.main')

@section('content')
<h5 class="mb-3 fw-bold poppins">
    <button class="btn btn-sm btn-link p-0 me-2" onclick="history.back()">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
            class="bi fw-bold bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg>
    </button> Data Admin
</h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-grey">Detail Admin</p>
                    <a href="{{ route('admin.edit', $admin) }}" class="float-right">Edit profil</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover fs-14 c-black" >
                            <tr class="border-bottom">
                                <div class="text-center postion-relative">
                                    @if ($userphoto->count() > 0)
                                        <img src="/gallery/{{ $userphoto->first()->url }}"
                                            class="img-profile mb-3 rounded-circle" alt="{{ $admin->name }}"
                                            style="width: 100px; height: auto; overflow: hidden;">
                                    @else
                                        <img src="/img/profil.png" class="img-profile mb-3 rounded-circle"
                                            alt="{{ $admin->name }}" style="width: 100px;">
                                    @endif

                                    <form action="{{ route('photo-user.edit', $admin->id) }}" method="GET"
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
                                            <input type="hidden" name="redirect" id="redirect"
                                                value="{{ $redirect }}">
                                              <input type="hidden" name="name" id="name" value="{{ $admin->name }}">
                                        </button>
                                    </form>
                                </div>
                            </tr>
                            <tr class="border-bottom">
                                <td>Nama admin</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $admin->name }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>Telepon</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $admin->telepon }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>Email</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $admin->email }}</td>
                            </tr>
                            <tr class="border-bottom">
                                <td>Username</td>
                                <td style="width: 1px;">:</td>
                                <td>{{ $admin->username }}</td>
                            </tr>
                        </table>
                    </div>
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
