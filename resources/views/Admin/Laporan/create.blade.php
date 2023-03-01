<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATA REKAP LAPORAN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>
    
    <div class="text-center">
        <h2>Laporan Pengaduan Masyarakat</h2>
        
    </div>
    <div class="text-left" style="display:flex;">
        <h4>Tanggal :</h4>
        <span id="tanggal">{{now()}}</span>
    </div>

    <div class="mt-3">
        <table class="table" border="">

            <thead>
                <tr>
                    <td>NO</td>
                    <td>TANGGAL</td>
                    <td>JUDUL</td>
                    <td>KATEGORI</td>
                    <td>LOKASI</td>
                    <td>ISI LAPORAN</td>
                    <td>STATUS</td>
                </tr>
            </thead>

            <tbody>
                @foreach ($pengaduan as $k => $v)
        
                <tr>
                    <td>{{ $k += 1 }}</td>
                    <td>{{ $v->tgl_pengaduan->format('d-M-Y') }}</td>
                    <td>{{ $v->judul}}</td>
                    <td>{{ $v->kategori->kategori}}</td>
                    <td>{{ $v->lokasi}}</td>
                    <td>{{ $v->isi_laporan}}</td>
                    <td>
                        {{ $v->status == '0' ? 'Pending' : ucwords($v->status) }}
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <script>
       // Mendapatkan tanggal saat ini
		const today = new Date();
		const tanggal = today.toLocaleDateString();

		// Menampilkan tanggal pada halaman HTML
		document.getElementById('tanggal').innerHTML = tanggal;
      </script>

</body>
</html>