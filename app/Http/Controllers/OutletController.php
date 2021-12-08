<?php

namespace App\Http\Controllers;

use App\Outlet;
use Illuminate\Http\Request;
use Validator;

class OutletController extends Controller
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
        $outlet = Outlet::paginate(5);
        $cari = $request->get('keyword');
        if($cari)
        {
            $outlet = Outlet::where('nama_outlet','LIKE',"%$cari%")->paginate(3);
        }
        return view('outlet.index', compact('outlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outlet.create');
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
            'nama_outlet' => 'required|max:20',
            'alamat' => 'required',
            'nomor_telepon' => 'required|max:15'
        ]);
        if($validator->fails())
        {
            return redirect()->route('outlet.create')->withErrors($validator)->withInput();
        }
        Outlet::create($input);
        return redirect()->route('outlet.index')->with('success','Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $outlet = Outlet::findOrFail($id);
        return view ('outlet.edit', compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $outlet = Outlet::findOrFail($id);
        $data = $request->all();
        $outlet->update($data);
        return redirect()->route('outlet.index', compact('outlet'))->with('success','berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Outlet::findOrFail($id);
        $data->delete();
        return redirect()->route('outlet.index')->with('Success','Berhasil Dihapus');
    }
}
