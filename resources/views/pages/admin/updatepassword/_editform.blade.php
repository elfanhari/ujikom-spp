<div class="form-floating mb-3">
  <input type="text" class="form-control fw-bold text-black" id="floatingInput" placeholder="name@example.com" value="{{ $user->name }}" readonly>
  <label for="floatingInput">Nama Pengguna</label>
</div>
<div class="form-floating">
  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  id="floatingPassword" placeholder="Masukkan password baru" autofocus>
  <label for="floatingPassword">Password Baru</label>
  @error('password')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>