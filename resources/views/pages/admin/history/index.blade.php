@extends('master.admin.main')

@section('content')
    <h5 class="mb-3 fw-bold text-xs-center poppins">History Pembayaran</h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row mb-3">


        <div class="col fs">

            <div class="card">

                <div class="card-header">
                    <p class="m-0 d-inline font-weight-bold text-primary">History Pembayaran</p>
                </div>
                <div class="card-body">

                    <ul class="nav nav-tabs d-flex justify-content-start align-items-center" id="tableTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                                type="button" role="tab" aria-controls="all" aria-selected="true">Transaksi saya</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="success-tab" data-bs-toggle="tab" data-bs-target="#success"
                                type="button" role="tab" aria-controls="success" aria-selected="false">Semua</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="tableTabContent">

                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <div class="mt-3">
                                    <p class="d-inline text-warning" style="font-size: 16px;">NB: History pembayaran diurutkan
                                        berdasarkan transaksi terbaru!</p>
                                    <form
                                        class="float-right d-sm-inline-block form-inline input-group-sm mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                        <div class="input-group mb-3 mt-0">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover fs-14 transaction-table c-black active"
                                        id="table-all">
                                        <thead>
                                            <tr class="bg-dark text-white">
                                                <th scope="col">#</th>
                                                <th scope="col">Waktu Transaksi</th>
                                                <th scope="col">Nama Siswa</th>
                                                <th scope="col">Kelas</th>
                                                {{-- <th scope="col">Tanggal Bayar</th> --}}
                                                <th scope="col">Bulan Dibayar</th>
                                                <th scope="col">Tahun Dibayar</th>
                                                <th scope="col">Jumlah Bayar</th>
                                                <th scope="col">Nama Petugas</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($my as $tampilkan)
                                            <tr class="border-bottom">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $tampilkan->created_at->diffForHumans() }}</td>
                                                <td>{{ $tampilkan->userSiswa->name }}</td>
                                                <td>{{ $tampilkan->userSiswa->kelas->name }}</td>
                                                 {{-- <td> {{ date('d-m-Y', strtotime($tampilkan->tanggalbayar)) }}</td> --}}
                                                 <td>{{ $tampilkan->bulanbayar->name }}</td>
                                                 <td>{{ $tampilkan->tahunbayar }}</td>
                                                <td>Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</td>
                                                <td>{{ $tampilkan->userPetugas->name }}</td>
                                                <td class="">

                                                    <a href="{{ route('pembayaran.show', $tampilkan->id) }}"
                                                        type="button" class="btn btn-success btn-sm pb-1 pt-1 px-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-eye-fill"
                                                            viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                            <path
                                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                        </svg> Detail
                                                    </a>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="success" role="tabpanel" aria-labelledby="success-tab">
                                <div class="mt-3">
                                    <p class="d-inline text-warning" style="font-size: 16px;">NB: History pembayaran diurutkan
                                        berdasarkan transaksi terbaru!</p>
                                    <form
                                        class="float-right d-sm-inline-block form-inline input-group-sm mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                        <div class="input-group mb-3 mt-0">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover fs-14 transaction-table c-black"
                                        id="table-success">
                                        <thead>
                                            <tr class="bg-dark text-white">
                                                <th scope="col">#</th>
                                                <th scope="col">Waktu Transaksi</th>
                                                <th scope="col">Nama Siswa</th>
                                                <th scope="col">Kelas</th>
                                                {{-- <th scope="col">Tanggal Bayar</th> --}}
                                                <th scope="col">Bulan Dibayar</th>
                                                <th scope="col">Tahun Dibayar</th>
                                                <th scope="col">Jumlah Bayar</th>
                                                <th scope="col">Nama Petugas</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all as $tampilkan)
                                                <tr class="border-bottom">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $tampilkan->created_at->diffForHumans() }}</td>
                                                    <td>{{ $tampilkan->userSiswa->name }}</td>
                                                    <td>{{ $tampilkan->userSiswa->kelas->name }}</td>
                                                     {{-- <td> {{ date('d-m-Y', strtotime($tampilkan->tanggalbayar)) }}</td> --}}
                                                     <td>{{ $tampilkan->bulanbayar->name }}</td>
                                                     <td>{{ $tampilkan->tahunbayar }}</td>
                                                    <td>Rp{{ number_format($tampilkan->jumlahbayar, 0, '.', '.') }}</td>
                                                    <td>{{ $tampilkan->userPetugas->name }}</td>
                                                    <td class="">

                                                        <a href="{{ route('pembayaran.show', $tampilkan->id) }}"
                                                            type="button" class="btn btn-success btn-sm pb-1 pt-1 px-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-eye-fill"
                                                                viewBox="0 0 16 16">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                <path
                                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                            </svg> Detail
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

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
