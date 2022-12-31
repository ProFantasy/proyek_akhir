<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function input() {
        return view('input_customer');
    }

    public function kirim(Request $request) {
        $validatedData = $request->validate([
            'ktp'=>['required','min:3','unique:customers'],
            'nama'=>'required',
            'alamat'=>'required',
            'no_hp'=>'required',
            'umur'=>'required',
            'jenis_kelamin'=>'required'
        ]);
        Customer::create($validatedData);
        return redirect('tampil_customer')->with('status', 'Data Customer Berhasil Dimasukkan');
    }

    public function tampil(){
        $model = new Customer;
        $data=$model->all();
        return view('tampil_customer',['data'=>$data]);
    }

    public function hapus($ktp){
        $model = Customer::find($ktp);
        $model->delete();
        return redirect('tampil_customer')->with('status-deleted','Data Customer Telah Dihapus');
    }

    public function edit($ktp){
        $model= Customer::find($ktp);
        return view('edit_customer')->with('post',$model);
    }

    public function update(Request $request, $ktp){
        $model= Customer::find($ktp);
        $rules = [
            'nama'=>'required',
            'alamat'=>'required',
            'no_hp'=>'required',
            'umur'=>'required',
            'jenis_kelamin'=>'required'
        ];
        if ($request->ktp != $model->ktp) {
            $rules['ktp'] = 'required|unique:customers';
        }
        $validatedData=$request->validate($rules);
        Customer::where('ktp', $model->ktp)
            ->update($validatedData);
            //dd('berhasil');
        return redirect('tampil_customer')->with('status', 'Data Customer Telah Diupdate');
    }
}
