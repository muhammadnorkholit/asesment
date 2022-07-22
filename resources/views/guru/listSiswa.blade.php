@extends('layout')

@section('title',"guru")
@section('main')
    {{-- ini main --}}
    <h1 class="mb-5 text-capitalize fw-bold">daftar siswa</h1>

        <ul class="list-group ">
            @foreach ($data as $item)
            @if ($loop->first)
            <li class="text-capitalize list-group-item active">{{$item->nama_mapel}} ( {{$item->list}} )</li>
            @endif
            <ul class="list-group list-group-numbered">
            <li class="text-capitalize list-group-item">{{$item->nama_siswa}}</li>
            </ul>
            @endforeach
</ul>
<hr>

@endsection