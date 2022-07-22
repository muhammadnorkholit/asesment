<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_siswa = auth()->user()->id;
        // ,"assessment_siswa.list_check"
        $mapelSiswa = DB::table('kelas_siswa as ks')
        ->select('m.*')
        ->join('pengajar_kelas as pk','ks.kelas_id','pk.kelas_id')
        ->join('code_guru as cg','pk.code_id','cg.id')
        ->join('mapel as m','cg.mapel_id','m.id')
        ->where("ks.siswa_id",$id_siswa)
        ->get();
        // dd($mapelSiswa); 

      
        // dd($mapelSiswa);
        return view("siswa.home",["data"=>$mapelSiswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_assessment($id)
    {
        $data = DB::table('list_asesment as la')
        ->where('mapel_id',$id)
        ->get();
        return view('siswa.asesment',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inputList(Request $request)
    {   
        $id_siswa = auth()->user()->id;
        $idList =$request->id_list;
        $list = $request->list;
        $count = count($request->list);
        // for ($i=0; $i <$count ; $i++) { 
            DB::beginTransaction();
            
            try {
                for ($i=0; $i <$count ; $i++) { 
                    // dd((int) $idList);
                    // dd($list[$i]);

            DB::table('asesment_siswa')
            ->insert(
                [
                    "list_id"=>(int) $list[$i],
                    "siswa_id"=>$id_siswa,
                    "list_check"=>1,
                    
                ]);
            DB::commit();
        }

            return redirect("/");
            } catch (\Exception $e) {
                dd($e);
            return back()->withErrors('terjadi kesalahan saat menyimpan data' + $e->messege);

            DB::rollback();
            // something went wrong
            }
        // }
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
