<?php

namespace App\Http\Controllers\Admin;

use App\Pengembang;
use App\Perumahan;
use App\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct(){
		$this->middleware('auth:admin');
	}

	public function index(){
		$pengembang = Pengembang::all();
		$jumlahpengembang = $pengembang->count();

		$perumahan = Perumahan::all();
		$jumlahperumahan = $perumahan->count();

		$kecamatan = Kecamatan::all();
		$jumlahkecamatan = $kecamatan->count();

		return view('admin/dashboard', compact('jumlahperumahan', 'jumlahpengembang', 'jumlahkecamatan'));
	}
}
