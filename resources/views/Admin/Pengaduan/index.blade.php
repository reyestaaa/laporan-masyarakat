@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
@endsection

@section('header', 'Data Pengaduan')

@section('content')

<div class="card ">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h3 class="mb-3">Pengaduan</h3>
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="table_aduan" class="table align-items-center">
        
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Judul Laporan</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($pengaduan as $k => $v)            
                    <tr>
                        <td>{{ $k += 1 }}</td>
                        <td>{{ $v->tgl_pengaduan }}</td>
                        <td>{{ $v->judul }}</td>
                        <td>
                            @if ($v->status == '0')
                                <a href="#" class="btn btn-danger">PENDING</a>
                            @elseif ($v->status == 'proses')
                                <a href="#" class="btn btn-warning">PROSES</a>
                            @else
                                <a href="#" class="btn btn-success">SELESAI</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pengaduan.show', $v->id_pengaduan) }}" class="btn btn-primary">LIHAT</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>
    
@endsection

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_aduan').DataTable();
        } );
    </script>
@endsection