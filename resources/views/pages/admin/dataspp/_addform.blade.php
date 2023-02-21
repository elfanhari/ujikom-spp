<label for="tahun" class="fw-semibold mb-1">Tahun SPP</label>
<input type="text" value="{{ old('tahun') }}" name="tahun" id="tahun" class="text-black input-sm form form-control mt-0  @error('tahun') is-invalid @enderror" placeholder="Masukkan tahun SPP">
@error('tahun')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<label for="nominal" class="fw-semibold mb-1 mt-3">Nominal</label>
<input type="text" value="{{ old('nominal') }}" name="nominal" id="nominal" class="text-black input-sm form form-control mt-0  @error('nominal') is-invalid @enderror" placeholder="Masukkan nominal SPP">
@error('nominal')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror