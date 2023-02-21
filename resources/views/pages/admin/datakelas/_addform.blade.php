<label for="name" class="mb-1 fw-semibold">Nama Kelas</label>
<input type="text" value="{{ old('name') }}" name="name" id="name" class="text-black input-sm form form-control mt-0  @error('name') is-invalid @enderror" placeholder="Masukkan nama Kelas">
@error('name')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="kompetensikeahlian_id" class="mb-1 mt-3 fw-semibold">Kompetensi Keahlian</label>
<select name="kompetensikeahlian_id" id="kompetensikeahlian_id" class="text-black form form-control form-select mt-0  @error('kompetensikeahlian_id') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih Kompetensi Keahlian --</option>
  @foreach ($prodi as $tampilkan)
    <option value="{{ $tampilkan->id }} " {{ $tampilkan->id == old('kompetensikeahlian_id') ? 'selected' : '' }}> {{ $tampilkan->name }} </option>
  @endforeach
</select>
@error('kompetensikeahlian_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror