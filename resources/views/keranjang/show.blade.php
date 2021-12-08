@extends('layouts.template')

@section('title')
Paket
@endsection

@section('content')

<div class="invoice p-3 mb-3">

        <div class="col-12">
            @if($keranjang->status_pembayaran=='belum dibayar')
            <div class="col-md-12">
                <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  
                    <i class="fa fa-exclamation-triangle"></i>
                    <b>{{$keranjang->pelanggan->nama_pelanggan}}</b> belum melakukan pembayaran
                </div>
            </div>
            @endif

            <div class="table-responsive">
                <a href="/keranjang"><i class="fa fa-arrow-left"></i></a>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Nama pelanggan</th>
                            <td>{{$keranjang->pelanggan->nama_pelanggan}}</td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon Pelanggan</th>
                            <td>{{$keranjang->pelanggan->nomor_telepon}}</td>
                        </tr>
                        <tr>
                            <th>Alamat Pelanggan</th>
                            <td>{{$keranjang->pelanggan->alamat_pelanggan}}</td>
                        </tr>
                        <tr>
                            <th>Paket Laundry</th>
                            <td>{{$keranjang->paket->nama_paket}}</td>
                        </tr>
                        <tr>
                            <th>Harga per {{$keranjang->paket->satuan}}:</th>
                            <td>Rp. {{$keranjang->paket->harga}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$keranjang->status_pesanan}}</td>
                        </tr>
                        <tr>
                            <th>Status Pembayaran</th>
                            <td>{{$keranjang->status_pembayaran}}</td>
                        </tr>
                        <tr>
                            <th>Outlet/Kurir Penerima:</th>
                            <td>{{$keranjang->outlet->nama_outlet}}</td>
                        </tr>
                        <tr>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
</div>


@endsection
