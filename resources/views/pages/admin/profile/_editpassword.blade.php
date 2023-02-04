<div class="form-floating mb-3">
  <input type="password" name="password_sebelumnya"
      value="{{ old('password_sebelumnya') }}"class="form-control text-black @error('password_sebelumnya') is-invalid @enderror"
      id="floatingInput" placeholder="Masukkan password sebelumnya">
  <label for="floatingInput" class="">Password Sebelumnya</label>
  @error('password_sebelumnya')
      <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="password" name="password"
      value="{{ old('password') }}"class="form-control text-black @error('password') is-invalid @enderror"
      id="floatingInput" placeholder="Masukkan password baru">
  <label for="floatingInput" class="">Password Baru</label>
  @error('password')
      <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="password" name="password_confirmation"
      value="{{ old('password_confirmation') }}"class="form-control text-black @error('password_confirmation') is-invalid @enderror"
      id="floatingInput" placeholder="Ketik ulang password baru">
  <label for="floatingInput" class="">Konfirmasi Password Baru</label>
  @error('password_confirmation')
      <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>