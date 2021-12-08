@extends('layouts.template')
@section('title')
Edit Outlet
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('outlet.update', $outlet->id) }}" method="post" class="form-horizontal">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="label-control">Nama Outlet</label>
                            <input type="text" class="form-control" name="nama_outlet" value="{{$outlet->nama_outlet}}" required="required">
                        </div>
                        <div class="form-group">
                            <label class="label-control">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="4">{{$outlet->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Nomor Telepon</label>
                            <input type="text" class="form-control" name="nomor_telepon" value="{{$outlet->nomor_telepon}}" required="required">
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