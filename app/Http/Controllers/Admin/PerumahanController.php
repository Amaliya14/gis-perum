<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Perumahan;
use App\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class PerumahanController extends Controller
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
        $perumahan = Perumahan::orderBy('id','DESC')->get();
        return view('admin.perumahan.index', compact('perumahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::orderBy('kecamatan','ASC')->get();
        return view('admin.perumahan.create', compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama_perumahan' => 'required|min:5|max:50',
            'lokasi' => 'required',
            'kecamatan' => 'required|min:5|max:50',
            'jumlah_rumah' => 'required',
            'luas_lahan_bangunan' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        Perumahan::create([
            'nama_perumahan' => $request->nama_perumahan,
            'lokasi' => $request->lokasi,
            'kecamatan' => $request->kecamatan,
            'jumlah_rumah' => $request->jumlah_rumah,
            'luas_lahan_bangunan' => $request->luas_lahan_bangunan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return redirect('admin/perumahan')->with('success', 'Berhasil Menambahkan Data!');
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
        $perumahan = Perumahan::find($id);
        $kecamatan = Kecamatan::orderBy('kecamatan','ASC')->get();
        return view('admin.perumahan.edit', compact('perumahan', 'kecamatan'));
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
            'lokasi' => 'required',
            'kecamatan' => 'required',
            'jumlah_rumah' => 'required',
            'luas_lahan_bangunan' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $perumahan = Perumahan::find($id);

        $data = [
            'nama_perumahan'=>$request->nama_perumahan,
            'lokasi' =>$request->lokasi,
            'kecamatan' =>$request->kecamatan,
            'jumlah_rumah' =>$request->jumlah_rumah,
            'luas_lahan_bangunan' =>$request->luas_lahan_bangunan,
            'latitude' =>$request->latitude,
            'longitude' =>$request->longitude,
        ];

        $perumahan->update($data);

        return redirect('admin/perumahan')->with('success', 'Data berhasil diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perumahan = Perumahan::find($id);
        $perumahan->delete();

        return redirect('admin/perumahan')->with('success', 'Data berhasil dihapus!');
    }
}
