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
        $databarang = [];
        return view('databarang', compact('databarang'));
    }
    public function tabel(Request $request){
        try{
            $data = Databarang::all();
            $data->map(function($data,$index){
                $data->no = $index + 1;
            });
            return ['data'=>$data,'draw'=>$request->draw,'recordsTotal'=>$data->count(),'recordsFiltered'=>$data->count()];
        }catch(Exception $exc){
            throw new Exception($exc->getMessage());
            
        }
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
        Databarang::edit(
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
        return redirect()->back()->with('edit', '');
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
                'id_barang' => 'required|array|min:1',
            ]);
            if ($valid->fails()) {
                return ['code'=>500,'msg'=>collect($valid->errors()->all()->join('#'))];
                //return redirect()->back()->with('kosong', '');
            }
            $data = Databarang::whereIn('id', $request->id_barang)->delete(); //karena nganggo whereIn, baka $request->id_barange kosong atau laka sng diceklist dadie ya keapus kabeh. wkwkkw
            return ['code'=>1000,'msg'=>'wis diapus cuy'];
            //return redirect('databarang')->with('hapus', '');
        } catch (\Exception $exception) {
            return 'Error cuy. ' . collect($exception->getMessage())->join('<br>');
            throw new \Exception($exception->getMessage());
        }
    }
}
