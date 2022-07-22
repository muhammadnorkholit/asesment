
<div  id="sidebar" class="  navbar collapse  flex-column justify-content-start bg-main-color col-1 d-lg-flex min-vh-100" style="width:100px">
    <a href="/" class="navbar-brand d-block text-center fs-2 text-white m-0" >
        <i class="fas fa-laugh-wink"></i></a>
    <ul class="navbar-nav mt-4 position-sticky sticky-top ">
        @if (auth()->user()->nama_admin)
        <li class="nav-item sidebar-item text-center " style="">
            <a href="/admin" class=" fw-bold mb-2 nav-link text-white text-capitalize d-flex flex-column align-items-center "><i class="fas fa-fw fa-tachometer-alt"></i><span style="font-size: 12px">dashboard</span></a>
        </li>
        @elseif(auth()->user()->nama_siswa)
        <li class="nav-item sidebar-item text-center " style="">
            <a href="/" class=" fw-bold mb-2 nav-link text-white text-capitalize d-flex flex-column align-items-center "><i class="fas fa-fw fa-tachometer-alt"></i><span style="font-size: 12px">dashboard</span></a>
        </li>
        @elseif(auth()->user()->nama_guru)
        <li class="nav-item sidebar-item text-center " style="">
            <a href="/guru" class=" fw-bold mb-2 nav-link text-white text-capitalize d-flex flex-column align-items-center "><i class="fas fa-fw fa-tachometer-alt"></i><span style="font-size: 12px">dashboard</span></a>
        </li>
        @endif 

        <hr class=" border-white">


        @if (auth()->user()->nama_admin)
            <li data-bs-toggle="collapse" data-bs-target="#collapse" class="{{ Request()->is('admin/siswa*')  ? '' : 'opacity-50'}}  nav-item sidebar-item text-center cursor ">
               <a class=" fw-bold mb-2 nav-link text-white text-capitalize d-flex flex-column align-items-center "><i class="fas fa-fw fa-users"></i><span style="font-size: 12px">data master <i class="fa-solid fa-caret-down"></i></span></a>
            </li>
            <ul class="collapse ps-1" id="collapse">
                <li class="{{ Request()->is('admin/siswa*')  ? '' : 'opacity-50'}} nav-item sidebar-item text-center ">
                    <a href="/admin/siswa" class=" fw-bold mb-2 nav-link text-white text-capitalize d-flex flex-column align-items-center "><i class="fas fa-fw fa-users"></i><span style="font-size: 12px">siswa</span></a>
                </li>
                <hr class=" border-white">
                <li class="{{ Request()->is('admin/guru*')  ? '' : 'opacity-50'}} nav-item sidebar-item text-center  ">
                    <a href="/admin/guru" class=" fw-bold mb-2 nav-link text-white text-capitalize d-flex flex-column align-items-center "><i class="fas fa-fw fa-users"></i><span style="font-size: 12px">guru</span></a>
                </li>
            </ul>
                <hr class=" border-white">
            
            <li data-bs-toggle="collapse" data-bs-target="#collapse2" class="{{ Request()->is('admin/siswa*')  ? '' : 'opacity-50'}}  nav-item sidebar-item text-center cursor ">
               <a class=" fw-bold mb-2 nav-link text-white text-capitalize d-flex flex-column align-items-center "><i class="fas fa-fw fa-users"></i><span style="font-size: 12px">data master 2 <i class="fa-solid fa-caret-down"></i></span></a>
            </li>
            <ul class="collapse ps-1" id="collapse2">
                <li class="{{ Request()->is('admin/mapel*')  ? '' : 'opacity-50'}} nav-item sidebar-item text-center" style="">
                <a href="/admin/mapel" class=" fw-bold mb-2 nav-link text-white text-capitalize d-flex flex-column align-items-center "><i class="fas fa-fw fa-book"></i><span style="font-size: 12px">mapel</span></a>
            </li>
            <hr class=" border-white">
            <li class="{{ Request()->is('admin/jurusan*')  ? '' : 'opacity-50'}} nav-item sidebar-item text-center" style="">
                <a href="/admin/jurusan" class=" fw-bold mb-2 nav-link text-white text-capitalize d-flex flex-column align-items-center "><i class="fas fa-fw  fa-code-fork"></i><span style="font-size: 12px">jurusan</span></a>
            </li>
            <hr class=" border-white">
            <li class="{{ Request()->is('admin/kelas*')  ? '' : 'opacity-50'}} nav-item sidebar-item text-center" style="">
                <a href="/admin/kelas" class=" fw-bold mb-2 nav-link text-white text-capitalize d-flex flex-column align-items-center "><i class="fas fa-fw  fa-code-fork"></i><span style="font-size: 12px">kelas</span></a>
            </li>
            </ul>
                <hr class=" border-white">
            
                <li data-bs-toggle="collapse" data-bs-target="#collapse3" class="{{ Request()->is('admin/siswa*')  ? '' : 'opacity-50'}}  nav-item sidebar-item text-center cursor ">
               <a class=" fw-bold mb-2 nav-link text-white text-capitalize d-flex flex-column align-items-center "><i class="fas fa-fw fa-users"></i><span style="font-size: 12px">data master 3 <i class="fa-solid fa-caret-down"></i></span></a>
            </li>
            <ul class="collapse ps-1" id="collapse3">
                 <li class="{{ Request()->is('admin/list*')  ? '' : 'opacity-50'}} nav-item sidebar-item text-center" style="">
                <a href="/admin/list" class=" fw-bold mb-2 nav-link text-white text-capitalize d-flex flex-column align-items-center "><i class="fas fa-fw  fa-code-fork"></i><span style="font-size: 12px">list detail</span></a>
            </li>
            <hr class=" border-white">
            <li class="{{ Request()->is('admin/code-guru*')  ? '' : 'opacity-50'}} nav-item sidebar-item text-center" style="">
                <a href="/admin/code-guru" class=" fw-bold mb-2 nav-link text-white text-capitalize d-flex flex-column align-items-center "><i class="fas fa-fw  fa-code-fork"></i><span style="font-size: 12px">code-guru</span></a>
            </li>
            <hr class=" border-white">
            <li class="{{ Request()->is('admin/pengajar*')  ? '' : 'opacity-50'}} nav-item sidebar-item text-center" style="">
                <a href="/admin/pengajar" class=" fw-bold mb-2 nav-link text-white text-capitalize d-flex flex-column align-items-center "><i class="fas fa-fw  fa-code-fork"></i><span style="font-size: 12px">pengajar</span></a>
            </li>
            </ul>
                <hr class=" border-white">





            
          
            

        @endif 
        <li class="nav-item sidebar-item text-center opacity-50" style="">
                <a href="/logout" class=" fw-bold mb-2 nav-link text-white text-capitalize d-flex flex-column align-items-center "><i class="fa-solid fa-right-from-bracket"></i><span style="font-size: 12px">logout</span></a>
        </li>
            <hr class=" border-white">
    </ul>
</div>