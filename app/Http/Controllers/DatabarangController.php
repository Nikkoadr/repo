<?php

namespace App\Http\Controllers;

use App\Databarang;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class DatabarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databarang = Databarang::all();
        return view('databarang', compact('databarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Databarang::create(
            [
                'barcode' => $request->barcode,
                'nama_barang' => $request->nama_barang,
                'stok' => $request->stok,
                'harga_beli' => $request->harga_beli,
                'harga_jual_sedikit' => $request->harga_jual_sedikit,
                'harga_jual_banyak' => $request->harga_jual_banyak,
                'harga_grosir' => $request->harga_grosir,
            ]
        );
        return redirect()->back()->with('tambah', '');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Databarang  $databarang
     * @return \Illuminate\Http\Response
     */
    public function show(Databarang $databarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Databarang  $databarang
     * @return \Illuminate\Http\Response
     */
    public function edit(Databarang $databarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Databarang  $databarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Databarang $databarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Databarang  $databarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Databarang::whereIn('id', $request->id_barang)->delete();
        return redirect('databarang')->with('hapus', '');
    }
}
