
<label for="name" class="mt-3">Nama Admin</label>
<input type="text" value="{{ old('name', $admin->name) }}" name="name" id="name" class="text-black input-sm form form-control mt-0  @error('name') is-invalid @enderror" placeholder="Masukkan nama admin">
@error('name')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="jk" class="mb-1 mt-3">Jenis Kelamin</label>
<select name="jk" id="jk" class="text-black form form-control form-select mt-0 @error('jk') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
  <option value="laki-laki" {{ $admin->jk == 'laki-laki' ? 'selected' : '' }}> Laki-laki </option>
  <option value="perempuan" {{ $admin->jk == 'perempuan' ? 'selected' : '' }}> Perempuan </option>
</select>
@error('jk')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="telepon" class="mt-3">Telepon</label>
<input type="text" value="{{ old('telepon', $admin->telepon) }}" name="telepon" id="telepon" class="text-black input-sm form form-control mt-0  @error('telepon') is-invalid @enderror" placeholder="Masukkan telepon admin">
@error('telepon')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="email" class="mt-3">Email</label>
<input type="text" value="{{ old('email', $admin->email) }}" name="email" id="email" class="text-black input-sm form form-control mt-0  @error('email') is-invalid @enderror" placeholder="Masukkan email admin">
@error('email')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="username" class="mt-3">Username</label>
<input type="text" value="{{ old('username', $admin->username) }}" name="username" id="username" class="text-black input-sm form form-control mt-0  @error('username') is-invalid @enderror" placeholder="Masukkan username admin">
@error('username')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<input type="hidden" value="{{ old('level', $admin->level) }}" name="level" id="password" class="text-black input-sm form form-control mt-0" >
<input type="hidden" value="{{ old('password', $admin->password) }}" name="password" id="password" class="text-black input-sm form form-control mt-0" >

