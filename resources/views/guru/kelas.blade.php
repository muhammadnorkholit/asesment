@extends('layout')

@section('title',"guru")
@section('main')
    {{-- ini main --}}
    <h1 class="mb-5 text-capitalize fw-bold">pilih kelas</h1>

       <ul class="list-group  list-group-horizontal-lg gx-5 flex-wrap rounded-1">
     @foreach ($data as $kelas)
        
         <li class="col-lg-5 col-12 mx-1 list-group-item mb-2 p-0 list-mapel-hover rounded-0 bg-main-color " style="border: var(--bs-list-group-border-width) solid var(--bs-list-group-border-color);">
          <a href="{{url()->full()}}/kelas/{{$kelas->id}}" class="nav-link text-capitalize d-block" style="padding:var(--bs-list-group-item-padding-y) var(--bs-list-group-item-padding-x);">{{$kelas->tingkatan}} {{$kelas->nama_jurusan}}</a>
        </li>
        @endforeach 
</ul>
<hr>

@endsection