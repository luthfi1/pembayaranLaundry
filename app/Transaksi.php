<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'id_keranjang', 'tanggal_bayar', 'jumlah_paket', 'subtotal'
    ];

    public function keranjang()
    {
        return $this->belongsTo('App\Keranjang','id_keranjang');
    }
}
