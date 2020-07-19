<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perumahan;
use App\Kecamatan;
use App\Pengembang;

class WelcomeController extends Controller
{
    public function home(){
      $perumahan = Perumahan::with('info')->get();
      // dd($perumahan);
      return view('welcome', compact('perumahan'));
    }

    public function map(){
      // $perumahan = Perumahan::with('info')->get();
      // dd($perumahan);
      
       // dd($perumahan);
      $kecamatan = Kecamatan::orderBy('kecamatan','ASC')->get();
      return view('map', compact('kecamatan'));
    }

    public function mapPerumahan(){

      $perumahan = Perumahan::with('info')->whereHas('info', function($query){
        $query->whereNotNull('id_perumahan');
      })->get();

      return $perumahan;
    }

    public function perumahan(){
      $perumahan = Perumahan::whereHas('info', function($query){
        $query->whereNotNull('id_perumahan');
      })->paginate(6);

      return view('perumahan', compact('perumahan'));
    }

    public function info($id){
      $perumahan = Perumahan::find($id);
      return view('info-perumahan', compact('perumahan'));
    }

    public function pengembang(){
    $data = Pengembang::all();
    return view('data-pengembang',compact('data'));
    }
    
    public function kontak(){
      return view('kontak');
    }

    public function cari(Request $request){

      $perumahan = Perumahan::where('nama_perumahan','LIKE','%'.$request->keyword.'%')
      ->whereHas('info', function($query){
        $query->whereNotNull('id_perumahan');
      })->paginate(6);

      return view('perumahan', compact('perumahan'));
    }

}
