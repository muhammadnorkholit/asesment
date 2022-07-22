<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class adminSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = DB::table('siswa')
        ->select('siswa.*','kelas.tingkatan','jurusan.nama_jurusan')
        ->join('kelas_siswa',"siswa.id",'kelas_siswa.siswa_id')
        ->join('kelas',"kelas_siswa.kelas_id",'kelas.id')
        ->join('jurusan',"kelas.jurusan_id",'jurusan.id')
        ->orderByRaw('tingkatan ASC ,nama_jurusan ASC,nama_siswa ASC')
        ->get();
        $no = 1;
            return view("admin.siswa.siswa",['data'=>$siswa,'no'=>$no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = DB::table('kelas')
        ->select('kelas.*','nama_jurusan')
        ->join('jurusan','kelas.jurusan_id','jurusan.id')
        ->get();
        return view("admin.siswa.create",['data'=>$kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
