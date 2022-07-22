<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class adminGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $guru = DB::table('guru')
        ->orderByRaw('nama_guru ASC')
        ->get();
        $no =1;
        return view("admin.guru.guru",['data'=>$guru,'no'=>$no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view("admin.guru.create");
        
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
        'nama'      => 'required',
        'nip'      => 'required|unique:guru,nip',
        'username'  => 'required|unique:siswa,username|unique:guru,username|unique:admin,username',
        'password'  => 'required|min:6',
        ]);

        DB::table('guru')->insert([
            'nama_guru'=>$request->nama,
            'nip'      =>$request->nip,
            'username' =>$request->username,
            'password' =>Hash::make($request->password),
        ]);
        return redirect('/admin/guru');
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
        $guru = DB::table('guru')
        ->where('id',$id)
        ->first();
        return view('admin.guru.edit',['data'=>$guru]);
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
        'nama'      => 'required',
        'nip'      => 'required|unique:guru,nip,'.$id,
        'username'  => 'required|unique:siswa,username|unique:guru,username,'.$id.',|unique:admin,username',
        // 'username'  => 'required|unique:siswa,username,'.$id,

        ]);

        DB::table('guru')->where('id',$id)->update([
            'nama_guru'=>$request->nama,
            'nip'      =>$request->nip,
            'username' =>$request->username,
        ]);
        return redirect('admin/guru');
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
