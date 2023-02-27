<div class="form-floating mb-3">
  <input type="text" name=""
      value="{{ old('name', $user->name) }} - {{ $user->kelas->name }}"class="form-control text-black @error('name') is-invalid @enderror"
      id="floatingInput" placeholder="Masukkan name" readonly>
  <label for="floatingInput" class="">Nama - Kelas</label>
  @error('name')
      <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating mb-3">
  <select name="jk"
      class="form-select @error('jk') is-invalid @enderror" id="floatingSelect"
      aria-label="Floating label select example">
      <option disabled selected>-- Pilih --</option>
      <option value="laki-laki" {{ $user->jk == 'laki-laki' ? 'selected' : '' }}> Laki-Laki </option>
      <option value="perempuan" {{ $user->jk == 'perempuan' ? 'selected' : '' }}> Perempuan </option>
  </select>
  <label for="floatingSelect">Jenis Kelamin</label>
  @error('jk')
      <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
  </div>


  <div class="form-floating mb-3">
    <textarea name="alamat" class="form-control text-black @error('alamat') is-invalid @enderror" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 70px">{{ old('alamat', $user->alamat) }}</textarea>
    <label for="floatingTextarea2">Alamat</label>
    @error('alamat')
        <span class="invalid-feedback mt-1 ">{{ $message }}</span>
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

<div class="form-floating">
  <input type="text" name="username"
      value="{{ old('username', $user->username) }}"class="form-control text-black @error('username') is-invalid @enderror"
      id="floatingInput" placeholder="Masukkan username">
  <label for="floatingInput" class="">Username</label>
  @error('username')
      <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>