<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    use HasFactory;
    /**
    * The primary key associated with the table.
    *
    * @var string
    * @var bool
    * @var array
    */
    protected $fillable=[
        'id_barang',
        'id_pembeli',
        'nama_barang',
        'nama_pembeli',
        'tanggal_pembelian',
        'jumlah',
        'kurir'
    ];
}
