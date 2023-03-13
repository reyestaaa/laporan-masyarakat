<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Masyarakat</title>
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
        h1{
            text-align: center;
            margin-bottom: 20px
        }
    </style>
  </head>
  <body>
    <h1>Data Masyarakat</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Alamat</th>
                <th>No.Telpon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $masyarakat)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $masyarakat->nik }}</td>
                    <td>{{ $masyarakat->nama }}</td>
                    <td>{{ $masyarakat->username}}</td>
                    <td>{{ $masyarakat->alamat }}</td>
                    <td>{{ $masyarakat->telp}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </body>
</html>