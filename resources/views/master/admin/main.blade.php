@php
use App\Models\Notifikasi;    

$notifikasi = Notifikasi::where('penerima_id', null)->limit(3)->latest()->get();
$notifikasiBelumDibaca = Notifikasi::where('penerima_id', null)->where('dibaca', false)->get();

@endphp

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPP - SMK REKAYASA</title>

    <!-- Custom fonts for this template-->
    <link href="/sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    
    <!-- Custom styles for this template-->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/my-css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="/my-css/select2.css" rel="stylesheet">
    <link href="/extensions/simple-datatables/style.css" rel="stylesheet">
    <link href="/extensions/simple-datatables.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/logo-smk-rekayasa.png" class="rounded-circle" type="image/x-icon">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@200;500;700&family=Poppins:wght@300;400;500;700;800&display=swap');
    </style>

</head>

<body id="page-top" style="font-family: 'Mulish', sans-serif;">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('partials.admin.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 sticky-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    
                    <div class="d-xs-none poppins text-center">
                        <b>Aplikasi Pembayaran SPP</b> -  SMK REKAYASA
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                @if ($notifikasiBelumDibaca->count() > 0)
                                    <span class="badge badge-danger badge-counter">
                                        {{ $notifikasiBelumDibaca->count() }}
                                    </span>
                                @endif
                            </a>
                            <!-- Dropdown - Alerts -->

                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifikasi
                                </h6>

                                @foreach ($notifikasi as $tampilkan)
                                    @if ($tampilkan->dibaca == false)
                                        <a class="dropdown-item d-flex align-items-center bg-grey"
                                            href="{{ route('admin.notifikasi.show', $tampilkan) }}">
                                            <div class="mr-3 fw-bold">

                                                @if ($tampilkan->tipe == 'sukses')
                                                    <div class="icon-circle bg-success position-relative">
                                                        <i class="fas fa-donate text-white"></i>
                                                        <span
                                                            class="position-absolute top-0 start-100 translate-middle p-2 bg-warning border border-light rounded-circle">
                                                            <span class="visually-hidden">New alerts</span>
                                                        </span>
                                                    </div>
                                                @elseif ($tampilkan->tipe == 'info')
                                                    <div class="icon-circle bg-primary position-relative">
                                                        <i class="fas fa-file-alt text-white"></i>
                                                        <span
                                                            class="position-absolute top-0 start-100 translate-middle p-2 bg-warning border border-light rounded-circle">
                                                            <span class="visually-hidden">New alerts</span>
                                                        </span>
                                                    </div>
                                                @elseif ($tampilkan->tipe == 'peringatan')
                                                    <div class="icon-circle bg-warning position-relative">
                                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                                        <span
                                                            class="position-absolute top-0 start-100 translate-middle p-2 bg-warning border border-light rounded-circle">
                                                            <span class="visually-hidden">New alerts</span>
                                                        </span>
                                                    </div>
                                                @endif

                                            </div>
                                            <div>
                                                <div class="small text-gray-500">
                                                    {{ $tampilkan->created_at->diffForHumans() }}</div>
                                                <span
                                                    class="font-weight-bold">{{ Str::limit($tampilkan->pesan, 50, '...') }}</span>
                                            </div>
                                        </a>
                                    @else
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="{{ route('admin.notifikasi.show', $tampilkan) }}">
                                            <div class="mr-3">

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
                                                <div class="small text-gray-500">
                                                    {{ $tampilkan->created_at->diffForHumans() }}</div>
                                                {{ Str::limit($tampilkan->pesan, 50, '...') }}
                                            </div>
                                        </a>
                                    @endif
                                @endforeach


                                @if ($notifikasi->count() > 0)
                                    <a class="dropdown-item text-center small text-gray-500" href="/admin/notifikasi">Lihat
                                        semua notifikasi</a>
                                @else
                                    <p class="dropdown-item text-center small text-gray-500 my-0">Anda belum memiliki
                                        notifikasi.</p>
                                @endif

                            </div>

                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            
                                <span
                                    class="mr-2 d-inline d-sm-none text-gray-600 small">
                                    {{ Str::before(auth()->user()->name , ' ')}}
                                </span>

                                <span
                                    class="mr-2 d-xs-none text-gray-600 small">
                                    {{ auth()->user()->name }}
                                </span>

                                @if (auth()->user()->userphoto)
                                    <img class="img-profile rounded-circle"
                                        src="/gallery/{{ auth()->user()->userphoto->url }}" style="max-height: 100px; overflow: hidden;">
                                @else
                                    <img class="img-profile rounded-circle" src="/img/profil.png">
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown" style="width: 50%">
                                <a class="dropdown-item" href="/admin/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid c-black position-relative">

                    {{-- Content --}}
                    @yield('content')
                
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright 2023 &copy; Elfan - SPP</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    {{-- Modal Petunjuk Aksi --}}
    <div class="modal fade text-black" id="petunjukAksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Petunjuk Aksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body fs-xs-14">
                    @include('_crudaction')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title poppins fw-semibold text-black" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin untuk keluar dari aplikasi?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary" href="login.html">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/bootstrap/js/popper.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/my-js/select2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#penerima_id').select1();
        });
    </script>

    <script type="text/javascript">
        /* Tanpa Rupiah */
        var tanpa_rupiah = document.getElementById('tanpa_rupiah');
        tanpa_rupiah.addEventListener('keyup', function(e) {
            tanpa_rupiah.value = formatRupiah(this.value);
        });

        /* Dengan Rupiah */
        var dengan_rupiah = document.getElementById('dengan_rupiah');
        dengan_rupiah.addEventListener('keyup', function(e) {
            dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>

    <!-- Core plugin JavaScript-->
    <script src="/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/sb-admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/sb-admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/sb-admin/js/demo/chart-area-demo.js"></script>
    <script src="/sb-admin/js/demo/chart-pie-demo.js"></script>

    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>

    <script>
        var exampleEl = document.getElementById('example')
        var popover = new bootstrap.Popover(exampleEl, options)
    </script>

    <script>
        var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
            trigger: 'focus'
        })
    </script>

    <script src="/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/extensions/simple-datatables.js"></script>

</body>

</html>
