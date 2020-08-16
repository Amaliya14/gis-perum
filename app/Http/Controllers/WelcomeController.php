<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perumahan;
use App\Kecamatan;
use App\Pengembang;
use App\Kelurahan;
use DB;

use App\Chats;
use App\Response;
use Auth;
class WelcomeController extends Controller
{
    // public function grafik(){
    // $perkecamatan = DB::select('SELECT kecamatan, COUNT(kecamatan) as perkecamatan FROM `perumahan` GROUP BY kecamatan');
    //   return view('grafik', compact('perkecamatan'));
    // }

    public function home(){
      $perumahan = Perumahan::with('info')->get();
      // dd($perumahan);
      $perkecamatan = DB::select('SELECT kecamatan, COUNT(kecamatan) as perkecamatan FROM `perumahan` GROUP BY kecamatan');
      return view('welcome', compact('perumahan', 'perkecamatan'));

    }

    public function map(){
      // $perumahan = Perumahan::with('info')->get();
      // dd($perumahan);
      
       // dd($perumahan);
      $kecamatan = Kecamatan::orderBy('kecamatan','ASC')->get();
      $kelurahan = Kelurahan::orderBy('kelurahan','ASC')->get();
      return view('map-area', compact('kecamatan', 'kelurahan'));
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
      if (empty($chat)) {
        $chat = Pengembang::where('id',$id_admin)->first();
        return view('chat-user',compact('id_admin','chat'));
      }else{
        return view('chat-user',compact('id_admin','chat'));
      }

    }

    public function apiChat(Request $request){
      $user = $request->input('id_user');
      $admin = $request->input('id_admin');
      $data = Chats::with(['pengembang','user'])->where('id_user',$user)->where('id_admin',$admin)->get();
      return response()->json(Response::transform($data, 'All Chat found', true), 200);
    }

    public function apiSendChat(Request $request){

      $data = [
        'id_user' =>$request->id_user,
        'id_admin' =>$request->id_admin,
        'isi_chat' =>$request->isi_chat,
        'pengirim' =>$request->pengirim
        ];
      return response()->json(Response::transform(Chats::create($data), 'Send Message Succcess', true), 200);
    }

    public function chatListAdmin(){
      // $this->middleware('auth:admin-perum');
      $admin = Auth::user();
      echo json_encode($admin);
      // $data = Chats::with(['pengembang','user'])->get();
      // return response()->json(Response::transform($admin, 'All Chat List', true), 200);
     
    }

    public function apiMap(Request $request){
      // $features = new \stdClass();
      $perumahan = Perumahan::with('info')->whereHas('info', function($query){
        $query->whereNotNull('id_perumahan');
      })->get();
     
      
      return response()->json(Response::transform($perumahan, 'All Perumahan found', true), 200);
    }
    




}
