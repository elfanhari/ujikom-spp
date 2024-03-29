<div class="form-floating mb-3">
  <input type="text" value="{{ old('name', $admin->name) }}" name="name"
      class="form-control text-black @error('name') is-invalid @enderror" id="floatingInput"
      placeholder="name">
  <label for="floatingInput" class="">Nama Administrator</label>
  @error('name')
      <span class="invalid-feedback mt-1 ">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating mb-3">
<select name="jk"
    class="form-select @error('jk') is-invalid @enderror" id="floatingSelect"
    aria-label="Floating label select example">
    <option disabled selected>-- Pilih --</option>
    <option value="laki-laki" {{ $admin->jk == 'laki-laki' ? 'selected' : '' }}> Laki-laki </option>
    <option value="perempuan" {{ $admin->jk == 'perempuan' ? 'selected' : '' }}> Perempuan </option>
</select>
<label for="floatingSelect">Jenis Kelamin</label>
@error('jk')
    <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror
</div>

<div class="form-floating mb-3">
  <input type="text" value="{{ old('telepon', $admin->telepon) }}" name="telepon"
      class="form-control text-black @error('telepon') is-invalid @enderror" id="floatingInput"
      placeholder="telepon">
  <label for="floatingInput" class="">Telepon</label>
  @error('telepon')
      <span class="invalid-feedback mt-1 ">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="text" value="{{ old('email', $admin->email) }}" name="email"
      class="form-control text-black @error('email') is-invalid @enderror" id="floatingInput"
      placeholder="email">
  <label for="floatingInput" class="">Email</label>
  @error('email')
      <span class="invalid-feedback mt-1 ">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="text" value="{{ old('username', $admin->username) }}" name="username"
      class="form-control text-black @error('username') is-invalid @enderror" id="floatingInput"
      placeholder="username">
  <label for="floatingInput" class="">Username</label>
  @error('username')
      <span class="invalid-feedback mt-1 ">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating">
    <select name="aktif" class="form-select @error('aktif') is-invalid @enderror" id="floatingSelect"
        aria-label="Floating label select example">
        <option disabled selected>-- Pilih --</option>
        <option value=1 {{ $admin->aktif == 1 ? 'selected' : '' }}>AKTIF</option>
        <option value=0 {{ $admin->aktif == 0 ? 'selected' : '' }}>TIDAK AKTIF</option>
    </select>
    <label for="floatingSelect">Status Akun</label>
    @error('aktif')
        <span class="invalid-feedback mt-1">{{ $message }}</span>
    @enderror
</div>

<input type="hidden" value="{{ old('level', $admin->level) }}" name="level" id="level" class="text-black input-sm form form-control mt-0" >