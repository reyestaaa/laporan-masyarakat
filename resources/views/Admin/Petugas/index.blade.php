@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
@endsection

@section('header', 'DATA PETUGAS')

@section('content')

<div class="card ">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h3 class="mb-3">Petugas</h3>
        <a href="{{ route('petugas.create') }}" class="btn btn-primary mb-4">Tambah Petugas</a>
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="petugasT" class="table">

                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>No.Telepon</th>
                        <th>Level</th>
                        <th>Detail</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($petugas as $k => $v)
                    <tr>
                        <td>{{ $k += 1 }}</td>
                        <td>{{ $v->nama_petugas }}</td>
                        <td>{{ $v->username }}</td>
                        <td>{{ $v->telp }}</td>
                        <td>{{ $v->level }}</td>
                        <td class="d-flex justify-content-around">
                            <a href="{{ route('petugas.edit', $v->id_petugas) }}" class="btn btn-primary">EDIT</a>
                            <form action="{{ route('petugas.destroy', $v->id_petugas ) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">HAPUS</button>
                            </form>
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
            $('#petugasT').DataTable();
        } );
    </script>
@endsection