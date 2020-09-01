<?php

namespace App\Http\Controllers;

use App\Databarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        try {
            $valid = Validator::make($request->all(), [
                'id_barang' => 'required|array|min:1',   //request->id_barang
                //'id_barang.*' => 'required|numeric|exists:tabel_barang,id' //<-- nama_tabel database karo idne apa
            ]);
            if ($valid->fails()) {
                //return redirect()'pesan eror, pilih salah satu barang';
            }
            $data = Databarang::whereIn('id', $request->id_barang)->delete(); //karena nganggo whereIn, baka $request->id_barange kosong atau laka sng diceklist dadie ya keapus kabeh. wkwkkw
            return redirect('databarang')->with('hapus', '');
        } catch (\Exception $exception) {
            return 'Error cuy. ' . collect($exception->getMessage())->join('<br>');
            //throw new \Exception($exception->getMessage());
        }
    }
}
