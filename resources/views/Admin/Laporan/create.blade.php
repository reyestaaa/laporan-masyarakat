<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATA REKAP LAPORAN</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
            font-family: Arial, sans-serif;
        }

        th,
        td {
            text-align: left;
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #6a70fc;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>

</head>
<body>
    
    <div style="text-align: center">
        <h2>Laporan Pengaduan Masyarakat</h2>
        
    </div>
    <div class="text-left" style="display:flex; text-align:start; margin-bottom:20px;">
        <h4>Tanggal :</h4>
        <span id="tanggal">{{now()}}</span>
    </div>

        <table class="table" border="">

            <thead>
                <tr>
                    <th>NO</th>
                    <th>TANGGAL</th>
                    <th>JUDUL</th>
                    <th>KATEGORI</th>
                    <th>LOKASI</th>
                    <th>ISI LAPORAN</th>
                    <th>STATUS</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pengaduan as $k => $v)
        
                <tr>
                    <td>{{ $k += 1 }}</td>
                    <td>{{ $v->tgl_pengaduan->format('d-M-Y') }}</td>
                    <td>{{ $v->judul}}</td>
                    <td>{{ $v->lokasi}}</td>
                    <td>{{ $v->kategori->kategori}}</td>
                    <td> {{ substr(strip_tags($v->isi_laporan), 0, 300) }}
                    </td>
                   
                    <td>
                        {{ $v->status == '0' ? 'Pending' : ucwords($v->status) }}
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    <script>
       // Mendapatkan tanggal saat ini
		const today = new Date();
		const tanggal = today.toLocaleDateString();

		// Menampilkan tanggal pada halaman HTML
		document.getElementById('tanggal').innerHTML = tanggal;
      </script>

</body>
</html>