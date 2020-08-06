<?php

namespace App\Http\Controllers\Admin;

use App\Kecamatan;
use App\Kelurahan;
use App\Pengembang;
use App\Perumahan;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct(){
		$this->middleware('auth:admin');
	}

	public function index(){
		$kecamatan = Kecamatan::all();
		$jumlahkecamatan = $kecamatan->count();

		$kelurahan = Kelurahan::all();
		$jumlahkelurahan = $kelurahan->count();

		$pengembang = Pengembang::all();
		$jumlahpengembang = $pengembang->count();

		$perumahan = Perumahan::all();
		$jumlahperumahan = $perumahan->count();

		$perkecamatan = DB::select('SELECT kecamatan, COUNT(kecamatan) as perkecamatan FROM `perumahan` GROUP BY kecamatan');

		return view('admin/dashboard', compact('jumlahkecamatan', 'jumlahkelurahan', 'jumlahperumahan', 'jumlahpengembang', 'perkecamatan'));
	}
}
