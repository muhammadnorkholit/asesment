@extends('layout')

@section('title',"Dashboard Admin")
@section('main')
    {{-- ini main --}}
    <h1 class="text-capitalize mb-2">create account siswa</h1>
   <form action="/admin/siswa" method="POST">
    @csrf
  <div class="mb-3">
    <label for="nama" class="form-label text-capitalize">nama lengkap</label>
    <input value="{{old("nama")}}" type="text" name="nama" class="form-control  @error('nama') is-invalid @enderror" id="nama" aria-describedby="emailHelp">
    @error('nama')
        <small class="  text-danger">{{$message}}</small>
    @enderror
  </div>

  <div class="mb-3">
    <label for="nisn" class="form-label text-capitalize">nisn</label>
    <input value="{{old("nisn")}}" type="number" name="nisn" class="form-control  @error('nisn') is-invalid @enderror" id="nisn">
     @error('nisn')
        <small class="  text-danger">{{$message}}</small>
    @enderror
  </div>
  
  <div class="mb-3">
    <label for="username" class="form-label text-capitalize">username</label>
    <input value="{{old("username")}}" type="text" name="username" class="form-control  @error('username') is-invalid @enderror" id="username">
     @error('username')
        <small class="  text-danger">{{$message}}</small>
    @enderror
  </div>

  <div class="mb-3">
    <label for="password" class="form-label text-capitalize">Password</label>
    <input value="{{old("password")}}" type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="password">
     @error('password')
        <small class="  text-danger">{{$message}}</small>
    @enderror
  </div>

  {{-- <div class="d-flex"> --}}
      <div class="mb-3 p-2">
        <label for="kelas" class="form-label text-capitalize">kelas</label>
        <select name="kelas" id="kelas" class="@error('kelas') is-invalid @enderror cursor form-select">
            <option class="" value="" disabled selected>Pilih kelas Siswa</option>
            @foreach ($data as $kelas)
            {{-- {{dd($data)}} --}}
            <option class=" text-capitalize" value="{{$kelas->id}}">{{$kelas->tingkatan}} {{$kelas->nama_jurusan}}</option>            
            @endforeach
        </select>
         @error('kelas')
        <small class="  text-danger">{{$message}}</small>
    @enderror
      </div>
  {{-- </div> --}}

  <button type="submit" class="btn btn-main-color">Simpan</button>
  <a href="{{ url()->previous() }}" type="button" class="btn btn-danger">Batal</a>
</form>

@endsection