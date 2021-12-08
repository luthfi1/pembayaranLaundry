@extends('layouts.template')
@section('title')
Edit Paket
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('paket.update', $paket->id) }}" method="post" class="form-horizontal">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="label-control">Nama Paket</label>
                            <input type="text" class="form-control" name="nama_paket" value="{{$paket->nama_paket}}" required="required">
                        </div>
                        <div class="form-group">
                            <label class="label-control">Harga Paket</label>
                            <input type="text" class="form-control" name="harga" value="{{$paket->harga}}" required="required">
                        </div>
                        <div class="form-group">
                            <label class="label-control">Satuan</label>
                            <select name="satuan" class="form-control">
                                <option value="{{$paket->satuan}}" class="text-bold">{{ $paket->satuan }}</option>
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