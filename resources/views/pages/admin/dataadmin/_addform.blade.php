
<label for="name" class="mt-2">Nama admin</label>
<input type="text" value="{{ old('name') }}" name="name" id="name" class="text-black input-sm form form-control mt-0  @error('name') is-invalid @enderror" placeholder="Masukkan nama admin">
@error('name')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="telepon" class="mt-3">Telepon</label>
<input type="text" value="{{ old('telepon') }}" name="telepon" id="telepon" class="text-black input-sm form form-control mt-0  @error('telepon') is-invalid @enderror" placeholder="Masukkan nomor telepon admin">
@error('telepon')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="email" class="mt-3">Email</label>
<input type="text" value="{{ old('email') }}" name="email" id="email" class="text-black input-sm form form-control mt-0  @error('email') is-invalid @enderror" placeholder="Masukkan email admin">
@error('email')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="username" class="mt-3">Username</label>
<input type="text" value="{{ old('username') }}" name="username" id="username" class="text-black input-sm form form-control mt-0  @error('username') is-invalid @enderror" placeholder="Masukkan username admin">
@error('username')
<span class="invalid-feedback mt-1 float-right">{{ $message }}</span>
@enderror

<label for="password" class="mt-3">Password</label>
<input type="password" value="{{ old('password') }}" name="password" id="password" class="text-black input-sm form form-control mt-0  @error('password') is-invalid @enderror" placeholder="Masukkan password admin">
@error('password')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<input type="hidden" name="level" value="admin">
