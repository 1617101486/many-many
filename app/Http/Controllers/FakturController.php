<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faktur;
use App\Kasir; 
use Session;
class FakturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $a = Faktur::with('Kasir')->get();
        return view('faktur.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kasir = Kasir::all();
        return view('faktur.create',compact('kasir'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'kode' => 'required|unique:faktur',
            'tanggal' => 'required|',
            'id_kasir' => 'required'
        ]);
        $mhs = new Faktur;
        $mhs->kode = $request->kode;
        $mhs->tanggal = $request->tanggal;
        $mhs->id_kasir = $request->id_kasir;
        $mhs->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$mhs->kode</b>"
        ]);
        return redirect()->route('faktur.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $fkr = Faktur::findOrFail($id);
        $ksr = Kasir::all();
        $selectedKasir = Faktur::findOrFail($id)->id_kasir;
        return view('faktur.show',compact('fkr','ksr','selectedKasir'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $fkr = Faktur::findOrFail($id);
        $ksr = Kasir::all();
        $selectedKasir = Faktur::findOrFail($id)->id_kasir;
        return view('faktur.edit',compact('fkr','ksr','selectedKasir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'kode' => 'required|',
            'tanggal' => 'required|',
            'id_kasir' => 'required'
            ]);
        $mhs = Faktur::findOrFail($id);
        $mhs->kode = $request->kode;
        $mhs->tanggal = $request->tanggal;
        $mhs->id_kasir = $request->id_kasir;
        $mhs->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$mhs->kode</b>"
        ]);
        return redirect()->route('faktur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $a = Faktur::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('faktur.index');
    }
}
