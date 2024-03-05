<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StokBarang;

class Cashier extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'id_barang',
        'jumlah_pesanan',
        'harga',
        'tanggal_transaksi',
        'total_bayar',
        'flag'
    ];

    public function Barang()
    {
        return $this->belongsTo(StokBarang::class, 'id_barang');
    }
}