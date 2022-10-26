<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = DB::table('kategoris')->get();
        $produk = DB::table('produks')->join('kategoris', 'kategoris.kategori_id',  '=', 'produks.kategori_id')->get();
        // dd($kategori);
        return view('latihan.produk', [
            'kategori' => $kategori,
            'produk_join' => $produk,
            'title' => 'Produk'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah(Request $request)
    {
        DB::table('produks')->insert([
            'kategori_id' => $request->kategori_id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);
        // dd($data);
        return redirect('produk');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $produk_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = array(
            'produk_id' => $request->post('produk_id'),
            'kategori_id' => $request->post('kategori_id'),
            'nama' => $request->post('nama'),
            'deskripsi' => $request->post('deskripsi'),
            'harga' => $request->post('harga'),
            'stok' => $request->post('stok')
        );
        // dd($data);
        DB::table('produks')->where('produk_id', '=', $request->post('produk_id'))->update($data);
        return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('produks')->where('produk_id', '=', $id)->delete();
        return redirect('produk');
    }
}
