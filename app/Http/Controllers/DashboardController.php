<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Customer;
use App\Models\pembelian;

class DashboardController extends Controller
{
    public function mount(){
    }
    public function index(){
        $jumlahcustomer=Customer::count();
        $jumlahpembelian=pembelian::count();
        $pembelian=pembelian::select()->get()->groupBy('kurir');
        // dd($pembelian);
        $kurirs=[];
        $kurirCount=[];
        foreach($pembelian as $kurir => $values){
            $kurirs[]=$kurir;
            $kurirCount[]=count($values);
        }
        // dd($kurirs,$kurirCount);
        return view('dashboard',[
                                'jumlahcustomer'=>$jumlahcustomer,
                                'jumlahpembelian'=>$jumlahpembelian,
                                'kurirs'=>$kurirs,
                                'kurirCount'=>$kurirCount
                                ]);
    }
}
