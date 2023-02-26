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

            <div class="card shadow">

                <div class="card-body">

                    <ul class="nav nav-tabs d-flex justify-content-start align-items-center" id="tableTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                                type="button" role="tab" aria-controls="all" aria-selected="true">Transaksi
                                saya</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="success-tab" data-bs-toggle="tab" data-bs-target="#success"
                                type="button" role="tab" aria-controls="success" aria-selected="false">Semua</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="mandiri-tab" data-bs-toggle="tab" data-bs-target="#mandiri"
                                type="button" role="tab" aria-controls="mandiri" aria-selected="false">Mandiri</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="tableTabContent">

                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                            <div class="mt-3">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-hover fs-14 transaction-table c-black active"
                                    id="table1">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th scope="col">#</th>
                                            <th scope="col">Waktu Transaksi</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Pembayaran untuk</th>
                                            <th scope="col">Nama Petugas</th>
                                            <th scope="col">Status</th>
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
                                                <td>{{ $tampilkan->bulanbayar->name }} - {{ $tampilkan->tahunbayar }}</td>
                                                <td>{{ $tampilkan->jenistransaksi == 'petugas' ? $tampilkan->userPetugas->name : '-' }}
                                                </td>
                                                <td>
                                                    @if ($tampilkan->status == 'diproses')
                                                        <span
                                                            class="badge bg-warning">{{ strtoupper($tampilkan->status) }}</span>
                                                    @elseif ($tampilkan->status == 'sukses')
                                                        <span
                                                            class="badge bg-success">{{ strtoupper($tampilkan->status) }}</span>
                                                    @elseif ($tampilkan->status == 'gagal')
                                                        <span
                                                            class="badge bg-danger">{{ strtoupper($tampilkan->status) }}</span>
                                                    @endif
                                                </td>
                                                <td class="">


                                                    <a href="{{ route('pembayaran.show', $tampilkan->identifier) }}"
                                                        type="button" class="btn btn-success pb-1 pt-0 px-2">
                                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-list-columns-reverse" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M0 .5A.5.5 0 0 1 .5 0h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 .5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10A.5.5 0 0 1 4 .5Zm-4 2A.5.5 0 0 1 .5 2h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 4h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 6h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 8h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Z" />
                                                        </svg>
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
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-hover fs-14 transaction-table c-black" id="table2">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th scope="col">#</th>
                                            <th scope="col">Waktu Transaksi</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Pembayaran untuk</th>
                                            <th scope="col">Nama Petugas</th>
                                            <th scope="col">Status</th>
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
                                                <td>{{ $tampilkan->bulanbayar->name }} - {{ $tampilkan->tahunbayar }}</td>
                                                <td>{{ $tampilkan->jenistransaksi == 'petugas' ? $tampilkan->userPetugas->name : '-' }}
                                                </td>
                                                <td>
                                                    @if ($tampilkan->status == 'diproses')
                                                        <span
                                                            class="badge bg-warning">{{ strtoupper($tampilkan->status) }}</span>
                                                    @elseif ($tampilkan->status == 'sukses')
                                                        <span
                                                            class="badge bg-success">{{ strtoupper($tampilkan->status) }}</span>
                                                    @elseif ($tampilkan->status == 'gagal')
                                                        <span
                                                            class="badge bg-danger">{{ strtoupper($tampilkan->status) }}</span>
                                                    @endif
                                                </td>
                                                <td class="">

                                                    <a href="{{ route('pembayaran.show', $tampilkan->identifier) }}"
                                                        type="button" class="btn btn-success btn-sm pb-1 pt-1 px-2">
                                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-list-columns-reverse" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M0 .5A.5.5 0 0 1 .5 0h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 .5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10A.5.5 0 0 1 4 .5Zm-4 2A.5.5 0 0 1 .5 2h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 4h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 6h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 8h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Z" />
                                                        </svg>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="mandiri" role="tabpanel" aria-labelledby="mandiri-tab">
                            <div class="mt-3">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-hover fs-14 transaction-table c-black" id="table3">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th scope="col">#</th>
                                            <th scope="col">Waktu Transaksi</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Pembayaran untuk</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mandiri as $tampilkan)
                                            <tr class="border-bottom">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $tampilkan->created_at->diffForHumans() }}</td>
                                                <td>{{ $tampilkan->userSiswa->name }}</td>
                                                <td>{{ $tampilkan->userSiswa->kelas->name }}</td>
                                                <td>{{ $tampilkan->bulanbayar->name }} - {{ $tampilkan->tahunbayar }}</td>
                                                <td>
                                                    @if ($tampilkan->status == 'diproses')
                                                        <span
                                                            class="badge bg-warning">{{ strtoupper($tampilkan->status) }}</span>
                                                    @elseif ($tampilkan->status == 'sukses')
                                                        <span
                                                            class="badge bg-success">{{ strtoupper($tampilkan->status) }}</span>
                                                    @elseif ($tampilkan->status == 'gagal')
                                                        <span
                                                            class="badge bg-danger">{{ strtoupper($tampilkan->status) }}</span>
                                                    @endif
                                                </td>
                                                <td class="">

                                                    <a href="{{ route('pembayaran.show', $tampilkan->identifier) }}"
                                                        type="button" class="btn btn-success btn-sm pb-1 pt-1 px-2">
                                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-list-columns-reverse" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M0 .5A.5.5 0 0 1 .5 0h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 .5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10A.5.5 0 0 1 4 .5Zm-4 2A.5.5 0 0 1 .5 2h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 4h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 6h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 8h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Z" />
                                                        </svg>
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
