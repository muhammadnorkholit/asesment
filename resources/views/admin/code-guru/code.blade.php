@extends('layout')

@section('title',"Dashboard Admin | Guru")
@section('main')
    {{-- ini main --}}

    <div class="d-flex">
        <a href="/admin/code-guru/create" class=" btn btn-main-color mb-3 ms-auto"><i class="fa-solid fa-user-plus"></i> Add</a>
    </div>


    <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr class=" bg-main-color text-white">
                <th class=" ps-2" style="width:14px;">No</th>
                <th class=" ps-2">Code Guru</th>
                <th class=" ps-2">Nama Guru</th>
                <th class=" ps-2">Mapel</th>
                {{-- <th class=" ps-2">Kelas Ajar</th> --}}
                <th class=" ps-2">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $codeGuru)
            <tr>
                <td class=" text-capitalize">{{$no++}}</td>
                <td class=" text-capitalize">{{$codeGuru->code}}</td>
                <td class=" text-capitalize">{{$codeGuru->nama_guru}}</td>
                <td class=" text-capitalize">{{$codeGuru->nama_mapel}}</td>
                {{-- <td style="width:100px" class=" text-capitalize"> <a href="/admin/code-guru/{{$codeGuru->id}}/edit" class=" btn  btn-success"><i class="fa fa-edit"></i> Edit</a></td> --}}
                <td style="width:100px" class=" text-capitalize"> <a href="/admin/code-guru/{{$codeGuru->id}}/edit" class=" btn  btn-success"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection