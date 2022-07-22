{{-- <link rel="stylesheet" href="style.css"> --}}
<nav class="navbar navbar-expand bg-white shadow-sm  py-2 w-100">
  <div class="container">
    <button id="sidebar-toogle" data-bs-toggle="collapse" data-bs-target="#sidebar" class="border-0 bg-transparent text-main-color fs-4 d-block d-lg-none"><i class="fa fa-bars"></i></button>
  
      <ul class="navbar-nav  mb-2 mb-lg-0 ms-auto">    
        <li class="nav-item dropdown">
          <a class="nav-link  d-flex justify-content-end align-items-center "id="navbarDropdown" role="button" data-bs-toggle="collapse" data-bs-target="#dropdown" aria-expanded="false">
            <p class=" px-3 py-1 rounded-2  m-0 m-2 text-capitalize text-gray fw-bold">
              Welcome
              @if (auth()->user()->nama_admin)
                  {{auth()->user()->nama_admin}}
              @elseif(auth()->user()->nama_guru)
               {{auth()->user()->nama_guru}}
                @elseif(auth()->user()->nama_siswa)
                {{ auth()->user()->nama_siswa}}
              @endif
            </p>
          </a>
          
          <ul class="collapse position-absolute bg-white p-3 rounded-3 shadow-lg " style="width:170px;" id="dropdown" aria-labelledby="navbarDropdown">
            <li> <a href="/logout" class=" dropdown-item fw-bold gap-2 d-flex align-items-center"><i class="fa-solid fa-right-from-bracket"></i><span style="font-size: 16px">logout</span></a></li>
          </ul>
        </li>
      </ul>
     
      
  </div>
</nav>