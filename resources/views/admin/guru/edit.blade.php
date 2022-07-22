@extends('layout')

@section('title',"Dashboard Admin")
@section('main')
    {{-- ini main --}}
    <h1 class="text-capitalize mb-2">create account guru</h1>
   <form action="/admin/guru/{{$data->id}}" method="POST">
    @method('PUT')
    @csrf
  <div class="mb-3">
    <label for="nama" class="form-label text-capitalize">nama lengkap</label>
    <input value="{{$data->nama_guru}}" type="text" name="nama" class="form-control  @error('nama') is-invalid @enderror" id="nama" aria-describedby="emailHelp">
    @error('nama')
        <small class="  text-danger">{{$message}}</small>
    @enderror
  </div>

  <div class="mb-3">
    <label for="nip" class="form-label text-capitalize">nip</label>
    <input value="{{$data->nip}}" type="number" name="nip" class="form-control  @error('nip') is-invalid @enderror" id="nip">
     @error('nip')
        <small class="  text-danger">{{$message}}</small>
    @enderror
  </div>
  
  <div class="mb-3">
    <label for="username" class="form-label text-capitalize">username</label>
    <input value="{{$data->username}}" type="text" name="username" class="form-control  @error('username') is-invalid @enderror" id="username">
     @error('username')
        <small class="  text-danger">{{$message}}</small>
    @enderror
  </div>


  <button type="submit" class="btn btn-main-color">Simpan</button>
  <a href="{{ url()->previous() }}" type="button" class="btn btn-danger">Batal</a>
</form>

@endsection