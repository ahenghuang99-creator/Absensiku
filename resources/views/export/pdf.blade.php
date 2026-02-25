<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: sans-serif;
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
            font-size: 12px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th {
            background: #f0f0f0;
        }
        th, td {
            padding: 6px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="header">
    <img src="{{ public_path('images/logo.png') }}">
    <div>
        <h3>Laporan Absensi</h3>
        <p>{{ date('d-m-Y') }}</p>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>no</th>
            <th>username</th>
            <th>tanggal</th>
            <th>jam masuk</th>
            <th>jam pulang</th>
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
