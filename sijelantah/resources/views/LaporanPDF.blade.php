<!-- resources/views/LaporanPDF.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengumpulan PDF</title>
    <style>
        /* Tambahkan styling CSS khusus untuk PDF */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    @if (isset($monthName))
        <h1>Laporan Pengumpulan Bulan {{ $monthName }} {{ $year }}</h1>
    @else
        <h1>Laporan Pengumpulan Keseluruhan</h1>
    @endif
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Jumlah Kirim</th>
                <th>Alamat Permintaan</th>
                <th>Tanggal Kumpul</th>
                <th>Jumlah Insentif</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporanPengumpulan as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $item['NAMA'] }}</td>
                <td>{{ $item['NO_TELP'] }}</td>
                <td>{{ $item['JUMLAH_KIRIM'] }}</td>
                <td>{{ $item['ALAMAT_PERMINTAAN'] }}</td>
                <td>{{ $item['TGL_KUMPUL'] }}</td>
                <td>{{ $item['JUMLAH_INSENTIF'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
