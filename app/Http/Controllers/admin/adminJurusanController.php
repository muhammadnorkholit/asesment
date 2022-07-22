<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class adminJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = DB::table('jurusan')
        ->get();
        $no = 1;
        return view("admin.jurusan.jurusan",['data'=>$jurusan,"no"=>$no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jurusan.create');
         //
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
        'jurusan' => 'required',
        ]);

        try {
            
            DB::table('jurusan')->insert([
                'nama_jurusan'=>$request->jurusan
            ]);
        } catch (\Throwable $e) {
            dd("error");
        }
        // dd($validated->jurusan);
        return redirect('/admin/jurusan');
    
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
        $data = DB::table('jurusan')
        ->where('id',$id)
        ->first();
        return view("admin.jurusan.edit",compact('data'));
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
        'jurusan' => 'required',
        ]);

        try {
            
            DB::table('jurusan')->where('id',$id)->update([
                'nama_jurusan'=>$request->jurusan
            ]);
        } catch (\Throwable $e) {
            dd("error");
        }
        // dd($validated->jurusan);
        return redirect('/admin/jurusan');
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
