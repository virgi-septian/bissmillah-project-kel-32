<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
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
        $a = KategoriProduk::all();
        return view('ecommerce.kategori_produk.index', ['kategoriproduk' => $a]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ecommerce.kategori_produk.create');
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
        $validate = $request->validate([
            'kategori_produk' => 'required|unique:kategori_produks',
        ]);

        $KategoriProduk = new KategoriProduk();
        $KategoriProduk->kategori_produk = $request->kategori_produk;

        $KategoriProduk->save();

        return redirect()->route('kategori_produk.index')->with('success', 'Data Berhasil Dibuat');
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
        $kategoriproduk = KategoriProduk::FindOrFail($id);
        return view('ecommerce.kategori_produk.show', compact('kategoriproduk'));
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
        $kategoriproduk = KategoriProduk::FindOrFail($id);
        return view('ecommerce.kategori_produk.edit', compact('kategoriproduk'));
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
        $validate = $request->validate([
            'kategori_produk' => 'required|unique:kategori_produks',
        ]);

        $KategoriProduk = KategoriProduk::FindOrFail($id);
        $KategoriProduk->kategori_produk = $request->kategori_produk;
        $KategoriProduk->save();

        return redirect()->route('kategori_produk.index')->with('success', 'Data Berhasil Diedit');
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
        $KategoriProduk = KategoriProduk::FindOrFail($id);
        $KategoriProduk->delete();
        return redirect()->route('kategori_produk.index')->with('success', "Data Berhasil Di Hapus!");
    }
}