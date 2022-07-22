<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class guruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser =auth()->user()->id;
        $data = DB::table('guru as g')
        ->select('m.nama_mapel','m.id')
        ->join('code_guru as cg','g.id','cg.guru_id')
        ->join('mapel as m','cg.mapel_id','m.id')
        ->where('g.id',$idUser)
        ->get();

        return view('guru.home',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showKelas($id)
    {   
        $idGuru = auth()->user()->id;
        $data = DB::table('pengajar_kelas as pk')
        ->select('k.*','nama_jurusan')
        ->join('kelas as k','pk.kelas_id','k.id')
        ->join('jurusan as j','k.jurusan_id','j.id')
        ->join('code_guru as cg','pk.code_id','cg.id')
        ->where('cg.mapel_id',$id)
        ->where('cg.guru_id',$idGuru)
        ->get();
        // dd($data);
        return view('guru.kelas',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showDiagram($idMapel,$idKelas)
    {   
        $data = DB::table('list_asesment as ls')
        ->select('ls.list','ls.id')
        ->selectRaw('count(list_check) as total')
        ->leftJoin('asesment_siswa as s','ls.id','s.list_id')
        ->join('code_guru as cg','ls.mapel_id','cg.mapel_id')
        ->join('pengajar_kelas as pk','cg.id','pk.code_id')
        ->where('ls.mapel_id',$idMapel)->where('pk.kelas_id',$idKelas)
        ->groupBy('ls.id')
        ->get();

        $siswa = DB::table('siswa as s')
        ->select('nama_siswa','ls.list_id','ks.*')
        ->join('asesment_siswa as ls','s.id','ls.siswa_id')
        ->join('kelas_siswa as ks','s.id','ks.siswa_id')
        ->where('ks.kelas_id',$idKelas)
        ->get();

        $data2 = DB::table('siswa as s')
        ->select('nama_siswa','list_id')
        ->selectRaw('count(list_check) as total')
        ->join('kelas_siswa as ks','s.id','ks.siswa_id')
        ->leftJoin('asesment_siswa as ass','s.id','ass.siswa_id')
        ->leftJoin('list_asesment as ls','ass.list_id','ls.id')
        ->where('ls.mapel_id',$idMapel)
        ->where('kelas_id',$idKelas)
        ->groupBy('s.id')
        ->orderBy('nama_siswa','asc')
        ->get();
    

        $no = 1;
        return view('guru.diagram',compact('data','siswa','data2','no'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($idMapel,$idKelas)
    {
        $data = DB::table('siswa as s')
        ->select('s.*')
        ->join('kelas_siswa as ks','s.id','ks.siswa_id')
        ->where('ks.kelas_id',$idKelas)
        ->orderBy('nama_siswa')
        ->get();

        $list = DB::table('list_asesment as ls')
        ->where('mapel_id',$idMapel)
        ->orderBy('ls.id')
        ->get();

        $check = DB::table('list_asesment as ls')
        ->join('asesment_siswa as ass','ls.id','ass.list_id')
        ->join('siswa as s','ass.siswa_id','s.id')
        ->where('mapel_id',$idMapel)
        ->orderBy('nama_siswa')
        ->get();

        // $check2 = DB::table('list_asesment as ls')
        // ->get();
       
       
        
        
        // dd($data);


        $no = 1;
       return view('guru.detail',compact('data','list','no','check'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
