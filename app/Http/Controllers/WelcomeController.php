<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perumahan;
use App\Kecamatan;
use App\Pengembang;
use App\Chats;
use App\Response;
use Auth;
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

    public function chats($id){
      $id_admin = $id;
      $user =  Auth::user()->id;
      $chat = Chats::with(['pengembang','user'])->where('id_user',$user)->where('id_admin',$id_admin)->where('pengirim','admin')->orderBy('id','DESC')->first();
      return view('chat-user',compact('id_admin','chat'));
    }

    public function apiChat(Request $request){
      $user = $request->input('id_user');
      $admin = $request->input('id_admin');
      $data = Chats::with(['pengembang','user'])->where('id_user',$user)->where('id_admin',$admin)->get();
      return response()->json(Response::transform($data, 'All Animals found', true), 200);
    }

    public function apiSendChat(Request $request){

      $data = [
        'id_user' =>$request->id_user,
        'id_admin' =>$request->id_admin,
        'isi_chat' =>$request->isi_chat,
        'pengirim' =>'user'
        ];
      return response()->json(Response::transform(Chats::create($data), 'Send Message Succcess', true), 200);
    }
    




}
