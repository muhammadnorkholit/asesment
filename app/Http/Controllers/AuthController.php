<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  public function __construct()
    //     {
    //         $this->middleware('guest')->except('logout');
    //         $this->middleware('guest:guru')->except('logout');
    //         $this->middleware('guest:siswa')->except('logout');
    //     }


    public function index()
    {
        $chars = DB::table('siswa')->first();
        $test = \Str::lower(\Str::random(9));
        // dd($test);
        return view("auth.login");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginUser(Request $request)
    {
        // $data = $this->validate($request, [
        //     'username'   => 'required',
        //     'password' => 'required|min:6'
        // ]);
        $auth = $request->validate([
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('guru')->attempt($auth)) {
            $request->session()->regenerate();
            return redirect()->intended('/guru');

        }elseif(Auth::guard('siswa')->attempt($auth)){
            $request->session()->regenerate();
            return redirect()->intended('/');

        }elseif(Auth::guard('admin')->attempt($auth)){
            $request->session()->regenerate();
            return redirect()->intended('/admin');

        }
        return back()->withInput($request->only('username', 'remember'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logoutUser(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
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
