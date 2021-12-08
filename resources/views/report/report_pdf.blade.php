<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    <table class="table table-bodered">
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
                    <td>{{ $loop->iteration }}
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
</body>
</html>