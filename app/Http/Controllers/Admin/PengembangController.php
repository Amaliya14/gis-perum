<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Pengembang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Perumahan;
use DB;

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
        $pengembang = Pengembang::orderBy('id','DESC')->get();
        return view('admin.pengembang.index', compact('pengembang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perumahan = Perumahan::orderBy('nama_perumahan', 'ASC')->get(['nama_perumahan', 'id']);

        return view('admin.pengembang.create', compact('perumahan'));
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
            'nama' => 'required|min:5|max:50',
            'username' => 'required|min:3|max:20',
            'alamat' => 'required',
            'no_tlpn' => 'required|numeric',
        ]);

        $data = [
            'nama' =>$request->nama,
            'username' =>$request->username,
            'alamat' =>$request->alamat,
            'no_tlpn' =>$request->no_tlpn,
            'id_perumahan' => $request->id_perumahan,
            'password' => bcrypt(12345678)
        ];

        Pengembang::create($data);

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
        $perumahan = Perumahan::orderBy('nama_perumahan', 'ASC')->get(['nama_perumahan', 'id']);

        return view('admin.pengembang.edit', compact('pengembang','perumahan'));
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
            'nama' => 'required|min:5|max:50',
            'username' => 'required|min:3|max:20',
            'alamat' => 'required',
            'no_tlpn' => 'required|numeric',
        ]);
        $data = [
            'nama' =>$request->nama,
            'username' =>$request->username,
            'alamat' =>$request->alamat,
            'no_tlpn' =>$request->no_tlpn,
            'id_perumahan' => $request->id_perumahan,
        ];

        Pengembang::find($id)->update($data);

        return redirect('admin/pengembang')->with('success', 'Data berhasil diubah!');
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
