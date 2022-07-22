@extends('layout')

@section('title',"Home")
@section('main')
    {{-- ini main --}}
    {{-- <a href="{{ url()->previous() }}">back</a> --}}
     @if ($errors->any()) 
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
              @foreach ($errors->all() as $error)
                <strong>{{$error }}</strong> 
                
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
              @endforeach
      </div>
      @endif

    <h1 class="mb-5 text-capitalize fw-bold">pilih bab</h1>
    <form action="{{url()->current()}}" method="post">
      @csrf
    <ul class="list-group  gx-5 flex-wrap rounded-1">
@foreach ($data as $list)
<label >
  <li class="list-group-item text-capitalize mb-2 border user-select-none ">
    <input class=" cursor form-check-input me-1" type="checkbox" name="list[]"value="{{$list->id}}" value=""  aria-label="...">
    {{-- <input class=" cursor form-check-input me-1" type="hidden" name="id_list[]" value="{{$list->id}}" value=""  aria-label="..."> --}}
    {{-- {{dd($list->id)}} --}}
   {{$list->list}}
  </li>
</label>
@endforeach

</ul>
     
  <button class="btn btn-main-color mt-3 text-capitalize" type="submit">simpan</button>
</form>
<hr>

@endsection