@extends('layout')

@section('title',"Dashboard Admin")
@section('main')
    {{-- ini main --}}


     <div class="d-flex">
        <a href="/admin/jurusan/create" class=" btn btn-main-color mb-3 ms-auto"><i class="fa fa-plus"></i> Add</a>
    </div>


    <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr class=" bg-main-color text-white">
                <th class=" ps-2" style="width:14px;">No</th>
                <th class=" ps-2">Nama Jurusan</th>
                <th class=" ps-2">Action</th>
                {{-- <th class=" ps-2">Kelas</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($data as $jurusan)
            <tr>
                <td class="ps-2">{{$no++}}</td>
                <td class="ps-2 text-capitalize">{{$jurusan->nama_jurusan}}</td>
                <td class="ps-2" style="width: 100px"> <a href="/admin/jurusan/{{$jurusan->id}}/edit" class=" btn btn-success"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection