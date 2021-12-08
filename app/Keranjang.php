<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';
    protected $fillable = [
        'id_paket','id_outlet','id_pelanggan','status_pemesanan',
        'tanggal_masuk','status_pembayaran'
    ];

    public function paket()
    {
        return $this->belongsTo('App\Paket','id_paket');
    }

    public function outlet()
    {
        return $this->belongsTo('App\Outlet','id_outlet');
    }

    public function pelanggan()
    {
        return $this->belongsTo('App\Pelanggan','id_pelanggan');
    }

}
