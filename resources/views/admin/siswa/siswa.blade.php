@extends('layout')

@section('title',"Dashboard Admin | Siswa")
@section('main')
    {{-- ini main --}}

    <div class="d-flex">
        <a href="/admin/siswa/create" class=" btn btn-main-color mb-3 ms-auto"><i class="fa-solid fa-user-plus"></i> Add</a>
    </div>

    <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr class=" bg-main-color text-white">
                <th class=" ps-2" style="width:14px;">No</th>
                <th class=" ps-2">Nama Siswa</th>
                <th class=" ps-2">Nisn</th>
                <th class=" ps-2">Kelas</th>
                <th class=" ps-2">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $siswa)
            <tr>
                <td class=" text-capitalize">{{$no++}}</td>
                <td class=" text-capitalize">{{$siswa->nama_siswa}}</td>
                <td class=" text-capitalize">{{$siswa->nisn}}</td>
                <td class=" text-capitalize">{{$siswa->tingkatan}} {{$siswa->nama_jurusan}}</td>
                <td class=" text-capitalize"> <a href="/admin/siswa/{{$siswa->id}}/edit" class=" btn  btn-success"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection