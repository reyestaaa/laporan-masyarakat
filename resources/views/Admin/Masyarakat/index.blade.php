@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
@endsection

@section('header', 'HALAMAN MASYARAKAT')

@section('content')

<div class="card ">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h3 class="mb-3">Data Masyarakat</h3>
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="pengaduanTable1" class="table text-start mt-2">

                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIK</th>
                        <th>NAMA</th>
                        <th>USERNAME</th>
                        <th>Telp</th>
                        <th>Detail</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($masyarakat as $k => $v)
                        
                    <tr>
                        <td>{{ $k += 1 }}</td>
                        <td>{{ $v->nik}}</td>
                        <td>{{ $v->nama }}</td>
                        <td>{{ $v->username }}</td>
                        <td>{{ $v->telp }}</td>
                        <td>
                            <a href="{{ route('masyarakat.edit', $v->nik) }}" class="btn btn-primary">EDIT</a>
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
            $('#pengaduanTable1').DataTable();
        } );
    </script>
@endsection