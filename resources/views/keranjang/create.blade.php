@extends('layouts.template')
@section('title')
Tambah Pesanan
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('keranjang.store') }}" method="post"
                        class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="label-control">Nama Pelanggan</label>
                            <select name="id_pelanggan" class="form-control" required="required">
                                @foreach($pelanggan as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama_pelanggan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="label-control">Nama Outlet</label>
                            <select name="id_outlet" class="form-control" required="required">
                                @foreach($outlet as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama_outlet }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="label-control">Paket Laundry</label>
                            <select name="id_paket" class="form-control" required="required">
                                @foreach($paket as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="label-control">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" class="form-control" required="required">
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
