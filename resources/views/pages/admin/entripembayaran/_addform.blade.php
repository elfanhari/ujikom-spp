<input type="text" value="{{ old('namasiswa', $siswaCek[0]->name . ' - ' . $siswaCek[0]->kelas->name ) }}" name="siswa_id" class="text-black input-sm form form-control mt-0  @error('siswa_id') is-invalid @enderror" placeholder="Masukkan siswa_id siswa" readonly disabled>

<label for="tanggalbayar" class="mt-3">Tanggal Bayar</label>
<input type="date" value="{{ old('tanggalbayar') }}" name="tanggalbayar" id="tanggalbayar" class="text-black input-sm form form-control mt-0  @error('tanggalbayar') is-invalid @enderror" placeholder="Masukkan nomor tanggalbayar siswa">
@error('tanggalbayar')
<span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="bulanbayar" class="mt-3">Bulan Bayar</label>
<input type="text" value="{{ old('bulanbayar') }}" name="bulanbayar" id="bulanbayar" class="text-black input-sm form form-control mt-0  @error('bulanbayar') is-invalid @enderror" placeholder="Masukkan nomor bulan Bayar">
@error('bulanbayar')
<span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="tahunbayar" class="mt-3">Tahun Bayar</label>
<input type="text" value="{{ old('tahunbayar') }}" name="tahunbayar" id="tahunbayar" class="text-black input-sm form form-control mt-0  @error('tahunbayar') is-invalid @enderror" placeholder="Masukkan tahun bayar">
@error('tahunbayar')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="jumlahbayar" class="mt-3">Jumlah Bayar</label>
<input type="text" id="dengan-rupiah" value="{{ old('jumlahbayar') }}" name="jumlahbayar" class="text-black input-sm form form-control mt-0  @error('jumlahbayar') is-invalid @enderror" placeholder="Masukkan jumlahbayar siswa">
@error('jumlahbayar')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<input type="hidden" name="petugas_id" value="{{ auth()->user()->id }}">
<input type="hidden" name="siswa_id" value="{{ $siswaCek[0]->id }}">