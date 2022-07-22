@extends('layout')

@section('title',"guru")
@section('main')
    {{-- ini main --}}
    <h1 class="mb-5 text-capitalize fw-bold">detail</h1>

       <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr class=" bg-main-color text-white">
                <th class=" ps-2" style="width:14px;">No</th>
                <th class=" ps-2">Nama Siswa</th>
                {{-- <th class=" ps-2">Username</th> --}}
                @foreach ($list as $siswa)
                    <th class=" text-capitalize ps-2">{{$siswa->list}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $siswa)
            <tr>
            <td>{{$no++}}</td>
            
             <td class=" text-capitalize">{{$siswa->nama_siswa}}</td>
            @php $dd = [] @endphp
                @foreach ($check as $asesment)
                    @if($siswa->id == $asesment->siswa_id)
                        @php $dd[] = $asesment->list; @endphp
                    @endif
                @endforeach

                {{-- {{dd($dd)}} --}}
            @foreach ($list as $siswa)
                @if (in_array($siswa->list, $dd))
                    <td><i class="fa fa-check text-success"></i></td>
                @else
                <td><i class="fa fa-close text-danger"></i></td>
                    
                @endif
            @endforeach
            </tr>
                
            @endforeach
        </tbody>
    </table>

@endsection