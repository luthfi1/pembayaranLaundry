@extends('layouts.template')
@section('title')
Tambah Pelanggan
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('pelanggan.store')}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="label-control">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama_pelanggan" required="required">
                        </div>
                        <div class="form-group">
                            <label class="label-control">Alamat</label>
                            <textarea name="alamat_pelanggan" id="alamat" class="form-control" rows="4" required="required"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Nomor Telepon</label>
                            <input type="number" class="form-control" name="nomor_telepon" required="required">
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