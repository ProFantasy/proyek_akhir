<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function input() {
        return view('input_barang');
    }

    public function kirim(Request $request) {
        $validatedData = $request->validate([
            'kode_barang'=>['required','min:3','unique:barangs'],
            'nama_barang'=>'required',
            'harga_barang'=>'required',
            'deskripsi_barang'=>'required',
            'stok_barang'=>'required'
        ]);
        Barang::create($validatedData);
        return redirect('tampil_barang')->with('status', 'Barang Berhasil Dimasukkan');
    }

    public function tampil(){
        $model = new Barang;
        $data=$model->all();
        return view('tampil_barang',['data'=>$data]);
    }

    public function hapus($kode_barang){
        $model = Barang::find($kode_barang);
        $model->delete();
        return redirect('tampil_barang')->with('status-deleted','Barang Telah Dihapus');
    }

    public function edit($kode_barang){
        $model= Barang::find($kode_barang);
        return view('edit_barang')->with('post',$model);
    }

    public function update(Request $request, $kode_barang){
        $model= Barang::find($kode_barang);
        $rules = [
            'nama_barang'=>'required',
            'harga_barang'=>'required',
            'deskripsi_barang'=>'required',
            'stok_barang'=>'required'
        ];
        if ($request->kode_barang != $model->kode_barang) {
            $rules['kode_barang'] = 'required|unique:barangs';
        }
        $validatedData=$request->validate($rules);
        Barang::where('kode_barang', $model->kode_barang)
            ->update($validatedData);
            //dd('berhasil');
        return redirect('tampil_barang')->with('status', 'Barang Telah Diupdate');
    }
}
