<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class adminCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $code = DB::table('code_guru')
        ->select('code_guru.*','guru.nama_guru','guru.nip','mapel.nama_mapel')
        ->join('guru','code_guru.guru_id','guru.id')
        ->join('mapel','code_guru.mapel_id','mapel.id')
        ->orderBy('code')
        ->get();

        // dd($code);
        return view('admin.code-guru.code',['data'=>$code,'no'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = DB::table('guru')->get();
        $mapel = DB::table('mapel')->get();
        return view('admin.code-guru.create',['guru'=>$guru,'mapel'=>$mapel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'code'      => 'required',
        'guru'      => 'required',
        'mapel'      => 'required',
        ]);
        DB::table('code_guru')
        ->insert([
            'code'=>$request->code,
            'guru_id'=>$request->guru,
            'mapel_id'=>$request->mapel
        ]);
        return redirect('admin/code-guru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = DB::table('guru')->get();
        $mapel = DB::table('mapel')->get();

        $data = DB::table('code_guru')
        ->where('id',$id)
        ->first();
        return view('admin.code-guru.edit',['data'=>$data,'guru'=>$guru,'mapel'=>$mapel]); 
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
        $validated = $request->validate([
        'code'      => 'required',
        'guru'      => 'required',
        'mapel'      => 'required',
        ]);
        DB::table('code_guru')
        ->where('id',$id)
        ->update([
            'code'=>$request->code,
            'guru_id'=>$request->guru,
            'mapel_id'=>$request->mapel
        ]);
        return redirect('admin/code-guru');
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
