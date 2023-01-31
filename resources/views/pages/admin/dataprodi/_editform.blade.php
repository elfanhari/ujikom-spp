<label for="name" class="mb-1">Nama Prodi</label>
<input type="text" value="{{ old('name', $prodi->name) }}" name="name" id="name" class="text-black input-sm form form-control mt-0   @error('name') is-invalid @enderror" placeholder="Masukkan nama Prodi">
@error('name')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="singkatan" class="mb-1 mt-3">Singkatan</label>
<input type="text" value="{{ old('singkatan', $prodi->singkatan) }}" name="singkatan" id="singkatan" class="text-black input-sm form form-control mt-0   @error('singkatan') is-invalid @enderror" placeholder="Masukkan singkatan Prodi" >
@error('singkatan')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror