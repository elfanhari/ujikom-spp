
<label for="name" class="mt-0 fw-semibold">Nama Petugas</label>
<input type="text" value="{{ old('name') }}" name="name" id="name" class="text-black input-sm form form-control mt-0  @error('name') is-invalid @enderror" placeholder="Masukkan nama siswa">
@error('name')
<span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="jk" class="mb-1 fw-semibold mt-3">Jenis Kelamin</label>
<select name="jk" id="jk" class="text-black form form-control form-select mt-0 @error('jk') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
    <option value="laki-laki" {{ 'laki-laki' == old('jk') ? 'selected' : '' }}> Laki-laki </option>
    <option value="perempuan" {{ 'perempuan' == old('jk') ? 'selected' : '' }}> Perempuan </option>
</select>
@error('jk')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="telepon" class="fw-semibold mt-3">Telepon</label>
<input type="text" value="{{ old('telepon') }}" name="telepon" id="telepon" class="text-black input-sm form form-control mt-0  @error('telepon') is-invalid @enderror" placeholder="Masukkan nomor telepon siswa">
@error('telepon')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="email" class="fw-semibold mt-3">Email</label>
<input type="text" value="{{ old('email') }}" name="email" id="email" class="text-black input-sm form form-control mt-0  @error('email') is-invalid @enderror" placeholder="Masukkan email siswa">
@error('email')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="username" class="fw-semibold mt-3">Username</label>
<input type="text" value="{{ old('username') }}" name="username" id="username" class="text-black input-sm form form-control mt-0  @error('username') is-invalid @enderror" placeholder="Masukkan username siswa">
@error('username')
<span class="invalid-feedback mt-1 float-right">{{ $message }}</span>
@enderror

<label for="password" class="fw-semibold mt-3">Password</label>
<input type="password" value="{{ old('password') }}" name="password" id="password" class="text-black input-sm form form-control mt-0  @error('password') is-invalid @enderror" placeholder="Masukkan password siswa">
@error('password')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<input type="hidden" name="level" value="petugas">
