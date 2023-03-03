@php
    use App\Models\Bulanbayar;
    use App\Models\Pembayaran;
    
    $bulanbayar1 = DB::select('select * from bulanbayars where id > 6');
    $tahunbayar1 = $siswa->spp->tahun;
    
    $bulanbayar2 = Bulanbayar::all();
    $tahunbayar2 = $siswa->spp->tahun + 1;
    
    $bulanbayar3 = Bulanbayar::all();
    $tahunbayar3 = $siswa->spp->tahun + 2;
    
    $bulanbayar4 = Bulanbayar::limit(6)->get();
    $tahunbayar4 = $siswa->spp->tahun + 3;
    
    $forDisable = Pembayaran::where('siswa_id', $siswa->id)
        ->where('status', 'sukses')
        ->get();
    
@endphp

<label for="siswa_id" class="mb-1 fw-semibold">Nama Siswa - Kelas</label>
<input type="text" value="{{ old('namasiswa', $siswa->name . ' - ' . $siswa->kelas->name ) }}" name="siswa_id" class="text-black input-sm form form-control mt-0  @error('siswa_id') is-invalid @enderror" placeholder="Masukkan siswa_id siswa" readonly disabled>

<label for="tanggalbayar" class="mb-1 fw-semibold mt-3">Tanggal Bayar</label>
<input type="date" value="{{ old('tanggalbayar') }}" name="tanggalbayar" id="tanggalbayar" class="text-black input-sm form form-control mt-0  @error('tanggalbayar') is-invalid @enderror" placeholder="Masukkan nomor tanggalbayar siswa">
@error('tanggalbayar')
<span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

{{-- <label for="bulanbayar_id" class="mb-1 fw-semibold mb-1 mt-3">Pembayaran untuk bulan</label>
<select name="bulanbayar_id" id="bulanbayar_id" class="text-black form form-control form-select mt-0   @error('bulanbayar_id') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih --</option>
  @foreach ($bulanbayar as $tampilkan)
      
      <option value="{{ $tampilkan->id }}" {{ $tampilkan->id == old('bulanbayar_id') ? 'selected' : '' }}
        >{{ $tampilkan->name }}</option>
  @endforeach
</select>
@error('bulanbayar_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror --}}

<label for="bulanbayar_id" class="mb-1 mb-1 mt-3 fw-semibold">Pembayaran untuk</label>
<select name="pembayaranuntuk" id="bulanbayar_id"
    class="text-black form form-control form-select mt-0 " required>
    <option value="" selected disabled>-- Pilih bulan dan tahun dibayar --</option>

    @foreach ($bulanbayar1 as $tampilkan)
        <option value="{{ $tampilkan->id }}-{{ $tahunbayar1 }}"
              @foreach ($forDisable as $item)
                @if ($tampilkan->id . $tahunbayar1 == $item->bulanbayar_id . $item->tahunbayar)
                  disabled @class(['bg-success'=> true]) 
                @endif  
              @endforeach
          > {{ $tampilkan->name }} - {{ $tahunbayar1 }}</option>
    @endforeach

    @foreach ($bulanbayar2 as $tampilkan)
        <option value="{{ $tampilkan->id }}-{{ $tahunbayar2 }}"
            @foreach ($forDisable as $item)
              @if ($tampilkan->id . $tahunbayar2 == $item->bulanbayar_id . $item->tahunbayar)
                disabled @class(['bg-success'=> true])
              @endif 
            @endforeach
        > {{ $tampilkan->name }} - {{ $tahunbayar2 }}</option>
    @endforeach

    @foreach ($bulanbayar3 as $tampilkan)
        <option value="{{ $tampilkan->id }}-{{ $tahunbayar3 }}"
            @foreach ($forDisable as $item)
              @if ($tampilkan->id . $tahunbayar3 == $item->bulanbayar_id . $item->tahunbayar)
                disabled @class(['bg-success'=> true])
              @endif 
            @endforeach
        > {{ $tampilkan->name }} - {{ $tahunbayar3 }} </option>
    @endforeach

    @foreach ($bulanbayar4 as $tampilkan)
        <option value="{{ $tampilkan->id }}-{{ $tahunbayar4 }}"
          @foreach ($forDisable as $item)
            @if ($tampilkan->id . $tahunbayar4 == $item->bulanbayar_id . $item->tahunbayar)
              disabled @class(['bg-success'=> true])
            @endif 
          @endforeach
        > {{ $tampilkan->name }} - {{ $tahunbayar4 }}</option>
    @endforeach

</select>

{{-- <label for="tahunbayar" class="mb-1 fw-semibold mt-3">Pembayaran untuk tahun</label>
<input type="text" value="{{ old('tahunbayar') }}" name="tahunbayar" id="tahunbayar" class="text-black input-sm form form-control mt-0  @error('tahunbayar') is-invalid @enderror" placeholder="Masukkan tahun bayar">
@error('tahunbayar')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror --}}

<label for="jumlahbayar" class="mb-1 fw-semibold mt-3">Jumlah Bayar</label>
<input type="text" value="Rp{{ number_format($siswa->spp->nominal, 0, '.', '.') }}" name="" class="text-black input-sm form form-control mt-0  @error('siswa_id') is-invalid @enderror" placeholder="Masukkan siswa_id siswa" readonly disabled>


<label for="metodepembayaran_id" class="mb-1 fw-semibold mb-1 mt-3">Metode Pembayaran</label>
<select name="metodepembayaran_id" id="metodepembayaran_id" class="text-black form form-control form-select mt-0   @error('metodepembayaran_id') is-invalid @enderror" >
  <option value="" selected disabled>-- Pilih --</option>
  @foreach ($metodepembayaran as $tampilkan)
    <option value="{{ $tampilkan->id }}" {{ $tampilkan->id == old('metodepembayaran_id') ? 'selected' : '' }}>{{ $tampilkan->payment }}</option>
  @endforeach
</select>
@error('metodepembayaran_id')
  <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

<div class="mb-1 fw-semibold mt-3">
  <label for="gambar" class="form-label">Bukti Pembayaran <small>(harus berupa gambar)</small> </label>
  <input name="files"   class="form-control form-control-sm @error('files') is-invalid @enderror" id="gambar" type="file" onchange="previewImage()">
  @error('files')
    <span class="invalid-feedback mt-1">{{ $message }}</span>
  @enderror
</div>


<div class="mt-2">
  <img class="img-preview img-fluid mb-2 col-sm-6 " style="max-width: 200px">
</div>

<input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
<input type="hidden" name="jumlahbayar" value="{{ $siswa->spp->nominal }}">

<script>

  function previewImage() {
    const image = document.querySelector('#gambar');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new  FileReader();
    oFReader.readAsDataURL(gambar.files[0]);


    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
    
</script>