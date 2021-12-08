<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;
use Validator;

class PelangganController extends Controller
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
        $pelanggan = Pelanggan::paginate(5);
        $cari = $request->get('keyword');
        if($cari)
        {
            $pelanggan = Pelanggan::where('nama_pelanggan','LIKE',"%$cari%")->paginate(3);
        }
        return view('pelanggan.index',compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'nama_pelanggan' => 'required|max:100',
            'alamat_pelanggan' => 'required',
            'nomor_telepon' => 'required'
        ]);
        if($validator->fails())
        {
            return redirect()->route('pelanggan.index')->withErrors($validator)->withInput();
        }
        Pelanggan::create($data);
        return redirect()->route('pelanggan.index')->with('success','Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $data = $request->all();
        $pelanggan->update($data);
        return redirect()->route('pelanggan.index')->with('success','Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Pelanggan::findOrFail($id);
        $data->delete();
        return redirect()->route('pelanggan.index')->with('success','Berhasil');
    }
}
