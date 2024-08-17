<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan SPLP PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Table Layanan SPLP</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Pemohon</th>
                <th>NIP/NIK</th>
                <th>Nama Aplikasi</th>
                <th>Unit Kerja</th>
                <th>Tanggal Permohonan</th>
                <th>Waktu Permohonan</th>
                <th>Kategori</th>
                <th>Perangkat Daerah</th>
                <th>Status Permohonan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($layananSPLPs as $layananSPLP)
            <tr>
                <td>{{ $layananSPLP->nama_pemohon }}</td>
                <td>{{ $layananSPLP->nip_nik }}</td>
                <td>{{ $layananSPLP->nama_aplikasi_website }}</td>
                <td>{{ $layananSPLP->unit_kerja }}</td>
                <td>{{ $layananSPLP->tanggal_permohonan ? \Carbon\Carbon::parse($layananSPLP->tanggal_permohonan)->format('d/m/Y') : 'N/A' }}</td>
                <td>{{ $layananSPLP->waktu_permohonan ? \Carbon\Carbon::parse($layananSPLP->waktu_permohonan)->format('H:i') : 'N/A' }}</td>
                <td>{{ $layananSPLP->kategori ? $layananSPLP->kategori->kategori_layanan : 'N/A' }}</td>
                <td>{{ $layananSPLP->perangkatDaerah ? $layananSPLP->perangkatDaerah->perangkat_daerah : 'N/A' }}</td>
                <td>{{ $layananSPLP->statusPermohonan ? $layananSPLP->statusPermohonan->status : 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
