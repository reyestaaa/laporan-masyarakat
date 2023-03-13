@extends('layouts.admin')

@section('title', 'DATA PETUGAS')

@section('content')

<div class="card ">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h3 class="mb-3">Petugas</h3>
        <a href="{{ route('petugas.create') }}" class="btn btn-primary mb-4">Tambah Petugas</a>
      </div>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="petugasT" class="table table-bordered dt-responsive  nowrap w-100 text-center">

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
                        <form id="delete-form"   action="{{ route('petugas.destroy', $v->id_petugas ) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete()" class="btn btn-danger">HAPUS</button>
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
    <script>
        $(document).ready( function () {
            $('#petugasT').DataTable();
        } );
    </script>
    <script>
        function confirmDelete() {
            swal({
                title: "Anda yakin ingin menghapus data ini?",
                text: "Data yang dihapus tidak dapat dikembalikan.",
                icon: "warning",
                buttons: ["Batal", "Hapus"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById("delete-form").submit();
                } else {
                    swal("Data tidak dihapus.", {
                        icon: "info",
                    });
                }
            });
        }
    </script>
@endsection