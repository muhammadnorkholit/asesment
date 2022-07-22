@extends('layout')

@section('title',"Dashboard Admin")
@section('main')
    {{-- ini main --}}

<div class="container">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-code-fork"></i>
        <span class="count-numbers">{{$jurusanCount}}</span>
        <span class="count-name">jurusan</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa-solid fa-users-line"></i>
        <span class="count-numbers">{{$guruCount}}</span>
        <span class="count-name">guru</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fa fa-users"></i>
        <span class="count-numbers">{{$siswaCount}}</span>
        <span class="count-name">siswa</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa-solid fa-users-rectangle"></i>
        <span class="count-numbers">{{$kelasCount}}</span>
        <span class="count-name">kelas</span>
      </div>
    </div>
    
    <div class="col-md-3">
      <div class="card-counter info bg-warning">
        <i class="fa-solid fa-book"></i>
        <span class="count-numbers">{{$mapelCount}}</span>
        <span class="count-name">mapel</span>
      </div>
    </div>
  </div>
</div>


@endsection