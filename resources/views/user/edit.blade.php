@extends('layouts.template')
@section('title')
Edit User
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="post" class="form-horizontal">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="label-control">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_user" value="{{$user->name}}" required="required">
                        </div>
                        <div class="form-group">
                            <label class="label-control">Nama Pengguna (username)</label>
                            <input type="text" class="form-control" name="username" value="{{$user->username}}" required="required">
                        </div>
                        <div class="form-group">
                            <label class="label-control">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" required="required">
                        </div>
                        <div class="form-group">
                            <label class="label-control">Level</label>
                            <select name="level" class="form-control">
                                <option value="{{$user->level}}" class="text-bold">{{ $user->level }}</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
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