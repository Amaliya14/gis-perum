<?php

namespace App\Http\Controllers\AdminPerum;

use Auth;
use App\InfoPerum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoPerumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth:admin-perum');
    }

    public function index()
    {
        $infoperum = InfoPerum::all();
        return view('admin-perum.infoperum.index', compact('infoperum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-perum.infoperum.create');
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
            'nama_perumahan' => 'required',
            'tipe' => 'required',
            'harga' => 'required',
            'Keterangan' => 'required',
            'foto' => 'required',
        ]);
  
        InfoPerum::create($request->all());

        //return redirect()->back();

        return redirect('admin-perum/infoperum')->with('success', 'Berhasil Menambahkan Data!');
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
        $infoperum = InfoPerum::find($id);
        return view('admin.infoperum.edit', compact('infoperum'));
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
            'nama_perumahan' => 'required',
            'tipe' => 'required',
            'harga' => 'required',
            'Keterangan' => 'required',
            'foto' => 'required',
        ]);

         $data = [
            'nama_perumahan' =>$request->nama_perumahan,
            'tipe' =>$request->tipe,
            'harga' =>$request->harga,
            'Keterangan' =>$request->Keterangan,
            'foto' =>$request->foto,
        ];

        InfoPerum::find($id)->update($data);
        // return $data;
        return redirect('admin-perum/infoperum')->with('success', 'Data berhasil diubah!');
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
        $infoperum = InfoPerum::find($id);
        $infoperum->delete();

        return redirect('admin-perum/infoperum')->with('success', 'Data berhasil dihapus!');
    }
}
