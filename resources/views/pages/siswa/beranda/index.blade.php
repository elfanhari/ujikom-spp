@extends('master.siswa.main')

@section('content')
    @if (session()->has('info'))
        <div class="alert alert-info alert-sm alert-dismissible fade show" role="alert">
            @include('_closebutton')
            <small> Selamat, anda masuk sebagai <b> {{ session('info') }} </b> </small>
        </div>
    @endif

    <h5 class="mb-3 fw-bold text-xs-center poppins">Beranda</h5>


    <div class="row">
        <a href="/siswa/riwayat" class="col-xl-3 col-md-6 mb-4 text-decoration-none">
            <div class="card shadow border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-success mb-1">
                                Riwayat Transaksi</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $riwayat }}</div>
                        </div>
                        <div class="col-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="fas text-secondary" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                              </svg>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="/siswa/notifikasi" class="col-xl-3 col-md-6 mb-4 text-decoration-none">
            <div class="card shadow border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-info mb-1">
                                Notifikasi</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $notifikasi }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bell fa-2x text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="row">
        <h6 class="poppins my-3 fw-bold text-xs-center">Mungkin Kamu Belum Tahu</h6>
        <div class="col-md-6">
            <div class="accordion mb-5" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <b>Apa itu SPP?</b>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="fw-light"> <b> SPP adalah </b> sumbangan pembinaan pendidikan yang bayarkan oleh
                                siswa di sekolah-sekolah. Tujuan SPP adalah agar sekolah dapat membiayai keperluan
                                penyelenggaraan pendidikan sehingga kegiatan belajar mengajar dapat berjalan dengan
                                baik. SPP umumnya dibayarkan setiap bulan oleh siswa.</div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <b> Bagaimana cara bayar SPP?</b>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ol>
                                <li>Kunjungi situs web resmi institusi pendidikan yang Anda ikuti dan cari informasi tentang
                                    cara membayar SPP secara online.</li>
                                <li> Pilih metode pembayaran yang disediakan oleh institusi pendidikan. Umumnya, institusi
                                    pendidikan menyediakan beberapa opsi pembayaran, seperti transfer bank, kartu kredit
                                    atau debit, virtual account, dan e-wallet.</li>
                                <li> Jika Anda memilih transfer bank, pastikan Anda mengetahui nomor rekening dan nama bank
                                    yang akan dituju. Setelah itu, lakukan transfer sesuai dengan instruksi yang diberikan.
                                </li>
                                <li> Jika Anda memilih pembayaran dengan kartu kredit atau debit, pastikan Anda mengetahui
                                    jenis kartu yang diterima, seperti Visa, Mastercard, atau jenis kartu lainnya. Setelah
                                    itu, masukkan nomor kartu dan data lainnya yang diminta.</li>
                                <li> Jika institusi pendidikan menyediakan opsi pembayaran melalui virtual account atau
                                    e-wallet, pastikan Anda memiliki akun di provider tersebut dan pastikan saldo Anda
                                    mencukupi untuk membayar SPP.</li>
                                <li> Setelah selesai melakukan pembayaran, pastikan untuk menyimpan bukti pembayaran dan
                                    verifikasi pembayaran Anda di situs web institusi pendidikan. Hal ini penting untuk
                                    menghindari terjadinya masalah atau kesalahan dalam proses pembayaran.</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <b> Apakah uang bisa dikembalikan?</b>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Kebijakan pengembalian uang SPP (Sumbangan Pembinaan Pendidikan) tergantung pada kebijakan
                            masing-masing lembaga pendidikan. Secara umum, banyak lembaga pendidikan yang memiliki kebijakan
                            pengembalian uang SPP apabila ada keadaan tertentu seperti siswa pindah sekolah, keluarga
                            mengalami kesulitan keuangan, atau keadaan lain yang dapat dipertimbangkan oleh pihak sekolah. <br> <br>
                            Di SMK Rekayasa, apabila melakukan transaksi yang sifatnya mandiri, anda dapat menerima uang kembali apabila transaksi anada dibatalkan. Syarat dan Ketentuan berlaku.
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
