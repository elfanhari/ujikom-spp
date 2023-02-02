<label for="siswa_id" class="mb-1 mt-0">Siswa</label>
<select name="siswa_id" id="siswa_id" value="{{ old('siswa_id') }}" class="text-black form form-control form-select mt-0  @error('siswa_id') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih siswa --</option>
    @foreach ($siswa as $tampilkan)
      <option value="{{ $tampilkan->id }}">{{ $tampilkan->name }} - {{ $tampilkan->kelas->name }}</option>
    @endforeach
  </select>
@error('siswa_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="kelas_id" class="mb-1 mt-3">Kelas</label>
<select name="kelas_id" id="kelas_id" value="{{ old('kelas_id') }}" class="text-black form form-control form-select mt-0  @error('kelas_id') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih Kelas --</option>
  @foreach ($kelas as $tampilkan)
    <option value="{{ $tampilkan->id }}">{{ $tampilkan->name }}</option>
  @endforeach
</select>
@error('kelas_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="spp_id" class="mb-1 mt-3">Tahun SPP</label>
<select name="spp_id" id="spp_id" value="{{ old('spp_id') }}" class="text-black form form-control form-select mt-0   @error('spp_id') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih tahun SPP --</option>
  @foreach ($spp as $tampilkan)
    <option value="{{ $tampilkan->id }}">{{ $tampilkan->tahun }}</option>
  @endforeach
</select>
@error('spp_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror


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

<label for="jumlahbayar" class="mt-3">jumlahbayar</label>
<input type="text" value="{{ old('jumlahbayar') }}" name="jumlahbayar" id="jumlahbayar" class="text-black input-sm form form-control mt-0  @error('jumlahbayar') is-invalid @enderror" placeholder="Masukkan jumlahbayar siswa">
@error('jumlahbayar')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<input type="hidden" name="petugas_id" value="{{ auth()->user()->id }}">