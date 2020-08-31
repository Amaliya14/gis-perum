<?php

namespace App\Http\Controllers\AdminPerum;

use Auth;
use App\InfoPerum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

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
        $infoPerum = InfoPerum::where('id_perumahan', Auth::user()->perumahan->id)->first();
        return view('admin-perum.infoperum.index',compact('infoPerum'));
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
            'rumah_tersedia' => 'required',
            'tipe' => 'required',
            'harga' => 'required|numeric',
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
    public function edit()
    {
      return view('admin-perum.infoperum.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_perumahan' => 'required',
            'rumah_tersedia' => 'required',
            'tipe' => 'required',
            'harga' => 'required|numeric',
            'keterangan' => 'required',
        ]);

        $infoPerum = InfoPerum::where('id_perumahan', Auth::user()->perumahan->id)->first();
        Auth::user()->perumahan->update(['nama_perumahan' => $request->nama_perumahan]);
        // dd($request->all());

        if($infoPerum) {
          $foto = $infoPerum->foto;
          if($request->foto){
            if (Storage::exists($foto)) { Storage::delete($foto); }
          $foto = $request->file('foto')->store('perumahan');
          }

          $infoPerum->update([
            'rumah_tersedia' => $request->rumah_tersedia,
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'Keterangan' => $request->keterangan,
            'foto' => $foto,
          ]);

          return redirect('admin-perum/infoperum')->with('success', 'Data berhasil diubah!');

        }
        else{
          if($request->foto){
            $foto = $request->file('foto')->store('perumahan');
            InfoPerum::create([
              'rumah_tersedia' => $request->rumah_tersedia,
              'tipe' => $request->tipe,
              'harga' => $request->harga,
              'Keterangan' => $request->keterangan,
              'foto' => $foto,
              'id_perumahan' => Auth::user()->perumahan->id
            ]);

            return redirect('admin-perum/infoperum')->with('success', 'Data berhasil diubah!');
          }else {
            return redirect()->back()->with('success', 'salah!');
          }
        }

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
