<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi</title>
    <style>
        body{
            padding: 0;
            margin: 0;
        }
        .page{
            max-width: 80em;
            margin: 0 auto;
        }
        table th,
        table td{
            text-align: left;
        }
        table.layout{
            width: 100%;
            border-collapse: collapse;
        }
        table.display{
            margin: 1em 0;
        }
        table.display th,
        table.display td{
            border: 1px solid #B3BFAA;
            padding: .5em 1em;
        }
​
        table.display th{ background: #D5E0CC; }
        table.display td{ background: #fff; }
​
        table.responsive-table{
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
        }
​
        .listcust {
            margin: 0;
            padding: 0;
            list-style: none;
            display:table;
            border-spacing: 10px;
            border-collapse: separate;
            list-style-type: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <h3>Kejar Bahasa</h3>
        <h4 style="line-height: 0px;">Laporan Transaksi Periode (<small style="opacity: 0.5;">{{ $date[0] }}} - {{ $date[1] }}</small>)</h4>
    </div>
    <div class="page">
        <table class="layout display responsive-table">
            <thead style="background-color: #D5E0CC">
                <tr>
                    <th>#</th>
                    <th>Kelas</th>
                    <th>Pelanggan</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $total = 0;
                @endphp
                @forelse ($purchaseds as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->class->name }}</td>
                    <td>{{ $row->user->name }}</td>
                    <td>Rp {{ number_format($row->class->price) }}</td>
                    <td>{{ $row->created_at->format('d M Y') }}</td>
                </tr>
​
                @php
                    $total += $row->class->price;
                @endphp
                @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" style="border: none"></td>
                    <td style="background-color: #D5E0CC; text-align: right; font-weight: bold">Total</td>
                    <td style="background-color: #D5E0CC">Rp {{ number_format($total) }}</td>
                    <td style="border: none"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>