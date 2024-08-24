<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waka Kurikulum PDF</title>
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

        th, td {
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
        <div class="section-title">Data Bimbingan</div>
        <table>
            <tr>
                <th style="width: 30%;">Tahun Ajaran</th>
                <td style="width: 70%;">{{ $data->tahun_ajaran }}</td>
            </tr>
            <tr>
                <th>Nomor Bimbingan</th>
                <td>{{ $data->nomor_bimbingan }}</td>
            </tr>
            <tr>
                <th>Waktu Bimbingan</th>
                <td>{{ $data->waktu_bimbingan }}</td>
            </tr>
            <tr>
                <th>Nama Bimbingan</th>
                <td>{{ $data->nama_bimbingan }}</td>
            </tr>
            <tr>
                <th>Kekurangan Bimbingan</th>
                <td>{{ $data->kekurangan_bimbingan }}</td>
            </tr>
            <tr>
                <th>Bentuk Bimbingan</th>
                <td>{{ $data->bentuk_bimbingan }}</td>
            </tr>
            <tr>
                <th>Hasil Bimbingan</th>
                <td>{{ $data->hasil_bimbingan }}</td>
            </tr>
            <tr>
                <th>Keterangan Bimbingan</th>
                <td>{{ $data->keterangan_bimbingan }}</td>
            </tr>
        </table>

        <div class="section-title">Data Capaian Target dan Daya Serap</div>
        <table>
            <tr>
                <th style="width: 30%;">Nomor Capaian</th>
                <td style="width: 70%;">{{ $data->nomor_capaian }}</td>
            </tr>
            <tr>
                <th>Mapel</th>
                <td>{{ $data->mapel_capaian }}</td>
            </tr>
            <tr>
                <th>Nama Guru</th>
                <td>{{ $data->guru_capaian }}</td>
            </tr>
            <tr>
                <th>Target Pencapaian</th>
                <td>{{ $data->target_pencapaian_materi }}</td>
            </tr>
            <tr>
                <th>Realisasi Pencapaian</th>
                <td>{{ $data->realisasi_pencapaian }}</td>
            </tr>
            <tr>
                <th>Kendala</th>
                <td>{{ $data->kendala }}</td>
            </tr>
            <tr>
                <th>Solusi</th>
                <td>{{ $data->solusi }}</td>
            </tr>
            <tr>
                <th>Keterangan Capaian</th>
                <td>{{ $data->keterangan_capaian }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
