<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthUserController extends Controller
{
    public function login(Request $request){
    	$credentials = [
    		'email' => $request->username,
    		'password' => $request->password
    	];

    	if(Auth::guard('pengguna')->attempt($credentials, $request->member)){
    		return redirect('/');
    	}else{

    	return redirect('/');
        }
	}
	
	public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5|max:50',
            'email' => 'required|min:3',
            'alamat' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'nama' =>$request->nama,
            'email' =>$request->email,
            'alamat' =>$request->alamat,
            'password' => bcrypt($request->password)
        ];

        User::create($data);
        return redirect('/')->with('success', 'Berhasil Menambahkan Data!');
    }

    public function logout(){
    	Auth::guard('pengguna')->logout();
    	return redirect('/');
    }
}
