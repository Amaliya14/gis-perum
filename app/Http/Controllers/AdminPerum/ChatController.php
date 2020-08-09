<?php

namespace App\Http\Controllers\AdminPerum;

use App\InfoPerum;
use App\Pengembang;
use App\Chats;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Response;
use Auth;

class ChatController extends Controller
{
    public function __construct(){
		$this->middleware('auth:admin-perum');
	}

	public function index(){
		// $this->middleware('auth:admin-perum');
		return view('admin-perum.chat.index');
	}

	public function chat($id){
	  $id_user = $id;
      $id_admin =  Auth::user()->id;
      $chat = Chats::with(['pengembang','user'])->where('id_user',$id_user)->where('id_admin',$id_admin)->where('pengirim','user')->orderBy('id','DESC')->first();
	   if (empty($chat)) {
        $chat = Pengembang::where('id',$id_admin)->first();
        return view('admin-perum.chat.chatdetail',compact('id_user','chat'));
      }else{
        return view('admin-perum.chat.chatdetail',compact('id_user','chat'));
      }
	}


	public function chatListAdmin(){
		$admin = Auth::user()->id;
		// $data = Chats::with(['pengembang','user'])->where('id_user',$user)->where('id_admin',$admin)->get();
		$data = Chats::with(['pengembang','user'])->where('id_admin',$admin)->where('pengirim','user')->orderBy('chats.id','DESC')->groupBy('id_user')->get();
		return response()->json(Response::transform($data, 'All Chat List', true), 200);
   
	}
}
