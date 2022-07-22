@extends('layout')

@section('title',"create jurusan")
@section('main')
    {{-- ini main --}}
    <h1 class="text-capitalize mb-2">create jurusan </h1>
   <form action="/admin/code-guru" method="POST">
    @csrf
  <div class="mb-3">
    <label for="jurusan" class="form-label text-capitalize">code guru</label>
    <input type="text" class="form-control" name="code" value="{{old("jurusan")}}" id="jurusan" aria-describedby="emailHelp">
    @error('code')
        <small class=" text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="guru" class="form-label text-capitalize"> guru</label>
    <select name="guru" id="" class=" form-select">
      <option value="" selected disabled>select guru</option>
      @foreach ($guru as $item)
      <option value="{{$item->id}}">{{$item->nama_guru}}</option>
      @endforeach
    </select>
     @error('guru')
        <small class=" text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="mapel" class="form-label text-capitalize"> mapel</label>
    <select name="mapel" id="" class=" form-select">
      <option value="" selected disabled>select mapel</option>
      @foreach ($mapel as $item)
      <option value="{{$item->id}}">{{$item->nama_mapel}}</option>
      @endforeach
    </select>
     @error('mapel')
        <small class=" text-danger">{{$message}}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-main-color">Simpan</button>
  <a href="{{ url()->previous() }}" type="button" class="btn btn-danger">Batal</a>
</form>

@endsection