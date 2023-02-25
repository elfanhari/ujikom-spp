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
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until
                        the collapse plugin adds the appropriate classes that we use to style each element. These
                        classes control the overall appearance, as well as the showing and hiding via CSS
                        transitions. You can modify any of this with custom CSS or overriding our default variables.
                        It's also worth noting that just about any HTML can go within the
                        <code>.accordion-body</code>, though the transition does limit overflow.
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
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                        collapse plugin adds the appropriate classes that we use to style each element. These
                        classes control the overall appearance, as well as the showing and hiding via CSS
                        transitions. You can modify any of this with custom CSS or overriding our default variables.
                        It's also worth noting that just about any HTML can go within the
                        <code>.accordion-body</code>, though the transition does limit overflow.
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
