<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class adminPengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pengajar_kelas as pk')
        ->join('code_guru as cg','pk.code_id','cg.id')
        ->join('mapel as m','cg.mapel_id','m.id')
        ->join('guru as g','cg.guru_id','g.id')
        ->get();
        $no = 1;
        return view("admin.pengajar.pengajar",compact('data','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = DB::table('guru as g')
        ->select('g.nama_guru','cg.id','m.nama_mapel')
        ->join('code_guru as cg','g.id','cg.guru_id')
        ->join('mapel as m','cg.mapel_id','m.id')
        ->get();
        $kelas = DB::table('kelas')
        ->select('tingkatan','nama_jurusan','kelas.id')
        ->join('jurusan','kelas.jurusan_id','jurusan.id')
        ->get();
        // ->join('');
        // dd($guru);
        return view('admin.pengajar.create',compact('guru','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     DB::table('pengajar_kelas')->insert([
            'kelas_id'=>$request->kelas,
            'code_id'=>$request->guru
        ]);
        return redirect('admin/pengajar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $guru = DB::table('guru as g')
        ->select('g.nama_guru','cg.id','m.nama_mapel')
        ->join('code_guru as cg','g.id','cg.guru_id')
        ->join('mapel as m','cg.mapel_id','m.id')
        ->get();

        $kelas = DB::table('kelas as k')
        ->select('tingkatan as t','nama_jurusan','k.id')
        ->join('jurusan as j','k.jurusan_id','j.id')
        ->get();

        $data = DB::table('pengajar_kelas')
        ->where('id',$id)
        ->first();
        return view('admin.pengajar.edit',compact('data','guru','kelas'));
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
