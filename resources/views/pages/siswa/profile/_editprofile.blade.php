<div class="form-floating mb-3">
  <input type="text" name="name"
      value="{{ old('name', $user->name) }}"class="form-control text-black @error('name') is-invalid @enderror"
      id="floatingInput" placeholder="Masukkan name">
  <label for="floatingInput" class="">Name</label>
  @error('name')
      <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="text" name="telepon"
      value="{{ old('telepon', $user->telepon) }}"class="form-control text-black @error('telepon') is-invalid @enderror"
      id="floatingInput" placeholder="Masukkan telepon">
  <label for="floatingInput" class="">Telepon</label>
  @error('telepon')
      <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="text" name="email"
      value="{{ old('email', $user->email) }}"class="form-control text-black @error('email') is-invalid @enderror"
      id="floatingInput" placeholder="Masukkan email">
  <label for="floatingInput" class="">Email</label>
  @error('email')
      <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="text" name="username"
      value="{{ old('username', $user->username) }}"class="form-control text-black @error('username') is-invalid @enderror"
      id="floatingInput" placeholder="Masukkan username">
  <label for="floatingInput" class="">Username</label>
  @error('username')
      <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>