<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kepsek PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: fixed;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            vertical-align: top;
            word-wrap: break-word;
        }

        th {
            background-color: #f2f2f2;
        }

        .section-title {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
            border-bottom: 2px solid #000;
        }
    </style>
</head>

<body>
    <div class="section">
        <div class="section-title">Penilaian Bulanan Guru</div>
        <table>
            <tr>
                <th style="width: 30%;">Nomor</th>
                <td style="width: 70%;">{{ $data->nomor_penilaian }}</td>
            </tr>
            <tr>
                <th>Nama Guru</th>
                <td>{{ $data->nama_guru }}</td>
            </tr>
            <tr>
                <th>Nilai Tepat Waktu</th>
                <td>{{ $data->nilai_tepat_waktu }}</td>
            </tr>
            <tr>
                <th>Penilaian Kumulatif Siswa</th>
                <td>{{ $data->penilaian_kumulatif_siswa }}</td>
            </tr>
            <tr>
                <th>Capaian Materi</th>
                <td>{{ $data->capaian_materi }}</td>
            </tr>
            <tr>
                <th>Prestasi</th>
                <td>{{ $data->prestasi }}</td>
            </tr>
            <tr>
                <th>Bulan</th>
                <td>{{ $data->bulan }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $data->keterangan_penilaian_bulanan }}</td>
            </tr>
        </table>

        <div class="section-title">Daftar Pembagian Tugas Guru</div>
        <table>
            <tr>
                <th style="width: 30%;">Nomor</th>
                <td style="width: 70%;">{{ $data->nomor_pembagian_tugas }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $data->nama_pembagian_tugas }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $data->kelas }}</td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>{{ $data->jabatan }}</td>
            </tr>
            <tr>
                <th>Mapel</th>
                <td>{{ $data->mapel }}</td>
            </tr>
            <tr>
                <th>Jumlah Jp</th>
                <td>{{ $data->jumlah_jp }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $data->keterangan_pembagian_tugas }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
