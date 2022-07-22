@extends('layout')

@section('title',"create jurusan")
@section('main')
    {{-- ini main --}}
    <h1 class="text-capitalize mb-2">create kelas </h1>
   <form action="/admin/kelas" method="POST">
    @csrf
    <div class="mb-3 p-2">
        <label for="tingkatan" class="form-label text-capitalize">tingkatan</label>
        <select name="tingkatan" id="tingkatan" class="@error('tingkatan') is-invalid @enderror cursor form-select">
            <option value="" disabled selected>Pilih Tingkatan Siswa</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
         @error('tingkatan')
        <small class="  text-danger">{{$message}}</small>
         @enderror
      </div>
      <div class="mb-3 p-2">
        <label for="jurusan" class="form-label text-capitalize">jurusan</label>
        <select name="jurusan" id="jurusan" class="@error('jurusan') is-invalid @enderror cursor form-select">
            <option class="" value="" disabled selected>Pilih Jurusan Siswa</option>
            @foreach ($data as $jurusan)
            <option class=" text-capitalize" value="{{$jurusan->id}}">{{$jurusan->nama_jurusan}}</option>            
            @endforeach
        </select>
         @error('jurusan')
        <small class="  text-danger">{{$message}}</small>
    @enderror
      </div>
  <button type="submit" class="btn btn-main-color">Simpan</button>
  <a href="{{ url()->previous() }}" type="button" class="btn btn-danger">Batal</a>
</form>

@endsection