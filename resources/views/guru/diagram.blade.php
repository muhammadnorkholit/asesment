@extends('layout')

@section('title',"Diagram")
@section('main')
<div class="d-flex justify-content-between">

  <span class=" btn-group border text-capitalize mb-5">
    <button id="btn1" class=" btn btn-light" onclick="showMapel(this)">Mapel</button>  
    <button id="btn2" class=" btn btn-main-color" onclick="showSiswa(this)">siswa</button>  
  </span>
  <a href="{{url()->full()}}/detail" class="text-primary text-capitalize fw-bold text-decoration-none"><i class=" fa "></i>detail</a>
</div>
<div class=" " id="mapel">
<h2 class=" text-capitalize">diagram detail mapel</h2>

    <div>
  <canvas id="myChart" width="" height="500"></canvas>
</div>


  {{-- <div class=" mt-5 card border-0 w-100 bg-primary text-white with-3d-shadow shadow">
    @foreach ($data as $list) 
    @if ($loop->first)
        
    <div class="card-body ">
    </div>
    <div class=" list-group  border rounded-2 overflow-hidden ">
    <div class=" list-group-item list-group-item-primary justify-content-between d-flex   text-capitalize active rounded-0">daftar materi <span class=" w-25">jumlah siswa</span></div>
    @endif
        <a href="/guru/diagram/d/" data-bs-toggle='collapse' data-bs-target="#hide{{$list->id}}"  class=" text-capitalize list-group-item  cursor d-flex justify-content-between">
               {{$no++.'.'}} {{$list->list}}  <span class=" w-25 pe-5">{{$list->total}}</span>
        </a>
        <ul class="collapse list-group px-5 py-2 m-0" id="hide{{$list->id}}">
                  @php
                      $nor = 1
                  @endphp
          @foreach ($siswa as $siswal)
              @if ($siswal->list_id == $list->id)
                 <li class=" list-group-item text-capitalize">
                  {{($nor++.'.')}} {{$siswal->nama_siswa}}
                </li>
                @endif
            @endforeach
        </ul>

  @endforeach
</div>
</div> --}}
</div>



<div class=" d-none" id="siswa">
<h2 class=" text-capitalize">diagram daftar siswa</h2>

    <div>
  <canvas id="myChart2" width="" height="500"></canvas>
</div>


  {{-- <div class=" mt-5 card border-0 w-100 bg-primary text-white with-3d-shadow shadow">
                 @php
                      $no = 1
                  @endphp
    @foreach ($data as $list) 
    @if ($loop->first)
        
    <div class="card-body ">
    </div>
    <div class=" list-group  border rounded-2 overflow-hidden ">
    <div class=" list-group-item list-group-item-primary justify-content-between d-flex   text-capitalize active rounded-0">daftar materi <span class=" w-25">jumlah siswa</span></div>
    @endif
        <a href="/guru/diagram/d/" data-bs-toggle='collapse' data-bs-target="#hide{{$list->id}}"  class=" text-capitalize list-group-item  cursor d-flex justify-content-between">
               {{$no++.'.'}} {{$list->list}}  <span class=" w-25 pe-5">{{$list->total}}</span>
        </a>
        <ul class="collapse list-group px-5 py-2 m-0" id="hide{{$list->id}}">
                  @php
                      $nor = 1
                  @endphp
          @foreach ($siswa as $siswal)
              @if ($siswal->list_id == $list->id)
                 <li class=" list-group-item text-capitalize">
                  {{($nor++.'.')}} {{$siswal->nama_siswa}}
                </li>
                @endif
            @endforeach
        </ul>

  @endforeach
</div>
</div> --}}
</div>

<script>
      Chart.register(ChartjsPluginStacked100.default);
      let sdata = JSON.parse(`<?php echo $data; ?>`)
      const ctx = document.getElementById('myChart')
      const ctx2 = document.getElementById('myChart2')

      let label =[]
      let datas =[]

      sdata.forEach(data => {
          label.push(data.list.toUpperCase())
          datas.push(data.total)
      });

          const data = {
          labels: label,
          datasets: [{
            label: 'siswa',
            backgroundColor: [ 'rgba(255, 99, 132, 0.8)',
                  'rgba(19, 157, 255,.8)',
                  'rgba(255, 206, 86, 0.8)',
                  'rgba(75, 192, 192, 0.8)',
                  'rgba(153, 102, 255, 0.8)',
                  'rgba(255, 159, 64, 0.8)'],
            
            data: datas,
          },
        ]
        };
        const config = {
          type: 'bar',
          data: data,
          options: {
              responsive: true,
      maintainAspectRatio: false,
          }
        };    
        const myChart = new Chart(
          ctx,
          config
        );






</script>


<script>



      let sdata2 = JSON.parse(`<?php echo $data2; ?>`)
      let label2 =[]
      let datas2 =[]
      let persen = []
      let nama = []

      sdata2.forEach(data => {
          label2.push(data.nama_siswa.toUpperCase())
          datas2.push(data.total)
          persen.push(sdata.length-data.total)
          nama.push(data.list)
      });
      console.log(nama)
 const data2 = {
          labels: label2,
          datasets: [{
            label: 'materi dipilih',
            backgroundColor: [ 'rgba(255, 99, 132, 0.8)',
                  'rgba(19, 157, 255,.8)',
                  'rgba(255, 206, 86, 0.8)',
                  'rgba(75, 192, 192, 0.8)',
                  'rgba(153, 102, 255, 0.8)',
                  'rgba(255, 159, 64, 0.8)'],
            
            data: datas2,
          },
          {
            label: 'materi tidak dipilih',
            backgroundColor: [ 'rgba(100, 99, 132, 0.1)',
           ],
            
            data: persen,
          },
        ]
        };
        const config2 = {
          type: 'bar',
          data: data2,
          options: {
            indexAxis:'y',
             plugins: { 
            stacked100: {enable: true, replaceTooltipLabel: true },
          },
              responsive: true,
      maintainAspectRatio: false,
          }
        };    
        const myChart2 = new Chart(
          ctx2,
          config2
        );








  const siswa = document.querySelector('#siswa');
const mapel = document.querySelector('#mapel');
const btn1 = document.querySelector('#btn1');
const btn2 = document.querySelector('#btn2');
 function showSiswa(e) {
        btn2.classList.replace('btn-main-color','btn-light')
        btn1.classList.replace('btn-light','btn-main-color')
        siswa.classList.remove('d-none')
        mapel.classList.add('d-none')
      }
      function showMapel(e) {
        mapel.classList.remove('d-none')
        siswa.classList.add('d-none')
         btn1.classList.replace('btn-main-color','btn-light')
        btn2.classList.replace('btn-light','btn-main-color')

      }
</script>
{{-- 
<script>
      // let cdata = JSON.parse(`<?php echo $lists; ?>`)
      // let sdata = JSON.parse(`<?php echo $data; ?>`)
      // const ctx = document.getElementById('myChart')
      // const ctx2 = document.getElementById('myChart2')
  
      //   let label = []
      //   for (let i = 0; i < sdata.length; i++) {
      //     label.push(cdata[i].list.toUpperCase())
      //   }
      //   let datas = []

      //   const data = {
      //     labels: label,
      //     datasets: [{
      //       label: '',
      //       backgroundColor: [ 'rgba(255, 99, 132, 0.8)',
      //             'rgba(19, 157, 255,.8)',
      //             'rgba(255, 206, 86, 0.8)',
      //             'rgba(75, 192, 192, 0.8)',
      //             'rgba(153, 102, 255, 0.8)',
      //             'rgba(255, 159, 64, 0.8)'],
      //       borderColor: [ 'rgba(255, 99, 132, 1)',
      //             'rgba(54, 162, 235, 1)',
      //             'rgba(255, 206, 86, 1)',
      //             'rgba(75, 192, 192, 1)',
      //             'rgba(153, 102, 255, 1)',
      //             'rgba(255, 159, 64, 1)'],
      //       data: datas,
      //     }]
      //   };
    
      //   const config = {
      //     type: 'bar',
      //     data: data,
      //     options: {
      //         responsive: true,
      // maintainAspectRatio: false,
      
      //     }
      //   };
    
      //   const myChart = new Chart(
      //     ctx,
      //     config
      //   );



</script> --}}
@endsection
