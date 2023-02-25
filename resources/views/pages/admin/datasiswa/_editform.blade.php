<div class="form-floating mb-3">
    <input type="text" value="{{ old('name', $siswa->name) }}" name="name"
        class="form-control text-black @error('name') is-invalid @enderror" id="floatingInput"
        placeholder="name">
    <label for="floatingInput" class="">Nama Siswa</label>
    @error('name')
        <span class="invalid-feedback mt-1 ">{{ $message }}</span>
    @enderror
</div>

    <div class="form-floating mb-3">
    <select name="jk"
        class="form-select @error('jk') is-invalid @enderror" id="floatingSelect"
        aria-label="Floating label select example">
        <option disabled selected>-- Pilih --</option>
        <option value="laki-laki" {{ $siswa->jk == 'laki-laki' ? 'selected' : '' }}> Laki-laki </option>
        <option value="perempuan" {{ $siswa->jk == 'perempuan' ? 'selected' : '' }}> Perempuan </option>
    </select>
    <label for="floatingSelect">Jenis Kelamin</label>
    @error('jk')
        <span class="invalid-feedback mt-1">{{ $message }}</span>
    @enderror
    </div>

<div class="form-floating mb-3">
  <select name="kelas_id"
      class="form-select @error('kelas_id') is-invalid @enderror" id="floatingSelect"
      aria-label="Floating label select example">
      <option disabled selected>-- Pilih --</option>
      @foreach ($kelas as $tampilkan)
          <option value=" {{ $tampilkan->id }} "
              {{ $tampilkan->id == $siswa->kelas_id ? 'selected' : '' }}> {{ $tampilkan->name }}</option>
      @endforeach
  </select>
  <label for="floatingSelect">Kelas</label>
  @error('kelas_id')
      <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating mb-3">
  <select name="spp_id"
      class="form-select @error('spp_id') is-invalid @enderror" id="floatingSelect"
      aria-label="Floating label select example">
      <option disabled selected>-- Pilih --</option>
      @foreach ($spp as $tampilkan)
          <option value=" {{ $tampilkan->id }} "
              {{ $tampilkan->id == $siswa->spp_id ? 'selected' : '' }}> {{ $tampilkan->tahun }}</option>
      @endforeach
  </select>
  <label for="floatingSelect">SPP</label>
  @error('spp_id')
      <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating mb-3">
    <input type="text" value="{{ old('nisn', $siswa->nisn) }}" name="nisn"
        class="form-control text-black @error('nisn') is-invalid @enderror" id="floatingInput"
        placeholder="nisn">
    <label for="floatingInput" class="">NISN</label>
    @error('nisn')
        <span class="invalid-feedback mt-1 ">{{ $message }}</span>
    @enderror
</div>

<div class="form-floating mb-3">
    <input type="text" value="{{ old('nis', $siswa->nis) }}" name="nis"
        class="form-control text-black @error('nis') is-invalid @enderror" id="floatingInput"
        placeholder="nis">
    <label for="floatingInput" class="">NIS</label>
    @error('nis')
        <span class="invalid-feedback mt-1 ">{{ $message }}</span>
    @enderror
</div>

<div class="form-floating mb-3">
    <input type="text" value="{{ old('telepon', $siswa->telepon) }}" name="telepon"
        class="form-control text-black @error('telepon') is-invalid @enderror" id="floatingInput"
        placeholder="telepon">
    <label for="floatingInput" class="">Telepon</label>
    @error('telepon')
        <span class="invalid-feedback mt-1 ">{{ $message }}</span>
    @enderror
</div>

<div class="form-floating mb-3">
    <textarea name="alamat" class="form-control text-black @error('alamat') is-invalid @enderror" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $siswa->alamat }}</textarea>
    <label for="floatingTextarea2">Alamat</label>
    @error('alamat')
        <span class="invalid-feedback mt-1 ">{{ $message }}</span>
    @enderror
</div>

<div class="form-floating mb-3">
    <input type="text" value="{{ old('email', $siswa->email) }}" name="email"
        class="form-control text-black @error('email') is-invalid @enderror" id="floatingInput"
        placeholder="email">
    <label for="floatingInput" class="">Email</label>
    @error('email')
        <span class="invalid-feedback mt-1 ">{{ $message }}</span>
    @enderror
</div>

<div class="form-floating mb-3">
    <input type="text" value="{{ old('username', $siswa->username) }}" name="username"
        class="form-control text-black @error('username') is-invalid @enderror" id="floatingInput"
        placeholder="username">
    <label for="floatingInput" class="">Username</label>
    @error('username')
        <span class="invalid-feedback mt-1 ">{{ $message }}</span>
    @enderror
</div>

<input type="hidden" value="{{ old('level', $siswa->level) }}" name="level" id="password" class="text-black input-sm form form-control mt-0" >
<input type="hidden" value="{{ old('password', $siswa->password) }}" name="password" id="password" class="text-black input-sm form form-control mt-0" >