@extends('layout')

@section('title',"create jurusan")
@section('main')
    {{-- ini main --}}
    <h1 class="text-capitalize mb-2">create jurusan </h1>
   <form action="/admin/jurusan" method="POST">
    @csrf
  <div class="mb-3">
    <label for="jurusan" class="form-label text-capitalize">nama jurusan</label>
    <input type="text" class="form-control" name="jurusan" value="{{old("jurusan")}}" id="jurusan" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-main-color">Simpan</button>
  <a href="{{ url()->previous() }}" type="button" class="btn btn-danger">Batal</a>
</form>

@endsection