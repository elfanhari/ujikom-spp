@extends('master.siswa.main')

@section('content')
    
<div class="d-flex justify-content-between align-items-center gap-3">
  <h4 class="title-section-content">Profil saya</h4>
  {{-- <a href="#" class="btn-link">View All Shoes</a> --}}
</div>

<form action="{{ route('logout') }}" method="POST">
@csrf
<button class="btn btn-primary btn-sm">Logout</button>
</form>

@endsection