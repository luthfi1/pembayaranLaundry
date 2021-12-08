@extends('layouts.template')
@section('title')
Transaksi
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('transaksi.store') }}" method="post"
                        class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="label-control">Nama Pelanggan</label>
                            <select name="id_keranjang" class="form-control" required="required">
                                @foreach($keranjang as $row)
                                    @if($row->status_pembayaran=='belum dibayar')
                                        <option value="{{ $row->id }}">{{ $row->pelanggan->nama_pelanggan }}/{{$row->paket->nama_paket}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Jumlah Paket</label>
                            <input type="number" name="jumlah_paket" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label class="label-control">Tanggal Pembayaran</label>
                            <input type="date" name="tanggal_bayar" class="form-control" required="required">
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
