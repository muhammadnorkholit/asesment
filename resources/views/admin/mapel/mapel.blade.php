@extends('layout')

@section('title',"Dashboard Admin | Mapel")
@section('main')
    {{-- ini main --}}


     <div class="d-flex">
        <a href="/admin/mapel/create" class=" btn btn-main-color mb-3 ms-auto"><i class="fa fa-plus"></i> Add</a>
    </div>


    <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr class=" bg-main-color text-white">
                <th class=" ps-2" style="width:14px;">No</th>
                <th class=" ps-2">Nama Mapel</th>
                <th style="width: 100px"    class=" ps-2">Action</th>
                {{-- <th class=" ps-2">Kelas</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($data as $mapel)
            <tr>
                <td class="ps-2">{{$no++}}</td>
                <td class="ps-2 text-capitalize">{{$mapel->nama_mapel}}</td>
                <td  class="ps-2" style="width: 100px"> <a href="/admin/mapel/{{$mapel->id}}/edit" class=" btn btn-success"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection