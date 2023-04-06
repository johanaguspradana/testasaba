<?php

namespace App\Http\Controllers;

use App\Models\bahanbaku;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BahanbakuController extends Controller
{

    public function index()
    {
        $data = DB::table('bahanbakus')->get();
        return view('data', ['data' => $data]);
    }
    public function getdata()
    {
        $data = bahanbaku::all();
        return response()->json($data);
    }    
    public function tampil()
    {
        return view('index');
    }
    public function calculateSnacks(Request $request)
    {
        $gula = $request->input('gula');
        $tepung = $request->input('tepung');
        $coklat = $request->input('coklat');

        $jumlahGula = $gula / 3;
        $jumlahTepung = $tepung / 4;
        $jumlahCoklat = $coklat / 2;

        $jumlahSnack = min($jumlahGula, $jumlahTepung, $jumlahCoklat);

        return response()->json(['jumlah_snack' => $jumlahSnack]);
    }
    
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
        'gula' => 'required',
        'tepung' => 'required',
        'coklat' => 'required'
        ]);

        // Tambahkan data ke database
        $data = new bahanbaku;
        $data->gula = $request->input('gula');
        $data->tepung = $request->input('tepung');
        $data->coklat = $request->input('coklat');
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
        $data = Data::find($id);

        // Kirimkan respons ke klien
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
        'gula' => 'required',
        'tepung' => 'required',
        'coklat' => 'required'
        ]);
        // Cari data berdasarkan id
        //dd($request);
        $data = bahanbaku::find($id);

        // Perbarui data
        $data->gula = $request->gula;
        $data->tepung = $request->tepung;
        $data->coklat = $request->coklat;
        // Simpan perubahan
        $data->save();

        // Kirimkan respons ke klien
        return response()->json(['message' => 'Data berhasil diupdate.']);
    }

    public function destroy($id)
    {
        // Cari data berdasarkan id
        $data = Data::find($id);
        // Hapus data
        $data->delete();

        // Kirimkan respons ke klien
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
