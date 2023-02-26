<div class="form-floating mb-3">
  <input type="password" name="current_password"
      value="{{ old('current_password',) }}" class="form-control text-black @error('current_password') is-invalid @enderror"
      id="floatingInput" placeholder="Masukkan password sebelumnya">
  <label for="floatingInput" class="">Password Sebelumnya</label>
  @error('current_password')
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

<div class="form-floating">
  <input type="password" name="password_confirmation"
      value="{{ old('password_confirmation') }}"class="form-control text-black @error('password_confirmation') is-invalid @enderror"
      id="floatingInput" placeholder="Ketik ulang password baru">
  <label for="floatingInput" class="">Konfirmasi Password Baru</label>
  @error('password_confirmation')
      <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>


<script>
  function togglePassword() {
      var x = document.getElementById("password");
      if (x.type === "password") {
          x.type = "text";
          document
              .getElementById("icon-toggle")
              .setAttribute("fill", "#4e73df");
      } else {
          x.type = "password";
          document
              .getElementById("icon-toggle")
              .setAttribute("fill", "#000");
      }
  }
</script>