<div class="form-floating mb-3">
    <input type="text"
        value="{{ old('name', $pembayaran->userSiswa->name) }} - {{ $pembayaran->userSiswa->kelas->name }}"
        class="form-control text-black @error('name') is-invalid @enderror fw-semibold" id="floatingInput"
        placeholder="name" readonly disabled>
    <label for="floatingInput" class="">Nama Siswa</label>
    @error('name')
        <span class="invalid-feedback mt-1 ">{{ $message }}</span>
    @enderror
</div>

<div class="form-floating mb-3">
    <input type="date" value="{{ old('tanggalbayar', $pembayaran->tanggalbayar) }}" name="tanggalbayar"
        class="form-control text-black @error('tanggalbayar') is-invalid @enderror fw-semibold" id="floatingInput"
        placeholder="tanggalbayar" readonly>
    <label for="floatingInput" class="">Tanggal Bayar</label>
    @error('tanggalbayar')
        <span class="invalid-feedback mt-1 ">{{ $message }}</span>
    @enderror
</div>

<div class="form-floating mb-3">
    <select name="bulanbayar_id" class="form-select fw-semibold @error('bulanbayar_id') is-invalid @enderror" id="floatingSelect"
        aria-label="Floating label select example" disabled readonly>
        <option value="" selected disabled>-- Pilih --</option>
        @foreach ($bulanbayar as $tampilkan)
            <option value="{{ $tampilkan->id }}" {{ $tampilkan->id == $pembayaran->bulanbayar_id ? 'selected' : '' }}>
                {{ $tampilkan->name }}</option>
        @endforeach
    </select>
    <label for="floatingSelect">Pembayaran untuk bulan</label>
    @error('bulanbayar_id')
        <span class="invalid-feedback mt-1">{{ $message }}</span>
    @enderror
</div>

<div class="form-floating mt-3 mb-3">
    <input type="text" value="{{ old('jumlahbayar', $pembayaran->tahunbayar) }}" name="tahunbayar"
        class="form-control text-black @error('tahunbayar') is-invalid @enderror fw-semibold" id="floatingInput"
        placeholder="tahunbayar" disabled readonly>
    <label for="floatingInput" class="">Pembayaran untuk tahun</label>
    @error('tahunbayar')
        <span class="invalid-feedback mt-1 ">{{ $message }}</span>
    @enderror
</div>

<div class="form-floating mt-3 mb-3">
    <input type="text" value="Rp{{ number_format($pembayaran->jumlahbayar, 0, '.', '.') }}"
        class="form-control text-black @error('jumlahbayar') is-invalid @enderror fw-semibold" id="floatingInput"
        placeholder="jumlahbayar" readonly>
    <label for="floatingInput" class="">Nominal bayar</label>
    @error('jumlahbayar')
        <span class="invalid-feedback mt-1 ">{{ $message }}</span>
    @enderror
</div>


<div class="form-floating">
    <select name="status" class="form-select fw-semibold @error('status') is-invalid @enderror" id="floatingSelect"
        aria-label="Floating label select example">
        <option value="" disabled>-- Pilih --</option>
        <option value="sukses" {{ $pembayaran->status == 'sukses' ? 'selected' : '' }}>SUKSES</option>
        <option value="diproses" {{ $pembayaran->status == 'diproses' ? 'selected' : '' }}>DIPROSES</option>
        <option value="gagal" {{ $pembayaran->status == 'gagal' ? 'selected' : '' }}>GAGAL</option>
    </select>
    <label for="floatingSelect">Status Pembayaran</label>
    @error('status')
        <span class="invalid-feedback mt-1">{{ $message }}</span>
    @enderror
</div>

<input type="hidden" name="petugas_id" value="{{ $pembayaran->userPetugas->id }}">
<input type="hidden" name="siswa_id" value="{{ $pembayaran->userSiswa->id }}">
<input type="hidden" name="identifier" value="{{ $pembayaran->identifier }}">
<input type="hidden" name="jumlahbayar" value="{{ $pembayaran->jumlahbayar }}">
