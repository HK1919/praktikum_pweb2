<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid #666;
            padding: 8px 12px;
            text-align: center;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>

<body>
    <h2 style="text-align:center;">Daftar Mahasiswa</h2>
    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($biodata as $mhs)
            <tr>
                <td>{{ $mhs['nim'] }}</td>
                <td>{{ $mhs['nama'] }}</td>
                <td>{{ $mhs['kelas'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>