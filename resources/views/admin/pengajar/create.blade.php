@extends('layout')

@section('title',"create jurusan")
@section('main')
    {{-- ini main --}}
    <h1 class="text-capitalize mb-2">create pengajar kelas </h1>
   <form action="/admin/pengajar" method="POST">
    @csrf
    <div class="mb-3">
      <label for="guru" class="form-label text-capitalize"> guru</label>
      <select name="guru" id="" class=" form-select">
        <option value="" selected disabled>select guru</option>
        @foreach ($guru as $item)
        <option value="{{$item->id}}">{{$item->nama_guru}} ( {{$item->nama_mapel}} )</option>
        @endforeach
      </select>
       @error('mapel')
          <small class=" text-danger">{{$message}}</small>
      @enderror
    </div>
  <div class="mb-3">
    <label for="kelas" class="form-label text-capitalize"> kelas</label>
    <select name="kelas" id="" class=" form-select">
      <option value="" selected disabled>select kelas</option>
      @foreach ($kelas as $item)
      <option value="{{$item->id}}">{{$item->tingkatan}} {{$item->nama_jurusan}}</option>
      @endforeach
    </select>
     @error('kelas')
        <small class=" text-danger">{{$message}}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-main-color">Simpan</button>
  <a href="{{ url()->previous() }}" type="button" class="btn btn-danger">Batal</a>
</form>

@endsection