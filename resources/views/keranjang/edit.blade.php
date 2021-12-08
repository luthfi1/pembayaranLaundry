@extends('layouts.template')
@section('title')
Edi Pesanan Pesanan
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('keranjang.update', $keranjang->id) }}" method="post"
                        class="form-horizontal">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label class="label-control">Nama Pelanggan</label>
                            <select name="id_pelanggan" class="form-control">
                                <option value="{{$keranjang->pelanggan->id}}" class="text-bold">{{$keranjang->pelanggan->nama_pelanggan}}</option>

                                @foreach($pelanggan as $row)
                                    <option value="{{$row->id}}">{{$row->nama_pelanggan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Nama Outlet</label>
                            <select name="id_outlet" class="form-control">
                                <option value="{{$keranjang->outlet->id}}" class="text-bold">{{$keranjang->outlet->nama_outlet}}</option>
                                @foreach($outlet as $row)
                                    <option value="{{$row->id}}">{{$row->nama_outlet}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Nama Paket Laundry</label>
                            <select name="id_paket" class="form-control">
                                <option value="{{$keranjang->paket->id}}" class="text-bold">{{$keranjang->paket->nama_paket}}</option>
                                @foreach($paket as $row)
                                    <option value="{{$row->id}}">{{$row->nama_paket}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Tanggal Masuk</label>
                                <input type="date" value="{{$keranjang->tanggal_masuk}}" name="tanggal_masuk" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
