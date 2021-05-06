<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $data_barang = Barang::all();
        return view('barang.index', compact(['data_barang']));
    }

    public function create(Request $request)
    {
        /// VALIDASI INPUT FORM DATA BARANG
        $this->validate($request,[
            'kode_barang' => 'required|unique:barang',
            'nama_barang' => 'required',
            'ukuran' => 'required',
            'warna' => 'required',
            'merek' => 'required',
            'jenis_barang' => 'required',
            'stok' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            
            ]);

        $barang = Barang::create($request->all());
        return redirect('/barang')->with('sukses', 'Data Berhasil Di-input!');
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('barang/edit', compact(['barang']));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        $barang->update($request->all());

        return redirect('/barang')->with('sukses', 'Data Berhasil Di-Update!');
    }

    public function delete($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect('/barang')->with('sukses', 'Data Berhasil Di-Hapus!');
    }
}
