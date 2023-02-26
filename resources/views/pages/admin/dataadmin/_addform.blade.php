
<label for="name" class="mt-0 mb-1 fw-semibold">Nama Admin</label>
<input type="text" value="{{ old('name') }}" name="name" id="name" class="text-black input-sm form form-control mt-0  @error('name') is-invalid @enderror" placeholder="Masukkan nama admin">
@error('name')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="jk" class="mb-1 fw-semibold mb-1 mt-3">Jenis Kelamin</label>
<select name="jk" id="jk" class="text-black form form-control form-select mt-0 @error('jk') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
  <option value="laki-laki" {{ 'laki-laki' == old('jk') ? 'selected' : '' }}> Laki-laki </option>
  <option value="perempuan" {{ 'perempuan' == old('jk') ? 'selected' : '' }}> Perempuan </option>
</select>
@error('jk')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="telepon" class="fw-semibold mb-1 mt-3">Telepon</label>
<input type="text" value="{{ old('telepon') }}" name="telepon" id="telepon" class="text-black input-sm form form-control mt-0  @error('telepon') is-invalid @enderror" placeholder="Masukkan nomor telepon admin">
@error('telepon')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="email" class="fw-semibold mb-1 mt-3">Email</label>
<input type="text" value="{{ old('email') }}" name="email" id="email" class="text-black input-sm form form-control mt-0  @error('email') is-invalid @enderror" placeholder="Masukkan email admin">
@error('email')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="username" class="fw-semibold mb-1 mt-3">Username</label>
<input type="text" value="{{ old('username') }}" name="username" id="username" class="text-black input-sm form form-control mt-0  @error('username') is-invalid @enderror" placeholder="Masukkan username admin">
@error('username')
<span class="invalid-feedback mt-1 float-right">{{ $message }}</span>
@enderror

<label for="password" class="fw-semibold fs-14 mb-1 mt-3">Password</label>
<div class="input-group" style="border-radius: 2px;">
    <input type="password" value="{{ old('password') }}" name="password" id="password"
        class="fs-14 text-black input-sm form form-control mt-0  @error('password') is-invalid @enderror"
        placeholder="Masukkan password siswa">
    <span class="input-group-text" onclick="togglePassword()">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000"
            class="bi bi-eye-fill" viewBox="0 0 16 16" id="icon-toggle">
            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
        </svg>
    </span>
    @error('password')
        <span class="invalid-feedback mt-1">{{ $message }}</span>
    @enderror
</div>

<input type="hidden" name="level" value="admin">

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
