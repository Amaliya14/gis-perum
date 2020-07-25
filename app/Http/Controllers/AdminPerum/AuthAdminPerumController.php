<?php

namespace App\Http\Controllers\AdminPerum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthAdminPerumController extends Controller
{
    public function __construct(){
		$this->middleware('guest:admin-perum')->except(['logout']);
	}

    public function showLogin(){
    	return view('auth.login-adminPerum');
    }

    public function login(Request $request){
    	$credentials = [
    		'username' => $request->username,
    		'password' => $request->password
    	];

    	if(Auth::guard('admin-perum')->attempt($credentials, $request->member)){
    		return redirect()->route('admin-perum.dashboard');
    	}

    	return redirect()->back()->with('message','Gagal Login');
    }

    public function logout(){
    	Auth::guard('admin-perum')->logout();
    	return redirect('admin-perum/login');
    }
}
