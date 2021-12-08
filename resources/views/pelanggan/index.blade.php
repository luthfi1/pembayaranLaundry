@extends('layouts.template')

@section('title')
Pelanggan
@endsection

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-11">
                <form method="get" action="{{ route('pelanggan.index') }}">
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control form-control-lg" id="keyword" name="keyword"
                                value="{{ Request::get('keyword') }}" placeholder="Telusuri...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-1">
                @if(Request::get('keyword'))
                    <a href="/pelanggan" class="btn btn-danger"><i class="fa fa-arrow-left"></i></a>
                @else
                    <a href="/pelanggan/create" class="btn btn-success"><i class="fa fa-plus"></i></a>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @if(Request::get('keyword'))
                    <div class="alert alert-secondary alert-block">
                        Hasil pencarian <b>{{ Request::get('keyword') }}</b>
                    </div>
                @endif
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th width="15%">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pelanggan as $row)
                            <tr>
                                <td>{{ $loop->iteration + ($pelanggan->perpage() * ($pelanggan->currentPage() -1)) }}
                                </td>
                                <td>{{ $row->nama_pelanggan }}</td>
                                <td>{{ $row->alamat_pelanggan }}</td>
                                <td>{{ $row->nomor_telepon }}</td>
                                <td>
                                    <form method="post" action="{{route('pelanggan.destroy', [$row->id])}}" onsubmit="return confirm('Hapus {{$row->nama_pelanggan}}?')">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <a href="{{route('pelanggan.edit',[$row->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $pelanggan->appends(Request::all())->links() }}
            </div>
        </div>
    </div>

</div>


@endsection