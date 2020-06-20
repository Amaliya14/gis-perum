<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Pengembang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengembangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $pengembang = Pengembang::all();
        return view('admin.pengembang.index', compact('pengembang'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengembang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'perumahan' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_tlpn' => 'required',
        ]);

        $data = [
            'nama' =>$request->nama,
            'perumahan' =>$request->perumahan,
            'email' =>$request->email,
            'alamat' =>$request->alamat,
            'no_tlpn' =>$request->no_tlpn,
        ];
  
        Pengembang::create($request->all());

        //return redirect()->back();

        return redirect('admin/pengembang')->with('success', 'Berhasil Menambahkan Data!');
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
        $pengembang = Pengembang::find($id);
        return view('admin.pengembang.edit', compact('pengembang'));
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
        $request->validate([
            'nama' => 'required',
            'perumahan' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_tlpn' => 'required',
        ]);
        $data = [
            'nama' =>$request->nama,
            'perumahan' =>$request->perumahan,
            'email' =>$request->email,
            'alamat' =>$request->alamat,
            'no_tlpn' =>$request->no_tlpn,
        ];

        Pengembang::find($id)->update($data);
        // return $data;
        return redirect('admin/pengembang')->with('success', 'Data berhasil diubah!');
         //return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengembang = Pengembang::find($id);
        $pengembang->delete();

        return redirect('admin/pengembang')->with('success', 'Data berhasil dihapus!');
    }
}
