<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Penyalur;
use Session;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $a = Barang::with('Penyalur')->get();
        return view('barang.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $penyalur = Penyalur::all();
        return view('barang.create',compact('penyalur'));
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
            'kode' => 'required|unique:barang',
            'nama' => 'required|unique:barang',
            'hargajual' => 'required',
            'hargabeli' => 'required',
            'jumlah' => 'required',
            'id_penyalur' => 'required'
        ]);
        $brg = new Barang;
        $brg->kode = $request->kode;
        $brg->nama = $request->nama;
        $brg->hargajual = $request->hargajual;
        $brg->hargabeli = $request->hargabeli;
        $brg->jumlah = $request->jumlah;
        $brg->id_penyalur = $request->id_penyalur;
        $brg->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$brg->nama</b>"
        ]);
        return redirect()->route('barang.index');
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
        $barang = Barang::findOrFail($id);
        $penyalur = Penyalur::all();
        $selectedPenyalur = Barang::findOrFail($id)->id_penyalur;
        return view('barang.show',compact('barang','penyalur','selectedPenyalur'));
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
        $barang = Barang::findOrFail($id);
        $penyalur = Penyalur::all();
        $selectedPenyalur = Barang::findOrFail($id)->id_penyalur;
        return view('barang.edit',compact('barang','penyalur','selectedPenyalur'));
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
            'kode' => 'required',
            'nama' => 'required',
            'hargajual' => 'required',
            'hargabeli' => 'required',
            'jumlah' => 'required',
            'id_penyalur' => 'required'
        ]);
        $brg = Barang::findOrFail($id);
        $brg->kode = $request->kode;
        $brg->nama = $request->nama;
        $brg->hargajual = $request->hargajual;
        $brg->hargabeli = $request->hargabeli;
        $brg->jumlah = $request->jumlah;
        $brg->id_penyalur = $request->id_penyalur;
        $brg->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menngedit <b>$brg->nama</b>"
        ]);
        return redirect()->route('barang.index');
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
        $a = Barang::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('penyalur.index');
    }
}
