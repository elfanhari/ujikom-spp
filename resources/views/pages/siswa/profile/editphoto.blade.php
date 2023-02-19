@extends('master.siswa.main')

@section('content')

<h5 class="mb-3 fw-bold poppins">
  <button class="btn btn-sm btn-outline-dark me-2" onclick="history.back()">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi fw-bold bi-arrow-left"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
              d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
      </svg>
  </button> Foto profil saya</h5>

    @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @include('_success')
            <strong>Berhasil.</strong> {{ session('info') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">

          @if ($userphoto->count() > 0)
  
          <div class="table-responsive">
            <table class="table table-border table-hover mt-xs-2">

              <tr class="text-center table-secondary">
                <td>Foto</td>
                <td>Aksi</td>
              </tr>
              @foreach ($userphoto as $tampilkan)
                <tr>
                  <td class="text-center"><img src="/gallery/{{ $tampilkan->url }}" alt="" style="width: 120px" class="rounded-circle"></td>
                  <td style="text-align: center; vertical-align: middle;">
                  
                  <span>
                    <form action="{{ route('photo-siswa.delete', $tampilkan->id) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <input type="hidden" name="user_id" value="{{ $tampilkan->user_id }}">
                      <input type="hidden" name="picture" value="{{ $tampilkan->url }}">
                      <button class="btn btn-danger btn-sm mx-2" onclick="return confirm('Apakah data tersebut akan dihapus?')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                        </svg>                                    
                      </button>
                    </form>
                  </span>
                  </td>
                </tr>
              @endforeach
            </table>
          </div>
          <small class="fs-12"> <i>Ganti foto user</i></small>
          <form action="{{ route('photo-siswa.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="">
              <div class="my-2">
                <img class="img-preview img-fluid mb-2 col-sm-6 rounded-circle oferflow-y-hidden" style="max-width: 200px;">
              </div>
                <div class="input-group mb-3">
                  <input type="hidden" name="user_id" value="{{ $user->id }}">
                  <input type="file" accept="image/*" class="form-control @error('files') is-invalid @enderror" name="files" id="gambar" onchange="previewImage()">
                  <button type="submit" class="input-group-text btn-primary" for="inputGroupFile02" >Upload</button>
                  @error('files')
                    <span class="invalid-feedback mt-1">{{ $message }}</span>
                  @enderror
                </div>
            </div>
            @foreach ($userphoto as $tampilkan)
              <input type="hidden" name="picture" value="{{ $tampilkan->url }}">
            @endforeach

            </form>
          
          @else 

          <small class="fs-12"> <i>Upload foto user</i></small>
          <form action="{{ route('photo-siswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="">
              <div class="my-2">
                <img class="img-preview img-fluid mb-2 col-sm-6 rounded-circle" style="max-width: 200px">
              </div>
                <div class="input-group mb-3">
                  <input type="hidden" name="user_id" value="{{ $user->id }}">
                  <input type="file" accept="image/*" class="form-control @error('files') is-invalid @enderror" name="files" id="gambar" onchange="previewImage()">
                  <button type="submit" class="input-group-text btn-primary" for="inputGroupFile02" >Upload</button>
                  @error('files')
                    <span class="invalid-feedback mt-1">{{ $message }}</span>
                  @enderror
                </div>
            </div>
            </form>

          @endif 
        </div>
    </div>

    <script>
        var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
        var collapseList = collapseElementList.map(function(collapseEl) {
            return new bootstrap.Collapse(collapseEl)
        })
    </script>

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

@endsection
