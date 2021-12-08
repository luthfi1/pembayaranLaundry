@extends('layouts.template')

@section('title')
Paket
@endsection

@section('content')

<div class="invoice p-3 mb-3">

        <div class="col-12">

            <div class="table-responsive">
                <a href="/keranjang"><i class="fa fa-arrow-left"></i></a>
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Nama pelanggan</th>
                            <td>{{$transaksi->keranjang->pelanggan->nama_pelanggan}}</td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon Pelanggan</th>
                            <td>{{$transaksi->keranjang->pelanggan->nomor_telepon}}</td>
                        </tr>
                        <tr>
                            <th>Alamat Pelanggan</th>
                            <td>{{$transaksi->keranjang->pelanggan->alamat_pelanggan}}</td>
                        </tr>
                        <tr>
                            <th>Paket Laundry</th>
                            <td>{{$transaksi->keranjang->paket->nama_paket}}</td>
                        </tr>
                        <tr>
                            <th>Harga per {{$transaksi->keranjang->paket->satuan}}:</th>
                            <td>Rp. {{$transaksi->keranjang->paket->harga}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$transaksi->keranjang->status_pesanan}}</td>
                        </tr>
                        <tr>
                            <th>Status Pembayaran</th>
                            <td>{{$transaksi->keranjang->status_pembayaran}}</td>
                        </tr>
                        <tr>
                            <th>Outlet/Kurir Penerima:</th>
                            <td>{{$transaksi->keranjang->outlet->nama_outlet}}</td>
                        </tr>
                        <tr>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
