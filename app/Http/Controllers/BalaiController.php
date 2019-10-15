<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balai;

class BalaiController extends Controller
{
    public function index(Request $request)
    {       
        $data_balai = Balai::paginate(16);        
        return view('balai.index', compact('data_balai'));
    }
}
