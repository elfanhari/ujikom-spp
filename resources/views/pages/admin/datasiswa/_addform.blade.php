
<label for="name" class="mt-0 mb-1 fs-14 fw-semibold">Nama Siswa</label>
<input type="text" value="{{ old('name') }}" name="name" id="name" class="text-black fs-14 input-sm form form-control mt-0  @error('name') is-invalid @enderror" placeholder="Masukkan nama siswa">
@error('name')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="jk" class="fw-semibold fs-14 mb-1 mt-3">Jenis Kelamin</label>
<select name="jk" id="jk" class="fs-14 text-black form form-control form-select mt-0 @error('jk') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
  <option value="laki-laki" {{ 'laki-laki' == old('jk') ? 'selected' : '' }}> Laki-laki </option>
  <option value="perempuan" {{ 'perempuan' == old('jk') ? 'selected' : '' }}> Perempuan </option>
</select>
@error('jk')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="kelas_id" class="fw-semibold fs-14 mb-1 mt-3">Kelas</label>
<select name="kelas_id" id="kelas_id" value="{{ old('kelas_id') }}" class="fs-14 text-black form form-control form-select mt-0  @error('kelas_id') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih Kelas --</option>
  @foreach ($kelas as $tampilkan)
    <option value="{{ $tampilkan->id }}" {{ $tampilkan->id == old('kelas_id') ? 'selected' : '' }}>{{ $tampilkan->name }}</option>
  @endforeach
</select>
@error('kelas_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="spp_id" class="fw-semibold fs-14 mb-1 mt-3">Tahun SPP</label>
<select name="spp_id" id="spp_id" value="{{ old('spp_id') }}" class="fs-14 text-black form form-control form-select mt-0   @error('spp_id') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih tahun SPP --</option>
  @foreach ($spp as $tampilkan)
    <option value="{{ $tampilkan->id }}" {{ $tampilkan->id == old('spp_id') ? 'selected' : '' }}>{{ $tampilkan->tahun }} - Rp{{ number_format($tampilkan->nominal, 0, '.', '.') }}</option>
  @endforeach
</select>
@error('spp_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="nisn" class="fw-semibold fs-14 mb-1 mt-3">NISN</label>
<input type="text" value="{{ old('nisn') }}" name="nisn" id="nisn" class="fs-14 text-black input-sm form form-control mt-0  @error('nisn') is-invalid @enderror" placeholder="Masukkan NISN siswa">
@error('nisn')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="nis" class="fw-semibold fs-14 mb-1 mt-3">NIS</label>
<input type="text" value="{{ old('nis') }}" name="nis" id="nis" class="fs-14 text-black input-sm form form-control mt-0  @error('nis') is-invalid @enderror" placeholder="Masukkan NIS siswa">
@error('nis')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="telepon" class="fw-semibold fs-14 mb-1 mt-3">Telepon</label>
<input type="text" value="{{ old('telepon') }}" name="telepon" id="telepon" class="fs-14 text-black input-sm form form-control mt-0  @error('telepon') is-invalid @enderror" placeholder="Masukkan nomor telepon siswa">
@error('telepon')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="alamat" class="fw-semibold fs-14 mb-1 mt-3">Alamat</label>
<textarea type="text"  name="alamat" id="alamat" class="fs-14 text-black input-sm form form-control mt-0  @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat siswa">{{ old('alamat') }}</textarea>
@error('alamat')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="email" class="fw-semibold fs-14 mb-1 mt-3">Email</label>
<input type="text" value="{{ old('email') }}" name="email" id="email" class="fs-14 text-black input-sm form form-control mt-0  @error('email') is-invalid @enderror" placeholder="Masukkan email siswa">
@error('email')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="username" class="fw-semibold fs-14 mb-1 mt-3">Username</label>
<input type="text" value="{{ old('username') }}" name="username" id="username" class="fs-14 text-black input-sm form form-control mt-0  @error('username') is-invalid @enderror" placeholder="Masukkan username siswa">
@error('username')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="password" class="fw-semibold fs-14 mb-1 mt-3">Password</label>
<input type="password" value="{{ old('password') }}" name="password" id="password" class="fs-14 text-black input-sm form form-control mt-0  @error('password') is-invalid @enderror" placeholder="Masukkan password siswa">
@error('password')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<input type="hidden" name="level" value="siswa">
