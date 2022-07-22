@extends('layout')

@section('title',"Dashboard Admin")
@section('main')
    {{-- ini main --}}
    <h1 class="text-capitalize mb-2">create account siswa</h1>
   <form action="/admin/siswa/{{$data->id}}" method="POST">
    @method('PUT')

    @csrf
  <div class="mb-3">
    <label for="nama" class="form-label text-capitalize">nama lengkap</label>
    <input value="{{$data->nama_siswa}}" type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
    @error('nama')
        <small class="  text-danger">{{$message}}</small>
    @enderror
  </div>

  <div class="mb-3">
    <label for="nisn" class="form-label text-capitalize">nisn</label>
    <input value="{{$data->nisn}}" type="number" name="nisn" class="form-control" id="nisn">
     @error('nisn')
        <small class="  text-danger">{{$message}}</small>
    @enderror
  </div>
  
  <div class="mb-3">
    <label for="username" class="form-label text-capitalize">username</label>
    <input value="{{$data->username}}" type="text" name="username" class="form-control" id="username">
     @error('username')
        <small class="  text-danger">{{$message}}</small>
    @enderror
  </div>

  {{-- <div class="mb-3">
    <label for="password" class="form-label text-capitalize">Password</label>
    <input value="{{$data->password}}" type="password" name="password" class="form-control" id="password">
     @error('password')
        <small class="  text-danger">{{$message}}</small>
    @enderror
  </div> --}}

  <div class="d-flex">
      <div class="mb-3 col-md-6 col-12 p-2">
        <label for="jurusan" class="form-label text-capitalize">jurusan</label>
        <select name="kelas" id="kelas" class=" form-select">
            <option class="" value="" disabled selected>Pilih Jurusan Siswa</option>
            @foreach ($jurusan as $dj)
            <option class=" text-capitalize" {{$data->id_kelas == $dj->id ? 'selected' :''}} value="{{$dj->id}}">{{$dj->tingkatan}} {{$dj->nama_jurusan}}</option>            
            @endforeach
        </select>
         @error('jurusan')
        <small class="  text-danger">{{$message}}</small>
    @enderror
      </div>
  </div>

  <button type="submit" class="btn btn-main-color">Simpan</button>
  <a href="{{ url()->previous() }}" type="button" class="btn btn-danger">Batal</a>
</form>

@endsection