<?php

namespace App\Http\Controllers;

use App\Keranjang;
use App\Paket;
use App\Outlet;
use App\Pelanggan;
use Illuminate\Http\Request;
use Validator;

class KeranjangController extends Controller
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
        $keranjang = Keranjang::paginate(5);
        $paket = Paket::all();
        $outlet = Outlet::all();
        $pelanggan = Pelanggan::all();
        $pencarian = '';
        $cari_pelanggan = $request->get('id_pelanggan');
        if($cari_pelanggan)
        {
            $keranjang = Keranjang::where('id_pelanggan',$cari_pelanggan)->paginate(2);
            $hasil = Pelanggan::find($cari_pelanggan);
            $pencarian = $hasil->pelanggan;
        }
        return view('keranjang.index',compact('keranjang','paket','pelanggan','outlet','pencarian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paket = Paket::all();
        $outlet = Outlet::all();
        $pelanggan = Pelanggan::all();
        return view('keranjang.create', compact('paket','pelanggan','outlet'));
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
            'id_pelanggan' => 'required',
            'id_outlet' => 'required',
            'id_paket' => 'required',
            'tanggal_masuk' => 'required'
        ]);
        if($validator->fails())
        {
            return redirect()->route('keranjang.create')->withErrors($validator)->withInput();
        }
        Keranjang::create($input);
        return redirect()->route('keranjang.index')->with('success','Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $paket = Paket::all();
        $outlet = Outlet::all();
        $pelanggan = Pelanggan::all();
        return view('keranjang.show', compact('keranjang','paket','pelanggan','outlet'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $paket = Paket::all();
        $outlet = Outlet::all();
        $pelanggan = Pelanggan::all();
        return view('keranjang.edit', compact('keranjang','paket','pelanggan','outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $paket = Paket::all();
        $outlet = Outlet::all();
        $pelanggan = Pelanggan::all();
        $data = $request->all();
        $keranjang->update($data);
        return redirect()->route('keranjang.index', compact('keranjang','paket','pelanggan','outlet'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Keranjang::findOrFail($id);
        $data->delete();
        return redirect()->route('keranjang.index')->with('success','Berhasil');
    }
}
