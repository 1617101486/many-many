<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Pembelian;
use Session;
class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $a = Pembelian::with('Barang')->get();
        return view('pembelian.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barang = Barang::all();
        return view('pembelian.create',compact('barang'));
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
            'nik' => 'required|unique:pembelian',
            'nama' => 'required|unique:pembelian',
            'tanggal' => 'required',
            'id_barang' => 'required'
        ]);
        $beli = new Pembelian;
        $beli->nik = $request->nik;
        $beli->nama = $request->nama;
        $beli->tanggal = $request->tanggal;
        $beli->id_barang= $request->id_barang;
        $beli->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$beli->nama</b>"
        ]);
        return redirect()->route('pembelian.index');
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
        $pembelian = Pembelian::findOrFail($id);
        $barang = Barang::all();
        $selectedBarang = Pembelian::findOrFail($id)->id_barang;
        return view('pembelian.show',compact('pembelian','barang','selectedBarang'));
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
        $pembelian = Pembelian::findOrFail($id);
        $barang = Barang::all();
        $selectedBarang = Pembelian::findOrFail($id)->id_barang;
        return view('pembelian.edit',compact('pembelian','barang','selectedBarang'));
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
            'nik' => 'required',
            'nama' => 'required',
            'tanggal' => 'required',
            'id_barang' => 'required'
        ]);
        $beli = Pembelian::findOrFail($id);        
        $beli->nik = $request->nik;
        $beli->nama = $request->nama;
        $beli->tanggal = $request->tanggal;
        $beli->id_barang= $request->id_barang;
        $beli->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$beli->nama</b>"
        ]);
        return redirect()->route('pembelian.index');
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
        $a = Pembelian::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('penyalur.index');
    }
}
