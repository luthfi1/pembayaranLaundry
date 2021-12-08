@extends('layouts.template')
@section('title')
Tambah User
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('user.store')}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="label-control">Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" required="required">
                        </div>
                        <div class="form-group">
                            <label class="label-control">Nama Pengguna (username)</label>
                            <input type="text" class="form-control" name="username" required="required">
                        </div>
                        <div class="form-group">
                            <label class="label-control">Email</label>
                            <input type="email" class="form-control" name="email" required="required">
                        </div>
                        <div class="form-group">
                            <label class="label-control">Level</label>
                            <select name="level" id="level" class="form-control">
                                <option value="petugas">Petugas</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label-control">Password</label>
                            <input type="password" class="form-control" name="password" required="required">
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