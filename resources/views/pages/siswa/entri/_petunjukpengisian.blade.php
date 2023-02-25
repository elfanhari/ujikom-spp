<div class="offcanvas offcanvas-top" tabindex="3" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasTopLabel">Petunjuk Pengisian</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ol>
      <li>Pastikan anda memiliki akun pada e-SPP SMK REKAYASA</li>
      <li>Login menggunakan akun anda</li>
      <li>Pastikan data diri anda sudah sesuai dan benar.</li>
      <li>Pergi ke menu Entri Pembayaran</li>
      <li>Sebelum mengisi formulir, pastikan anda sudah melakukan pembayaran secara online ke Dompet Digital kami:</li>
      <ul>
        @foreach ($metodepembayaran as $tampilkan)
        <li>{{ $tampilkan->payment }} : <p class="text-primary m-0 d-inline">{{ $tampilkan->number }}</p>  atas nama {{ $tampilkan->atasnama }}</li>
        @endforeach
      </ul>
      <li>Lakukan pengisian formulir sesuai dengan ketentuan</li>
      <li>Klik simpan</li>
      <li>Selesai</li>
    </ol>
  </div>
</div>