<?php

namespace App\Http\Controllers;

use App\Models\DetailProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $detail_produk = DetailProduk::with('produk')->get();
        return view('ecommerce.detail_produk.index', ['detail_produk' => $detail_produk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $produk = produk::all();
        return view('ecommerce.detail_produk.create', compact('produk'));
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
        $validated = $request->validate([
            'jumlah_pembelian' => 'required',
            'detail' => 'required',
            'spesifikasi' => 'required',
            'id_produks' => 'required|unique:detail_produks',
        ]);

        $detail_produk = new DetailProduk();
        $detail_produk->jumlah_pembelian = $request->jumlah_pembelian;
        $detail_produk->detail = $request->detail;
        $detail_produk->spesifikasi = $request->jumlah_pembelian;
        $detail_produk->id_produks = $request->id_produks;
        $detail_produk->save();
        return redirect()->route('detail_produk.index')->with('success', 'Data Berhasil Dibuat!');
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
        $detail_produk = DetailProduk::FindOrFail($id);
        $produk = Produk::all();
        return view('ecommerce.detail_produk.show', compact('detail_produk','produk'));
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
        $detail_produk = DetailProduk::FindOrFail($id);
        $produk = Produk::all();
        return view('ecommerce.detail_produk.edit', compact('detail_produk','produk'));
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
        $detail_produk = DetailProduk::FindOrFail($id);

        $validated = $request->validate([
            'jumlah_pembelian' => 'required',
            'detail' => 'required',
            'spesifikasi' => 'required',
            'id_produks' => 'required',
        ]);

        $detail_produk->jumlah_pembelian = $request->jumlah_pembelian;
        $detail_produk->detail = $request->detail;
        $detail_produk->spesifikasi = $request->spesifikasi;
        $detail_produk->id_produks = $request->id_produks;
        $detail_produk->save();
        return redirect()->route('detail_produk.index')->with('success', 'Data Berhasil Diedit!');
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
        $detail_produk = DetailProduk::FindOrFail($id);
        return redirect()->route('detail_produk.index')->with('success', "Data Berhasil Dihapus!");
    }
}
