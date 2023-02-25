<label for="siswa_id" class="mb-1 fw-semibold">Nama Siswa</label>
<input type="text" value="{{ old('namasiswa', $siswaCek[0]->name . ' - ' . $siswaCek[0]->kelas->name ) }}" name="siswa_id" class="text-black input-sm form form-control mt-0  @error('siswa_id') is-invalid @enderror" placeholder="Masukkan siswa_id siswa" readonly disabled>

<label for="tanggalbayar" class="mb-1 mt-3 fw-semibold">Tanggal Bayar</label>
<input type="date" value="{{ old('tanggalbayar') }}" name="tanggalbayar" id="tanggalbayar" class="text-black input-sm form form-control mt-0  @error('tanggalbayar') is-invalid @enderror" placeholder="Masukkan nomor tanggalbayar siswa">
@error('tanggalbayar')
<span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="bulanbayar_id" class="mb-1 mb-1 mt-3 fw-semibold">Bulan dibayar</label>
<select name="bulanbayar_id" id="bulanbayar_id" class="text-black form form-control form-select mt-0   @error('bulanbayar_id') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih pembayaran untuk bulan --</option>
  @foreach ($bulanbayar as $tampilkan)
    <option value="{{ $tampilkan->id }}">{{ $tampilkan->name }}</option>
  @endforeach
</select>
@error('bulanbayar_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="tahunbayar" class="mb-1 mt-3 fw-semibold">Tahun Dibayar</label>
<input type="text" value="{{ old('tahunbayar') }}" name="tahunbayar" id="tahunbayar" class="text-black input-sm form form-control mt-0  @error('tahunbayar') is-invalid @enderror" placeholder="Masukkan tahun dibayar">
@error('tahunbayar')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="jumlahbayar" class="mb-1 mt-3 fw-semibold">Jumlah Bayar</label>
<input type="text" value="Rp{{ number_format($siswaCek[0]->spp->nominal, 0, '.', '.') }}" name="" class="text-black input-sm form form-control mt-0  @error('siswa_id') is-invalid @enderror" placeholder="Masukkan siswa_id siswa" readonly disabled>

<input type="hidden" name="petugas_id" value="{{ auth()->user()->id }}">
<input type="hidden" name="siswa_id" value="{{ $siswaCek[0]->id }}">
<input type="hidden" name="jumlahbayar" value="{{ $siswaCek[0]->spp->nominal }}">
<input type="hidden" name="metodepembayaran_id" value="8">
<input type="hidden" name="status" value="sukses">
<input type="hidden" name="jenistransaksi" value="petugas">