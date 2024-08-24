<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waka Kesiswaan PDF</title>
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
        <div class="section-title">Buku Penyelesaian Kasus</div>
        <table>
            <tr>
                <th style="width: 30%;">Tahun Ajaran</th>
                <td style="width: 70%;">{{ $data->tahun_ajaran }}</td>
            </tr>
            <tr>
                <th>Nomor Penyelesaian Kasus</th>
                <td>{{ $data->nomor_penyelesaian_kasus }}</td>
            </tr>
            <tr>
                <th>Nama Penyelesaian Kasus</th>
                <td>{{ $data->nama_penyelesaian_kasus }}</td>
            </tr>
            <tr>
                <th>Tanggal Kejadian</th>
                <td>{{ $data->tanggal_kejadian }}</td>
            </tr>
            <tr>
                <th>Uraian Kasus</th>
                <td>{{ $data->uraian_kasus }}</td>
            </tr>
            <tr>
                <th>Cara Menyelesaikan</th>
                <td>{{ $data->cara_menyelesaikan }}</td>
            </tr>
            <tr>
                <th>Tindak Lanjut</th>
                <td>{{ $data->tindak_lanjut }}</td>
            </tr>
            <tr>
                <th>Keterangan Penyelesaian Kasus</th>
                <td>{{ $data->keterangan_penyelesaian_kasus }}</td>
            </tr>
        </table>

        <div class="section-title">Buku Hubin</div>
        <table>
            <tr>
                <th style="width: 30%;">Nomor Hubin</th>
                <td style="width: 70%;">{{ $data->nomor_hubin }}</td>
            </tr>
            <tr>
                <th>Tanggal Kunjungan</th>
                <td>{{ $data->tanggal_kunjungan }}</td>
            </tr>
            <tr>
                <th>Tempat Kunjungan</th>
                <td>{{ $data->tempat_kunjungan }}</td>
            </tr>
            <tr>
                <th>Nama Peserta</th>
                <td>{{ $data->nama_peserta }}</td>
            </tr>
            <tr>
                <th>Hasil Kunjungan</th>
                <td>{{ $data->hasil_kunjungan }}</td>
            </tr>
            <tr>
                <th>Keterangan Hubin</th>
                <td>{{ $data->keterangan_hubin }}</td>
            </tr>
        </table>

        <div class="section-title">Pelatihan Siswa</div>
        <table>
            <tr>
                <th style="width: 30%;">Nomor Pelatihan Siswa</th>
                <td style="width: 70%;">{{ $data->nomor_pelaihan_siswa }}</td>
            </tr>
            <tr>
                <th>Nama Pelatihan Siswa</th>
                <td>{{ $data->nama_pelatihan_siswa }}</td>
            </tr>
            <tr>
                <th>Materi Pelatihan Siswa</th>
                <td>{{ $data->materi_pelatihan_siswa }}</td>
            </tr>
            <tr>
                <th>Tempat Pelatihan Siswa</th>
                <td>{{ $data->tempat_pelatihan_siswa }}</td>
            </tr>
            <tr>
                <th>Tanggal Pelatihan Siswa</th>
                <td>{{ $data->tanggal_pelatihan_siswa }}</td>
            </tr>
            <tr>
                <th>Hasil Pelatihan Siswa</th>
                <td>{{ $data->hasil_pelatihan_siswa }}</td>
            </tr>
            <tr>
                <th>Tingkat Pelatihan Siswa</th>
                <td>{{ $data->tingkat_pelatihan_siswa }}</td>
            </tr>
            <tr>
                <th>Lama Pelatihan Siswa</th>
                <td>{{ $data->tingkat_pelatihan_siswa }}</td>
            </tr>
        </table>

        <div class="section-title">Seminar</div>
        <table>
            <tr>
                <th style="width: 30%;">Nomor Seminar</th>
                <td style="width: 70%;">{{ $data->nomor_seminar }}</td>
            </tr>
            <tr>
                <th>Narasumber</th>
                <td>{{ $data->nara_sumber }}</td>
            </tr>
            <tr>
                <th>Materi Seminar</th>
                <td>{{ $data->materi_seminar }}</td>
            </tr>
            <tr>
                <th>Tanggal Seminar</th>
                <td>{{ $data->tanggal_seminar }}</td>
            </tr>
            <tr>
                <th>Waktu Seminar</th>
                <td>{{ $data->waktu_seminar }}</td>
            </tr>
            <tr>
                <th>Tingkat Seminar</th>
                <td>{{ $data->tingkat_seminar }}</td>
            </tr>
            <tr>
                <th>Hasil Seminar</th>
                <td>{{ $data->hasil_seminar }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $data->keterangan_seminar }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
