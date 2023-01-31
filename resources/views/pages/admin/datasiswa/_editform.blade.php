
<label for="name" class="mt-3">name</label>
<input type="text" value="{{ old('name', $siswa->name) }}" name="name" id="name" class="text-black input-sm form form-control mt-0  @error('name') is-invalid @enderror" placeholder="Masukkan name SPP">
@error('name')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="kelas_id" class="mb-1 mt-3">Kelas</label>
<select name="kelas_id" id="kelas_id" class="text-black form form-control form-select mt-0   @error('kelas_id') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih Kelas --</option>
  @foreach ($kelas as $tampilkan)
    <option value=" {{ $tampilkan->id }} " {{ $tampilkan->id == $siswa->kelas_id ? 'selected' : '' }}> {{ $tampilkan->name }}</option>
  @endforeach
</select>
@error('kelas_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="spp_id" class="mb-1 mt-3">SPP</label>
<select name="spp_id" id="spp_id" class="text-black form form-control form-select mt-0   @error('spp_id') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih SPP --</option>
  @foreach ($spp as $tampilkan)
  <option value=" {{ $tampilkan->id }} " {{ $tampilkan->id == $siswa->spp_id ? 'selected' : '' }}> {{ $tampilkan->tahun }}</option>
@endforeach
</select>
@error('spp_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="nisn" class="mt-3">nisn</label>
<input type="text" value="{{ old('nisn', $siswa->nisn) }}" name="nisn" id="nisn" class="text-black input-sm form form-control mt-0  @error('nisn') is-invalid @enderror" placeholder="Masukkan nisn SPP">
@error('nisn')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="nis" class="mt-3">nis</label>
<input type="text" value="{{ old('nis', $siswa->nis) }}" name="nis" id="nis" class="text-black input-sm form form-control mt-0  @error('nis') is-invalid @enderror" placeholder="Masukkan nis SPP">
@error('nis')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="telepon" class="mt-3">telepon</label>
<input type="text" value="{{ old('telepon', $siswa->telepon) }}" name="telepon" id="telepon" class="text-black input-sm form form-control mt-0  @error('telepon') is-invalid @enderror" placeholder="Masukkan telepon SPP">
@error('telepon')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="alamat" class="mt-3">alamat</label>
<input type="text" value="{{ old('alamat', $siswa->alamat) }}" name="alamat" id="alamat" class="text-black input-sm form form-control mt-0  @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat SPP">
@error('alamat')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="email" class="mt-3">email</label>
<input type="text" value="{{ old('email', $siswa->email) }}" name="email" id="email" class="text-black input-sm form form-control mt-0  @error('email') is-invalid @enderror" placeholder="Masukkan email SPP">
@error('email')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="username" class="mt-3">username</label>
<input type="text" value="{{ old('username', $siswa->username) }}" name="username" id="username" class="text-black input-sm form form-control mt-0  @error('username') is-invalid @enderror" placeholder="Masukkan username SPP">
@error('username')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<input type="hidden" value="{{ old('level', $siswa->level) }}" name="level" id="password" class="text-black input-sm form form-control mt-0" >
<input type="hidden" value="{{ old('password', $siswa->password) }}" name="password" id="password" class="text-black input-sm form form-control mt-0" >

