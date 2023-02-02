
<label for="name" class="mt-3">Nama Siswa</label>
<input type="text" value="{{ old('name', $petugas->name) }}" name="name" id="name" class="text-black input-sm form form-control mt-0  @error('name') is-invalid @enderror" placeholder="Masukkan nama iswa">
@error('name')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="telepon" class="mt-3">Telepon</label>
<input type="text" value="{{ old('telepon', $petugas->telepon) }}" name="telepon" id="telepon" class="text-black input-sm form form-control mt-0  @error('telepon') is-invalid @enderror" placeholder="Masukkan telepon petugas">
@error('telepon')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="email" class="mt-3">Email</label>
<input type="text" value="{{ old('email', $petugas->email) }}" name="email" id="email" class="text-black input-sm form form-control mt-0  @error('email') is-invalid @enderror" placeholder="Masukkan email petugas">
@error('email')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="username" class="mt-3">Username</label>
<input type="text" value="{{ old('username', $petugas->username) }}" name="username" id="username" class="text-black input-sm form form-control mt-0  @error('username') is-invalid @enderror" placeholder="Masukkan username petugas">
@error('username')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<input type="hidden" value="{{ old('level', $petugas->level) }}" name="level" id="password" class="text-black input-sm form form-control mt-0" >
<input type="hidden" value="{{ old('password', $petugas->password) }}" name="password" id="password" class="text-black input-sm form form-control mt-0" >

