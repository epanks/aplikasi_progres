<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilayah;
use App\Balai;
use App\Satker;
use App\Paket;
use App\Paket7;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $wilayah = Wilayah::all();
        $balai = Balai::all();
        $satker = Satker::all();
        $paket = Paket::all();
        $paket7=Paket7::all();
        //dd($paket7);
        return view('home', compact('satker', 'balai','wilayah','paket','paket7'));
    }
}
