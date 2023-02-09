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

<label for="bulanbayar_id" class="mb-1 mt-3">Bulan dibayar</label>
<select name="bulanbayar_id" id="bulanbayar_id" class="text-black form form-control form-select mt-0   @error('bulanbayar_id') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih pembayaran untuk bulan --</option>
  @foreach ($bulanbayar as $tampilkan)
    <option value="{{ $tampilkan->id }}" {{ $tampilkan->id == $pembayaran->bulanbayar_id ? 'selected' : '' }}>{{ $tampilkan->name }}</option>
  @endforeach
</select>
@error('bulanbayar_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="tahunbayar" class="mt-3">Tahun Bayar</label>
<input type="text" value="{{ old('tahunbayar', $pembayaran->tahunbayar) }}" name="tahunbayar" id="tahunbayar" class="text-black input-sm form form-control mt-0  @error('tahunbayar') is-invalid @enderror" placeholder="Masukkan tahunbayar siswa">
@error('tahunbayar')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<input type="hidden" name="jumlahbayar" value="{{ $pembayaran->jumlahbayar }}">
<input type="hidden" value="{{ old('petugas_id', $pembayaran->petugas_id) }}" name="petugas_id" id="password" class="text-black input-sm form form-control mt-0" >
<input type="hidden" value="{{ old('siswa_id', $pembayaran->siswa_id) }}" name="siswa_id" id="password" class="text-black input-sm form form-control mt-0" >

