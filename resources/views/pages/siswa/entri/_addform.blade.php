<input type="text" value="{{ old('namasiswa', $siswa->name . ' - ' . $siswa->kelas->name ) }}" name="siswa_id" class="text-black input-sm form form-control mt-0  @error('siswa_id') is-invalid @enderror" placeholder="Masukkan siswa_id siswa" readonly disabled>

<label for="tanggalbayar" class="mt-3">Tanggal Bayar</label>
<input type="date" value="{{ old('tanggalbayar') }}" name="tanggalbayar" id="tanggalbayar" class="text-black input-sm form form-control mt-0  @error('tanggalbayar') is-invalid @enderror" placeholder="Masukkan nomor tanggalbayar siswa">
@error('tanggalbayar')
<span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="bulanbayar_id" class="mb-1 mt-3">Bulan dibayar</label>
<select name="bulanbayar_id" id="bulanbayar_id" class="text-black form form-control form-select mt-0   @error('bulanbayar_id') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih pembayaran untuk bulan --</option>
  @foreach ($bulanbayar as $tampilkan)
    <option value="{{ $tampilkan->id }}">{{ $tampilkan->name }}</option>
  @endforeach
</select>
@error('bulanbayar_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="tahunbayar" class="mt-3">Tahun Bayar</label>
<input type="text" value="{{ old('tahunbayar') }}" name="tahunbayar" id="tahunbayar" class="text-black input-sm form form-control mt-0  @error('tahunbayar') is-invalid @enderror" placeholder="Masukkan tahun bayar">
@error('tahunbayar')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="jumlahbayar" class="mt-3">Jumlah Bayar</label>
<input type="text" value="Rp{{ number_format($siswa->spp->nominal, 0, '.', '.') }}" name="" class="text-black input-sm form form-control mt-0  @error('siswa_id') is-invalid @enderror" placeholder="Masukkan siswa_id siswa" readonly disabled>


<label for="metodepembayaran_id" class="mb-1 mt-3">Metode Pembayaran</label>
<select name="metodepembayaran_id" id="metodepembayaran_id" class="text-black form form-control form-select mt-0   @error('metodepembayaran_id') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih --</option>
  @foreach ($metodepembayaran as $tampilkan)
    <option value="{{ $tampilkan->id }}">{{ $tampilkan->payment }}</option>
  @endforeach
</select>
@error('metodepembayaran_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<div class="mt-3">
  <label for="gambar" class="form-label">Bukti Pembayaran <small>(harus berupa gambar)</small> </label>
  <input name="files"   class="form-control form-control-sm @error('files') is-invalid @enderror" id="gambar" type="file" onchange="previewImage()">
  @error('files')
    <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>


<div class="my-2">
  <img class="img-preview img-fluid mb-2 col-sm-6 " style="max-width: 200px">
</div>

<input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
<input type="hidden" name="jumlahbayar" value="{{ $siswa->spp->nominal }}">

<script>

  function previewImage() {
    const image = document.querySelector('#gambar');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new  FileReader();
    oFReader.readAsDataURL(gambar.files[0]);


    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
    
</script>