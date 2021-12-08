@extends('layouts.template')
@section('title')
Tambah Paket
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('paket.store')}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="label-control">Nama Paket</label>
                            <input type="text" class="form-control" name="nama_paket" required="required">
                        </div>
                        <div class="form-group">
                            <label class="label-control">Harga Paket</label>
                            <input type="text" class="form-control" name="harga" required="required">
                        </div>
                        <div class="form-group">
                            <label class="label-control">Satuan</label>
                            <select name="satuan" class="form-control" required="required">
                                <option value="null">-Pilih Satuan-</option>
                                <option value="kilo">Kiloan</option>
                                <option value="unit">Unit</option>
                                <option value="roll">Roll</option>
                                <option value="lembar">Lembar</option>
                            </select>
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