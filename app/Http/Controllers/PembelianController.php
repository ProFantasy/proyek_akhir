<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Customer;
use App\Models\pembelian;

class PembelianController extends Controller
{
    public function input() {
        $customer = Customer::all();
        $barang = Barang::all();
        return view('input_pembelian',compact('customer'))->with('barang' ,$barang);
    }

    public function kirim(Request $request) {
        $validatedData = $request->validate([
            'id_barang'=>'required',
            'id_pembeli'=>'required',
            'tanggal_pembelian'=>'required',
            'jumlah'=>'required',
            'kurir'=>'required'
        ]);
        // dd($validatedData);
        $id_pembeli = $request -> id_pembeli;
        $data = Customer::find($id_pembeli);
        $namapembeli = $data -> nama;
        $id_barang = $request -> id_barang;
        $item = Barang::find($id_barang);
        $namabarang = $item -> nama_barang;
        // dd($namapembeli, $namabarang);
        pembelian::create([
            'id_barang'=>$validatedData['id_barang'],
            'id_pembeli'=>$validatedData['id_pembeli'],
            'nama_pembeli'=>$namapembeli,
            'nama_barang'=>$namabarang,
            'tanggal_pembelian'=>$validatedData['tanggal_pembelian'],
            'jumlah'=>$validatedData['jumlah'],
            'kurir'=>$validatedData['kurir']
        ]);
        return redirect('tampil_pembelian')->with('status', 'Data Pembelian Berhasil Dimasukkan');
    }

    public function tampil(){
        $model = new pembelian;
        $data=$model->all();
        return view('tampil_pembelian',['data'=>$data]);
    }

    public function hapus($kode_barang){
        $model = pembelian::find($kode_barang);
        $model->delete();
        return redirect('tampil_pembelian')->with('status-deleted','Data Pembelian Telah Dihapus');
    }

    public function edit($id){
        $customer = Customer::all();
        $barang = Barang::all();
        $model= pembelian::find($id);
        return view('edit_pembelian', [
            'post'=>$model,
            'customer'=>$customer,
            'barang'=>$barang
        ]);
    }

    public function update(Request $request, $id){
        $model= pembelian::find($id);
        $rules = [
            'id_barang'=>'required',
            'id_pembeli'=>'required',
            'tanggal_pembelian'=>'required',
            'jumlah'=>'required',
            'kurir'=>'required'
        ];
        $id_pembeli = $request -> id_pembeli;
        $data = Customer::find($id_pembeli);
        $namapembeli = $data -> nama;
        $id_barang = $request -> id_barang;
        $item = Barang::find($id_barang);
        $namabarang = $item -> nama_barang;
        // dd($namapembeli, $namabarang);
        $validatedData=$request->validate($rules);
        pembelian::where('id', $model->id)
            ->update([
                'id_barang'=>$validatedData['id_barang'],
                'id_pembeli'=>$validatedData['id_pembeli'],
                'nama_pembeli'=>$namapembeli,
                'nama_barang'=>$namabarang,
                'tanggal_pembelian'=>$validatedData['tanggal_pembelian'],
                'jumlah'=>$validatedData['jumlah'],
                'kurir'=>$validatedData['kurir']
            ]);
            //dd('berhasil');
        return redirect('tampil_pembelian')->with('status', 'Data Pembelian Telah Diupdate');
    }
}
