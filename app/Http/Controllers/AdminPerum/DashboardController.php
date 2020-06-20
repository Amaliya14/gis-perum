<?php

namespace App\Http\Controllers\AdminPerum;

use App\InfoPerum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct(){
		$this->middleware('auth:admin-perum');
	}

	public function index(){
		$infoperum = InfoPerum::all();
		$jumlahinfoperum = $infoperum->count();

		return view('admin-perum/dashboard', compact('jumlahinfoperum'));
	}
}
