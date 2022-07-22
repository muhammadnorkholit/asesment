@extends('layout')

@section('title',"create mapel")
@section('main')
    {{-- ini main --}}
    <h1 class="text-capitalize mb-2">create mapel </h1>
   <form action="/admin/mapel" method="POST">
    @csrf
  <div class="mb-3">
    <label for="mapel" class="form-label text-capitalize">nama mapel</label>
    <input type="text" class="form-control @error('mapel') is-invalid @enderror" name="mapel" value="{{old("mapel")}}" id="mapel" aria-describedby="emailHelp">
    @error('mapel')
    <small class=" text-danger">{{$message}}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-main-color">Simpan</button>
  <a href="{{ url()->previous() }}" type="button" class="btn btn-danger">Batal</a>
</form>

@endsection