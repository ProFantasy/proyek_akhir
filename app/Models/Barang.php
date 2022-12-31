<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    /**
    * The primary key associated with the table.
    *
    * @var string
    * @var bool
    * @var array
    */
    protected $primaryKey = 'kode_barang';
    public $incrementing = false;
    protected $fillable=[
        'kode_barang',
        'nama_barang',
        'harga_barang',
        'deskripsi_barang',
        'stok_barang'
    ];

    public function pembelian() {
        return $this->hasMany(pembelian::class, 'foreign_key');
    }
}
