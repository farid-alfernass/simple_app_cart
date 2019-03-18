<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Cache;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chart1 = DB::table('mahasiswa')
                                        ->join('prodi', 'mahasiswa.prodi_id', '=', 'prodi.id')
                                        ->select( DB::raw('count(mahasiswa.id) as jumlah'), 'prodi.nama_prodi')
                                        ->groupBy('prodi.nama_prodi')
                                        ->get()->toArray();
        $chart2 = DB::table('prodi')
                                        ->join('mahasiswa', 'prodi.id', '=', 'mahasiswa.prodi_id')
                                        ->select( DB::raw('count(mahasiswa.prodi_id) as jumlah'), 'prodi.nama_prodi')
                                        ->where('mahasiswa.jenis_kelamin','=','L')
                                        ->groupBy('prodi.nama_prodi')
                                        ->get()->toArray();
        $chart3 = DB::table('prodi')
                                        ->join('mahasiswa', 'prodi.id', '=', 'mahasiswa.prodi_id')
                                        ->select( DB::raw('count(mahasiswa.prodi_id) as jumlah'), 'prodi.nama_prodi')
                                        ->where('mahasiswa.jenis_kelamin','=','P')
                                        ->groupBy('prodi.nama_prodi')
                                        ->get()->toArray();
        $chart4 = DB::table('mahasiswa')
                                        ->select( DB::raw('count(mahasiswa.id) as jumlah'), 'mahasiswa.jenis_kelamin')
                                        ->groupBy('mahasiswa.jenis_kelamin')
                                        ->get()->toArray();

        $test = "Hello";
        return view('home', ['a' => $test,'chartprodi' => $chart1,'chartL' => $chart2,'chartP' => $chart3,'chartmhs' => $chart4]);
    }
}
