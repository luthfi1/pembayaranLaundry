@extends('layouts.template')

@section('title')
Report Laundry
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Paket</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Bayar</th>
                            <th>Subtotal</th>
                            <th width="15%">Nama Outlet</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($report as $row)
                            <tr>
                                <td>{{ $loop->iteration + ($report->perpage() * ($report->currentPage() -1)) }}
                                </td>
                                <td>{{ $row->keranjang->pelanggan->nama_pelanggan }}</td>
                                <td>{{ $row->keranjang->paket->nama_paket }}</td>
                                <td>{{ $row->keranjang->tanggal_masuk }}</td>
                                <td>{{ $row->tanggal_bayar }}</td>
                                <td>Rp. {{ $row->subtotal }}</td>
                                <td>{{ $row->keranjang->outlet->nama_outlet }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $report->appends(Request::all())->links() }}
            </div>
        </div>
    </div>

</div>


    <div class="row no-report">
        <div class="col-12">
                <a target="_blank" href="{{ route('cetak_pdf') }}" class="btn btn-success"> <i class="fas fa-download"></i> Generate PDF</a>    
            </
        </div>
    </div>
</div>


@endsection
