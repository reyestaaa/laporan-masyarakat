@extends('layouts.admin')


@section('header', 'HALAMAN LAPORAN')

@section('content')

<div class="card">
    <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
          <h3 class="mb-3">Kategori</h3>
          {{-- <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-4">Tambah Kategori</a> --}}
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create">
            Tambah Kategori
        </button>
        
        </div>
        @if(session('success'))
            <div class="alert alert-success text-light">
                {{ session('success') }}
            </div>
        @endif
      </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="aduan1" class="table text-start mt-2">

                <thead>
                    <tr>
                        <th>NO</th>
                        <th>kategori</th>
                        <th>aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($kategori as $k => $v)
                        
                    <tr>
                        <td>{{ $k += 1 }}</td>
                        <td>{{ $v->kategori}}</td>
                        <td>
                            <form action="{{ route('kategori.destroy', $v->id_kategori) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="formcreate">
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                    
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ old('kategori') }}" required>
                        </div>
                    
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#aduan1').DataTable();
        } );
    </script>

<script>
    $(function () {
        $('button[data-bs-toggle="modal"][data-bs-target="modal-create"]').click(function () {
            $.get('{{ route('kategori.create') }}', function (response) {
                $('#formcreate').html(response);
            });
        });
    });
</script>
@endsection