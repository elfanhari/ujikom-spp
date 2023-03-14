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
    
    $forDisable = Pembayaran::where('siswa_id', $siswaCek[0]->id)
        ->where('status', 'sukses')
        ->get();
@endphp

<label for="siswa_id" class="mb-1 fw-semibold">Nama Siswa</label>
<input type="text" value="{{ old('namasiswa', $siswaCek[0]->name . ' - ' . $siswaCek[0]->kelas->name) }}"
    name="siswa_id" class="text-black input-sm form form-control mt-0  @error('siswa_id') is-invalid @enderror"
    placeholder="Masukkan siswa_id siswa" readonly disabled>

<label for="tanggalbayar" class="mb-1 mt-3 fw-semibold">Tanggal Bayar</label>
<input type="date" value="{{ old('tanggalbayar') }}" name="tanggalbayar" id="tanggalbayar"
    class="text-black input-sm form form-control mt-0  @error('tanggalbayar') is-invalid @enderror"
    placeholder="Masukkan nomor tanggalbayar siswa">
@error('tanggalbayar')
    <span class="invalid-feedback mt-1">{{ $message }}</span>
@enderror

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

<label for="jumlahbayar" class="mb-1 mt-3 fw-semibold">Jumlah Bayar</label>
<input type="text" value="Rp{{ number_format($siswaCek[0]->spp->nominal, 0, '.', '.') }}" name=""
    class="text-black input-sm form form-control mt-0 @error('siswa_id') is-invalid @enderror"
    placeholder="Masukkan siswa_id siswa" readonly disabled>

<input type="hidden" name="petugas_id" value="{{ auth()->user()->id }}">
<input type="hidden" name="siswa_id" value="{{ $siswaCek[0]->id }}">
<input type="hidden" name="jumlahbayar" value="{{ $siswaCek[0]->spp->nominal }}">
<input type="hidden" name="metodepembayaran_id" value="8">
<input type="hidden" name="status" value="sukses">
<input type="hidden" name="jenistransaksi" value="petugas">