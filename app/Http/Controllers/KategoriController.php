<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kategori = DB::table('kategoris')->get();
        // dd($kategori);
        return view('latihan.kategori', [
            'kategori' => $kategori,
            'title' => 'Kategori'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah(Request $request)
    {
        $validasi = $request->validate([
            'kategori' => 'required',
            'keterangan' => 'required'
        ]);
        if ($validasi == true) {
            DB::table('kategoris')->insert([
                'kategori' => $request->kategori,
                'keterangan' => $request->keterangan
            ]);
            return redirect('kategori');
        }
        // dd($data);
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
    // public function edit(Request $request, $kategori_id)
    // {

    //     // DB::table('kategories')->where('kategori_id',)
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $kategori_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = array(
            'kategori' => $request->post('kategori'),
            'keterangan' => $request->post('keterangan')
        );
        DB::table('kategoris')->where('kategori_id', '=', $request->post('kategori_id'))->update($data);
        return redirect('kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kategoris')->where('kategori_id', '=', $id)->delete();
        // dd($data);
        return redirect('kategori');
    }
}
