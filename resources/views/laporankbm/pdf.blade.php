<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan KBM</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header h2 {
            margin: 0;
        }

        .info {
            margin-bottom: 10px;
        }

        .info table {
            width: 100%;
        }

        .info td {
            padding: 2px;
        }

        table.main {
            width: 100%;
            border-collapse: collapse;
        }

        table.main th,
        table.main td {
            border: 1px solid #000;
            padding: 5px;
            vertical-align: top;
        }

        table.main th {
            background-color: #eee;
            text-align: center;
        }

        .img-bukti {
            width: 120px;
            margin-top: 5px;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>LAPORAN KEGIATAN BELAJAR MENGAJAR</h2>
    </div>

    <div class="info">
        <table>
            <tr>
                <td width="150">Nama Guru</td>
                <td width="10">:</td>
                <td>{{ $data[0][0]->jadwal_mengajar->gurumapel->user->name }}</td>
            </tr>
            <tr>
                <td>Mata Pelajaran</td>
                <td>:</td>
                <td>{{ $data[0][0]->jadwal_mengajar->gurumapel->mapel->nama_mapel }}</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>{{ $data[0][0]->jadwal_mengajar->gurumapel->kelas->nama_kelas }}</td>
            </tr>
        </table>
    </div>

    <table class="main">
        <thead>
            <tr>
                <th width="30">No</th>
                <th width="80">Tanggal</th>
                <th>Absen Guru</th>
                <th>Absen Siswa</th>
                <th>Monitoring</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">
                    {{ $item[0]->jadwal_mengajar->tanggal_mulai }}
                </td>

                {{-- ABSEN GURU --}}
                <td>
                    @php $found = false; @endphp

                    @foreach ($dataabsenguru as $absen)
                    @if ($absen->tanggal_absensi == $item[0]->tanggal)
                    @php $found = true; @endphp

                    Status: {{ $absen->status }} <br>

                    @php
                    $path = public_path('storage/' . $absen->bukti);
                    @endphp

                    @if (file_exists($path))
                    <img src="{{ $path }}" class="img-bukti">
                    @else
                    <p><i>Gambar tidak ditemukan</i></p>
                    @endif
                    @endif
                    @endforeach

                    @if (!$found)
                    <i>Tidak ada data</i>
                    @endif
                </td>

                {{-- ABSEN SISWA --}}
                <td>
                    @if ($item[0]->tanggal)
                    Hadir: {{ $item[0]->hadir }} <br>
                    Sakit: {{ $item[0]->sakit }} <br>
                    Izin: {{ $item[0]->izin }} <br>
                    Alfa: {{ $item[0]->absent }}
                    @else
                    <i>Tidak ada laporan</i>
                    @endif
                </td>

                {{-- MONITORING --}}
                <td>
                    @if ($item[0]->tanggal)
                    Catatan: {{ $item[0]->catatan }} <br><br>
                    Assessment: {{ $item[0]->assesment }}
                    @else
                    <i>Tidak ada laporan</i>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>

    <div style="width: 100%; text-align: right;">
        <p>Mengetahui,</p>
        <br><br><br>
        <p>({{ Auth()->user()->name }})</p>
    </div>

</body>

</html>