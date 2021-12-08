<?php

namespace App\Http\Controllers;

use App\Paket;
use Illuminate\Http\Request;
use Validator;

class PaketController extends Controller
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
        $paket = Paket::paginate(5);
        $cari = $request->get('keyword');
        if($cari)
        {
            $paket = Paket::where('nama_paket', 'LIKE', "%$cari%")->paginate(3);
        }
        return view('paket.index', compact('paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paket.create');
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
        $validator = Validator::make($input,[
            'nama_paket' => 'required|max:20',
            'harga' => 'required|max:9',
            'satuan' => 'required'
        ]);
        if($validator->fails())
        {
            return redirect()->route('paket.create')->withErrors($validator)->withInput();
        }
        Paket::create($input);
        return redirect()->route('paket.index')->with('success','Paket Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paket = Paket::findOrFail($id);
        return view('paket.edit', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paket = Paket::findOrFail($id);
        $data = $request->all();
        $paket->update($data);
        return redirect()->route('paket.index')->with('success','Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Paket::findOrFail($id);
        $data->delete();
        return redirect()->route('paket.index')->with('status','Berhasil Dihapus');
    }
}
