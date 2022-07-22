<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class adminListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('list_asesment as ls')
        ->select('ls.*','m.nama_mapel','nama_guru')
        ->join('mapel as m','ls.mapel_id','m.id')
        ->join('code_guru as cg','m.id','cg.mapel_id')
        ->join('guru as g','cg.guru_id','g.id')
        ->orderBy('nama_mapel','asc')
        ->get();
        $no  = 1;
        // dd($data);
        return view('admin.list.list',compact('data','no'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('mapel')->get();
        return view('admin.list.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mapel = $request->mapel;
        $list = $request->list;
        $count = count($request->list);
        DB::beginTransaction();
        
        try {
            
            for ($i=0; $i < $count ; $i++) { 
                DB::table('list_asesment')->insert([
                    'mapel_id'=>$mapel,
                    'list'=>$list[$i]
                ]);
                DB::commit();
            }
            
            return redirect('admin/list');
        } catch (\Throwable $e) {
             dd($e);
            return back()->withErrors('terjadi kesalahan saat menyimpan data' + $e->messege);
        }
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
