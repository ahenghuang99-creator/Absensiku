<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Absensi</title>

    <style>
        @media print {
            .no-print {
                display: none;
            }
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .header img {
            width: 80px;
            margin-right: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 6px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="header">
    <img src="{{ asset('images/logo.png') }}">
    <div>
        <h3>Laporan Absensi</h3>
        <p>{{ date('d-m-Y') }}</p>
    </div>
</div>

<div class="no-print" style="margin-bottom:10px;">
    <button onclick="window.print()">Print</button>
</div>

<table>
    <thead>
        <tr>
            <th>no</th>
            <th>username</th>
            <th>tanggal</th>
            <th>waktu absensi</th>
            <th>status absensi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $i => $row)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $row->username }}</td>
            <td>{{ $row->tanggal }}</td>
            <td>{{ $row->waktu_absensi }}</td>
            <td>{{ $row->status_absensi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
