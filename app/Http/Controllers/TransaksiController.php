<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Keranjang;
use Illuminate\Http\Request;
use Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index(Request $request)
    {
        $transaksi = Transaksi::paginate(5);
        $keranjang = Keranjang::all();
        return view('transaksi.index', compact('transaksi','keranjang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $keranjang = Keranjang::all();
        return view('transaksi.create', compact('keranjang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_keranjang' => 'required',
            'jumlah_paket' => 'required|max:3',
            'tanggal_bayar' => 'required'
        ]);
        if($validator->fails())
        {
            return redirect()->route('transaksi.create')->withErrors($validator)->withInput();
        }
        $keranjang = Keranjang::find($request->id_keranjang);
        $input['subtotal'] = $input['jumlah_paket'] * $keranjang->paket->harga;
        
        Transaksi::create($input);

        
        $keranjang->status_pembayaran = 'lunas';
        $keranjang->status_pesanan = 'selesai';
        $keranjang->save();

        return redirect()->route('transaksi.index')->with('success','Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $keranjang = Keranjang::all();
        return view('transaksi.show', compact('transaksi','keranjang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function print($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $keranjang = Keranjang::all();
        return view('transaksi.invoice', compact('transaksi','keranjang'));
    }
}
