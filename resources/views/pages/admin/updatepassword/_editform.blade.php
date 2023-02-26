<div class="form-floating mb-3">
  <input type="text" class="form-control fw-bold text-black" id="floatingInput" placeholder="name@example.com" value="{{ $user->name }} - {{ $user->kelas ? $user->kelas->name : strtoupper($user->level) }}" readonly>
  <label for="floatingInput">Nama Pengguna</label>
</div>
<div class="form-floating position-relative">
  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror text-black"  id="password" placeholder="Masukkan password baru" autofocus>
  <label for="floatingPassword">Password Baru 
  </label>
  @error('password')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>