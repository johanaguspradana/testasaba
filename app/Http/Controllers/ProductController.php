<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\bahanbaku;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data = DB::table('products')->get();
        return view('product', ['data' => $data]);
    }
    public function getdata()
    {
        $data = product::all();
        return response()->json($data);
    }    
    public function tampil()
    {
        return view('index');
    }
    public function snak()
    {
        return view('perhitungan');
    }

    public function hitungSnak(Request $request)
    {
        // Ambil nilai bahan baku dari tabel bahan_baku
    $bahan_baku = DB::table('bahanbakus')->first();

    // Ambil nilai gula, tepung, dan coklat dari tabel produk
    $produk = DB::table('products')->first();

    // Hitung jumlah maksimum snak yang dapat diproduksi
    $jumlah_snak_gula = floor($bahan_baku->gula / $produk->productgula);
    $jumlah_snak_tepung = floor($bahan_baku->tepung / $produk->producttepung);
    $jumlah_snak_coklat = floor($bahan_baku->coklat / $produk->productcoklat);

    $jumlah_snak = min($jumlah_snak_gula, $jumlah_snak_tepung, $jumlah_snak_coklat);

    // Mengembalikan hasil perhitungan dalam bentuk JSON
    return response()->json([
        'jumlah_snak' => $jumlah_snak
    ]);
    }
    
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
        'productgula' => 'required',
        'producttepung' => 'required',
        'productcoklat' => 'required'
        ]);

        // Tambahkan data ke database
        $data = new product;
        $data->productgula = $request->input('productgula');
        $data->producttepung = $request->input('producttepung');
        $data->productcoklat = $request->input('productcoklat');
        $data->save();

        // Kirimkan respons ke klien
        return response()->json([
        'status' => 'success',
        'message' => 'Data berhasil ditambahkan'
        ]);
    }

    public function edit($id)
    {
        // Cari data berdasarkan id
        $data = product::find($id);

        // Kirimkan respons ke klien
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
        'productgula' => 'required',
        'producttepung' => 'required',
        'productcoklat' => 'required'
        ]);
        // Cari data berdasarkan id
        //dd($request);
        $data = product::find($id);

        // Perbarui data
        $data->productgula = $request->productgula;
        $data->producttepung = $request->producttepung;
        $data->productcoklat = $request->productcoklat;
        // Simpan perubahan
        $data->save();

        // Kirimkan respons ke klien
        return response()->json(['message' => 'Data berhasil diupdate.']);
    }

    public function destroy($id)
    {
        // Cari data berdasarkan id
        $data = product::find($id);
        // Hapus data
        $data->delete();

        // Kirimkan respons ke klien
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
