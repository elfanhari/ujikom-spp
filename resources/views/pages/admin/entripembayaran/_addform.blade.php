@php
    use App\Models\Bulanbayar;
    use App\Models\Pembayaran;

    $bulanbayar1 = DB::select('select * from bulanbayars where id > 6');
    $tahunbayar1 = $siswaCek->first()->spp->tahun;
    
    $bulanbayar2 = Bulanbayar::all();
    $tahunbayar2 = $siswaCek->first()->spp->tahun + 1;
    
    $bulanbayar3 = Bulanbayar::all();
    $tahunbayar3 = $siswaCek->first()->spp->tahun + 2;
    
    $bulanbayar4 = Bulanbayar::limit(6)->get();
    $tahunbayar4 = $siswaCek->first()->spp->tahun + 3;
    
    $nominal = $siswaCek[0]->spp->nominal;

    $forDisable = Pembayaran::where('siswa_id', $siswaCek[0]->id)
        ->where('status', 'sukses')
        ->get();
@endphp

<label for="siswa_id" class="mb-1 fw-semibold">Nama Siswa</label>
<input type="text" value="{{ old('namasiswa', $siswaCek[0]->name . ' - ' . $siswaCek[0]->kelas->name) }}"
    name="siswa_id" class="text-black input-sm form form-control mt-0  @error('siswa_id') is-invalid @enderror"
    placeholder="Masukkan siswa_id siswa" readonly disabled>

<div class="d-none">
  <label for="tanggalbayar" class="mb-1 mt-3 fw-semibold">Tanggal Bayar</label>
<input type="date" value="{{ old('tanggalbayar') }}" name="tanggalbayar" id="tanggalbayar"
    class="text-black input-sm form form-control mt-0  @error('tanggalbayar') is-invalid @enderror"
    placeholder="Masukkan nomor tanggalbayar siswa">
@error('tanggalbayar')
    <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror
</div>

<label for="bulanbayar_id" class="mb-1 mb-1 mt-3 fw-semibold">Pembayaran untuk</label>
<div id="bulan">
<div class="input-group">
  <select name="pembayaranuntuk[]" class="form-select text-black mt-0" id="bulanbayar_id" aria-label="Example select with button addon" required>
    <option value="" selected disabled>-- Pilih bulan dan tahun dibayar --</option>

    @foreach ($bulanbayar1 as $tampilkan)
        
        <option value="{{ $tampilkan->id }}-{{ $tahunbayar1 }}"
              @foreach ($forDisable as $item)
                @if ($tampilkan->id . $tahunbayar1 == $item->bulanbayar_id . $item->tahunbayar)
                  disabled @class(['bg-success'=> true]) 
                @endif
                {{-- @if ($forDisable[count($forDisable)-1]->bulanbayar_id + 1 . $item->tahunbayar == $tampilkan->id . $tahunbayar1)
                  selected
                @endif --}}
              @endforeach
          > {{ $tampilkan->name }} - {{ $tahunbayar1 }}</option>
    @endforeach
    

    @foreach ($bulanbayar2 as $tampilkan)
        <option value="{{ $tampilkan->id }}-{{ $tahunbayar2 }}"
            @foreach ($forDisable as $item)
              @if ($tampilkan->id . $tahunbayar2 == $item->bulanbayar_id . $item->tahunbayar)
                disabled @class(['bg-success'=> true])
              @endif 
              {{-- @if ($forDisable[count($forDisable)-1]->bulanbayar_id + 1 . $item->tahunbayar == $tampilkan->id . $tahunbayar2)
                selected
              @endif --}}
            @endforeach
           
        > {{ $tampilkan->name }} - {{ $tahunbayar2 }}</option>
    @endforeach

    @foreach ($bulanbayar3 as $tampilkan)
        <option value="{{ $tampilkan->id }}-{{ $tahunbayar3 }}"
            @foreach ($forDisable as $item)
              @if ($tampilkan->id . $tahunbayar3 == $item->bulanbayar_id . $item->tahunbayar)
                disabled @class(['bg-success'=> true])
              @endif 
              {{-- @if ($forDisable[count($forDisable)-1]->bulanbayar_id + 1 . $item->tahunbayar == $tampilkan->id . $tahunbayar3)
                selected
              @endif --}}
            @endforeach
           
        > {{ $tampilkan->name }} - {{ $tahunbayar3 }} </option>
    @endforeach

    @foreach ($bulanbayar4 as $tampilkan)
        <option value="{{ $tampilkan->id }}-{{ $tahunbayar4 }}"
          @foreach ($forDisable as $item)
            @if ($tampilkan->id . $tahunbayar4 == $item->bulanbayar_id . $item->tahunbayar)
              disabled @class(['bg-success'=> true])
            @endif 
            {{-- @if ($forDisable[count($forDisable)-1]->bulanbayar_id + 1 . $item->tahunbayar == $tampilkan->id . $tahunbayar4)
              selected
            @endif --}}
          @endforeach
          
        > {{ $tampilkan->name }} - {{ $tahunbayar4 }}</option>
    @endforeach
  </select>
  <button class="btn btn-primary" type="button" id="add-input" onclick="tambahNilaiInput()">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 bi bi-plus-square-fill" viewBox="0 0 16 16">
      <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
    </svg>
  </button>
</div>
</div>

<label for="jumlahbayar" class="mb-1 mt-3 fw-semibold">Jumlah Bayar</label>
<input type="text" id="jumlahbayar" value="{{ $nominal }}" name=""
    class="text-black input-sm form form-control mt-0 @error('siswa_id') is-invalid @enderror"
    placeholder="Masukkan siswa_id siswa" readonly disabled>

<input type="hidden" name="petugas_id" value="{{ auth()->user()->id }}">
<input type="hidden" name="siswa_id" value="{{ $siswaCek[0]->id }}">
<input type="hidden" name="jumlahbayar" value="{{ $siswaCek[0]->spp->nominal }}">
<input type="hidden" name="metodepembayaran_id" value="8">
<input type="hidden" name="status" value="sukses">
<input type="hidden" name="jenistransaksi" value="petugas">

<script src="/my-js/jquery.js"></script>


<script>
  function ubahNilaiInput() {

  // Mengambil referensi elemen input dengan ID "jumlah"
  let inputElement = document.getElementById("jumlahbayar");
  
  inputElement.value =  * 2;
}
</script>

<script>
  function tambahNilaiInput() {
  let inputElement = document.getElementById("jumlahbayar");
  let nilaiInput = parseInt(inputElement.value);
  nilaiInput += {{ $nominal }};
  inputElement.value = nilaiInput.toString();
}
</script>

<script>
  function kurangiNilaiInput() {
  let inputElement = document.getElementById("jumlahbayar");
  let nilaiInput = parseInt(inputElement.value);
  nilaiInput -= {{ $nominal }};
  inputElement.value = nilaiInput.toString();
}
</script>

<script>
var inputWrapper =

'<div class="input-group mt-2">'+
  '<select name="pembayaranuntuk[]" class="form-select text-black mt-0" id="bulanbayar_id" aria-label="Example select with button addon" required>'+
    '<option value="" selected disabled>-- Pilih bulan dan tahun dibayar --</option>'+
    '@foreach ($bulanbayar1 as $tampilkan)'+
        '<option value="{{ $tampilkan->id }}-{{ $tahunbayar1 }}"'+
              '@foreach ($forDisable as $item)'+
                '@if ($tampilkan->id . $tahunbayar1 == $item->bulanbayar_id . $item->tahunbayar)'+
                  'disabled @class(['bg-success'=> true]) '+
                '@endif  '+
              '@endforeach'+
          '> {{ $tampilkan->name }} - {{ $tahunbayar1 }}</option>'+
    '@endforeach'+
    '@foreach ($bulanbayar2 as $tampilkan)'+
        '<option value="{{ $tampilkan->id }}-{{ $tahunbayar2 }}"'+
            '@foreach ($forDisable as $item)'+
              '@if ($tampilkan->id . $tahunbayar2 == $item->bulanbayar_id . $item->tahunbayar)'+
                'disabled @class(['bg-success'=> true])'+
              '@endif '+
            '@endforeach'+
        '> {{ $tampilkan->name }} - {{ $tahunbayar2 }}</option>'+
    '@endforeach'+
    '@foreach ($bulanbayar3 as $tampilkan)'+
        '<option value="{{ $tampilkan->id }}-{{ $tahunbayar3 }}"'+
            '@foreach ($forDisable as $item)'+
              '@if ($tampilkan->id . $tahunbayar3 == $item->bulanbayar_id . $item->tahunbayar)'+
                'disabled @class(['bg-success'=> true])'+
              '@endif '+
            '@endforeach'+
        '> {{ $tampilkan->name }} - {{ $tahunbayar3 }} </option>'+
    '@endforeach'+
    '@foreach ($bulanbayar4 as $tampilkan)'+
        '<option value="{{ $tampilkan->id }}-{{ $tahunbayar4 }}"'+
          '@foreach ($forDisable as $item)'+
            '@if ($tampilkan->id . $tahunbayar4 == $item->bulanbayar_id . $item->tahunbayar)'+
              'disabled @class(['bg-success'=> true])'+
            '@endif '+
          '@endforeach'+
        '> {{ $tampilkan->name }} - {{ $tahunbayar4 }}</option>'+
    '@endforeach'+
  '</select>'+
  '<button class="btn btn-danger remove-input" type="button" onclick="kurangiNilaiInput()">'+
    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi mb-1 bi-trash-fill" viewBox="0 0 16 16">'+
  '<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>'+
'</svg>'+
    '</button>'+
'</div>'
;

$('#add-input').click(function() {
    $('#bulan').append(inputWrapper);
});

$('#bulan').on('click', '.remove-input', function() {
    $(this).parent().remove();
});

</script>

<script>
  let today = new Date();
  let formattedDate = today.toISOString().substr(0, 10);
  let tanggalInput = document.getElementById("tanggalbayar");
  tanggalInput.value = formattedDate;
</script>
