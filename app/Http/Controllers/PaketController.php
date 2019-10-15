<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;
use App\Paket7;
use App\Satoutput;

class PaketController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_paket = Paket::where('nmpaket', 'LIKE', '%' . $request->cari . '%')->orWhere('kdpaket', 'LIKE', '%' . $request->cari . "%")->paginate(10);
            $data_paket7=$data_paket->paket7;
        } else {
            // $data_satoutput=Satoutput::all();
            // $dtsatoutput=$data_satoutput->load('paket');
            
            $data_paket = Paket::paginate(10);
            $data_paket7=$data_paket->load('paket7');
            //$dtsatoutput=$data_paket->load('satoutput');
            dd($data_paket7);
        }
        return view('paket.index', compact('data_paket7','data_paket','dtsatoutput'));
    }
    // public function create(Request $request)
    // {
        
    //     $paket = new paket();
    //     $paket->id=$request;
    //     $paket->kdsatker=$request->input("kdsatker");
    //     $paket->nmpaket=$request->input("nmpaket");
    //     $paket->pagurmp=$request->input("pagurmp");
    //     $paket->save();

    //     $paket7 = new paket7();
    //     $paket7->progres_keu=$request->input("progres_keu");
    //     $paket7->progres_fisik=$request->input("progres_fisik");
    //     $paket7->paket_id=id;
    //     $paket7->save();
        
    //     return redirect('/paket')->with('sukses', 'Data berhasil diinput');
    // }
    public function edit($id)
    {
        $data_paket = Paket::find($id);
        return view('paket/edit', ['data_paket' => $data_paket]);
    }
    public function update(Request $request, $id)
    {
        $data_paket = Paket::find($id);
        $data_paket->update($request->all());
        $data_paket7 = Paket7::find($id);
        $data_paket7->update($request->all());
        return redirect('/paket')->with('sukses', 'Data berhasil diupdate');
    }
    public function delete($id)
    {
        $data_paket = Paket::find($id);
        $data_paket->delete($data_paket);
        return redirect('/paket')->with('sukses', 'Data berhasil dihapus');
    }
}
