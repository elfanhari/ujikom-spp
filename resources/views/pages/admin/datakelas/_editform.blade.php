<div class="form-floating mb-3">
  <input type="text"  value="{{ old('name', $kela->name) }}"name="name" class="form-control text-black @error('name') is-invalid @enderror" id="floatingInput" placeholder="name@">
  <label for="floatingInput" class="">Nama Kelas</label>
  @error('name')
    <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating mb-3">
  <select name="kompetensikeahlian_id" class="form-select @error('kompetensikeahlian_id') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example">
    <option disabled selected>-- Pilih kompetensi keahlian --</option>
      @foreach ($kompetensikeahlian as $tampilkan)
        <option value=" {{ $tampilkan->id }} " {{ $tampilkan->id == $kela->kompetensikeahlian_id ? 'selected' : '' }}> {{ $tampilkan->name }}</option>
      @endforeach
  </select>
  <label for="floatingSelect">Kompetensi Keahlian</label>
  @error('kompetensikeahlian_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>