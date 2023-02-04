<label for="siswa_id" class="mb-1 mt-0">Siswa</label>
<select name="siswa_id" id="siswa_id" class="text-black form form-control form-select mt-0   @error('siswa_id') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih siswa --</option>
  @foreach ($siswa as $tampilkan)
    <option value=" {{ $tampilkan->id }} " {{ $tampilkan->id == $pembayaran->siswa_id ? 'selected' : '' }}> {{ $tampilkan->name }}</option>
  @endforeach
</select>
@error('siswa_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="tanggalbayar" class="mt-3">Tanggal Bayar</label>
<input type="date" value="{{ old('tanggalbayar', $pembayaran->tanggalbayar) }}" name="tanggalbayar" id="tanggalbayar" class="text-black input-sm form form-control mt-0  @error('tanggalbayar') is-invalid @enderror" placeholder="Masukkan tanggalbayar siswa">
@error('tanggalbayar')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="bulanbayar" class="mt-3">bulanbayar</label>
<input type="text" value="{{ old('bulanbayar', $pembayaran->bulanbayar) }}" name="bulanbayar" id="bulanbayar" class="text-black input-sm form form-control mt-0  @error('bulanbayar') is-invalid @enderror" placeholder="Masukkan bulanbayar siswa">
@error('bulanbayar')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="tahunbayar" class="mt-3">Tahun Bayar</label>
<input type="text" value="{{ old('tahunbayar', $pembayaran->tahunbayar) }}" name="tahunbayar" id="tahunbayar" class="text-black input-sm form form-control mt-0  @error('tahunbayar') is-invalid @enderror" placeholder="Masukkan tahunbayar siswa">
@error('tahunbayar')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="jumlahbayar" class="mt-3">Jumlah Bayar</label>
<input type="text" value="{{ old('jumlahbayar', $pembayaran->jumlahbayar) }}" name="jumlahbayar" id="jumlahbayar" class="text-black input-sm form form-control mt-0  @error('jumlahbayar') is-invalid @enderror" placeholder="Masukkan jumlahbayar siswa">
@error('jumlahbayar')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<input type="hidden" value="{{ old('petugas_id', $pembayaran->petugas_id) }}" name="petugas_id" id="password" class="text-black input-sm form form-control mt-0" >
<input type="hidden" value="{{ old('siswa_id', $pembayaran->siswa_id) }}" name="siswa_id" id="password" class="text-black input-sm form form-control mt-0" >

