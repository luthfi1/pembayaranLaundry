<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;
use App\Pelanggan;
use App\Paket;
use App\Transaksi;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $outlet = Outlet::count();
        $pelanggan = Pelanggan::count();
        $paket = Paket::count();
        $transaksi = Transaksi::sum('subtotal');
        
        return view('home', compact('outlet','pelanggan','paket','transaksi'));
    }
}
