<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthAdminController extends Controller
{
	public function __construct(){
		$this->middleware('guest:admin')->except(['logout']);
	}

    public function showLogin(){
    	return view('auth.login-admin');
    }

    public function login(Request $request){
    	$credentials = [
    		'username' => $request->username,
    		'password' => $request->password
    	];

    	if(Auth::guard('admin')->attempt($credentials, $request->member)){
    		return redirect()->route('admin.dashboard');
    	}

    	return redirect()->back()->with('message','Gagal Login');
    }

    public function logout(){
    	Auth::guard('admin')->logout();
    	return redirect('admin/login');
    }
}
