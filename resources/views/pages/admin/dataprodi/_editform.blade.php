<div class="form-floating mb-3">
    <input type="text" name="name" value="{{ old('name', $prodi->name) }}" class="form-control fw-semibold text-black  @error('name') is-invalid @enderror"
        id="floatingInput" placeholder="Masukkan nama Prodi">
    <label for="floatingInput">Nama Prodi</label>
    @error('name')
        <span class="invalid-feedback mt-1">{{ $message }}</span>
    @enderror
</div>

<div class="form-floating mt-3">
    <input type="text" name="singkatan" value="{{ old('singkatan', $prodi->singkatan) }}" class="form-control fw-semibold text-black @error('singkatan') is-invalid @enderror "
        id="floatingInput" placeholder="Masukkan singkatan prodi">
    <label for="floatingInput">Singkatan</label>
    @error('singkatan')
        <span class="invalid-feedback mt-1">{{ $message }}</span>
    @enderror
</div>
