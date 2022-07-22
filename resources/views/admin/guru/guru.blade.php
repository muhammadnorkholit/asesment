@extends('layout')

@section('title',"Dashboard Admin | Guru")
@section('main')
    {{-- ini main --}}

    <div class="d-flex">
        <a href="/admin/guru/create" class=" btn btn-main-color mb-3 ms-auto"><i class="fa-solid fa-user-plus"></i> Add</a>
    </div>


    <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr class=" bg-main-color text-white">
                <th class=" ps-2" style="width:14px;">No</th>
                <th class=" ps-2">Nama Guru</th>
                {{-- <th class=" ps-2">Username</th> --}}
                <th class=" ps-2">Nip</th>
                <th class=" ps-2">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $guru)
            <tr>
                <td class=" text-capitalize">{{$no++}}</td>
                <td class=" text-capitalize">{{$guru->nama_guru}}</td>
                {{-- <td class=" text-capitalize">{{$guru->username}}</td> --}}
                <td class=" text-capitalize">{{$guru->nip}}</td>
                <td style="width:100px" class=" text-capitalize"> <a href="/admin/guru/{{$guru->id}}/edit" class=" btn  btn-success"><i class="fa fa-edit"></i> Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection