<div class="form-floating mb-3">
  <input type="text" value="{{ old('name', $petuga->name) }}" name="name"
      class="form-control text-black @error('name') is-invalid @enderror" id="floatingInput"
      placeholder="name">
  <label for="floatingInput" class="">Nama Petugas</label>
  @error('name')
      <span class="invalid-feedback mt-1 ">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating mb-3">
<select name="jk"
    class="form-select @error('jk') is-invalid @enderror" id="floatingSelect"
    aria-label="Floating label select example">
    <option disabled selected>-- Pilih --</option>
    <option value="laki-laki" {{ $petuga->jk == 'laki-laki' ? 'selected' : '' }}> Laki-laki </option>
    <option value="perempuan" {{ $petuga->jk == 'perempuan' ? 'selected' : '' }}> Perempuan </option>
</select>
<label for="floatingSelect">Jenis Kelamin</label>
@error('jk')
    <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror
</div>

<div class="form-floating mb-3">
  <input type="text" value="{{ old('telepon', $petuga->telepon) }}" name="telepon"
      class="form-control text-black @error('telepon') is-invalid @enderror" id="floatingInput"
      placeholder="telepon">
  <label for="floatingInput" class="">Telepon</label>
  @error('telepon')
      <span class="invalid-feedback mt-1 ">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="text" value="{{ old('email', $petuga->email) }}" name="email"
      class="form-control text-black @error('email') is-invalid @enderror" id="floatingInput"
      placeholder="email">
  <label for="floatingInput" class="">Email</label>
  @error('email')
      <span class="invalid-feedback mt-1 ">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating">
  <input type="text" value="{{ old('username', $petuga->username) }}" name="username"
      class="form-control text-black @error('username') is-invalid @enderror" id="floatingInput"
      placeholder="username">
  <label for="floatingInput" class="">Username</label>
  @error('username')
      <span class="invalid-feedback mt-1 ">{{ $message }}</span>
  @enderror
</div>

<input type="hidden" value="{{ old('level', $petuga->level) }}" name="level" id="level" class="text-black input-sm form form-control mt-0" >