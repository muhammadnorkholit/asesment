@extends('layout')

@section('title',"Create List")
@section('main')
    {{-- ini main --}}
    <h1 class="text-capitalize mb-2">create List </h1>
   <form action="/admin/list" method="POST">
    @csrf
    <div class="mb-3">
      <label for="mapel" class="form-label text-capitalize"> mapel</label>
      <select name="mapel" id="" class=" form-select">
        <option value="" selected disabled>select mapel</option>
        @foreach ($data as $item)
        <option value="{{$item->id}}">{{$item->nama_mapel}}</option>
        @endforeach
      </select>
       @error('mapel')
          <small class=" text-danger">{{$message}}</small>
      @enderror
    </div>
    <div class="mb-3" id="listbox">
      <label for="list" class="form-label text-capitalize"> list</label> <button onclick="addList(this)" type="button" class="btn btn-main-color m-auto" id="click"><i class="fa fa-plus"></i></button>
      <input  class="form-control mb-3" id="list" type="text" name="list[]" id="">
       @error('list')
          <small class=" text-danger">{{$message}}</small>
      @enderror
    </div>
  <button type="submit" class="btn btn-main-color">Simpan</button>
  <a href="{{ url()->previous() }}" type="button" class="btn btn-danger">Batal</a>
</form>

@endsection

<script>
  
  function addList(e) {
    const list  = document.querySelector('#list');
    const box  = document.querySelector('#listbox');
    let copy = list.cloneNode(true)
    copy.value = ''
    box.appendChild(copy)
  }
  
</script>