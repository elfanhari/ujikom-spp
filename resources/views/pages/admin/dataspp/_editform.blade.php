<div class="form-floating mb-3">
  <input type="text" name="tahun" value="{{ old('tahun', $spp->tahun) }}" class="form-control fw-semibold text-black  @error('tahun') is-invalid @enderror"
      id="floatingInput" placeholder="Masukkan nama spp">
  <label for="floatingInput">Tahun SPP</label>
  @error('tahun')
      <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>

<div class="form-floating mt-3">
  <input type="text" name="nominal" value="{{ old('nominal', $spp->nominal) }}" class="form-control fw-semibold text-black @error('nominal') is-invalid @enderror "
      id="floatingInput" placeholder="Masukkan nominal spp">
  <label for="floatingInput">Nominal</label>
  @error('nominal')
      <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>
