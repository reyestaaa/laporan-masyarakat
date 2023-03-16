@extends('layouts.admin')

@section('title', 'DATA PETUGAS')

@section('content')


            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <h3>Berita</h3>
                        <a href="{{ route('berita.create') }}" class="btn btn-primary">Tambah Berita</a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table id="dT" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Tanggal Berita</th>
                                <th>Judul Berita</th>
                                <th>Kategori</th>
                                 <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berita as $item)
                                <tr>
                                    <td>{{ $item->created_at->format('d M, h:i') }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td >
                                        <a href="" class="btn btn-primary">{{ $item->kategori->kategori }}</a>
                                        
                                    </td>
                                    <td><img src="{{ Storage::url($item->image) }}" alt="{{ $item->judul }}" width="100"></td>
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                        
                                            <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-primary mr-2">Edit</a>
                                            <form class="delete-form" action="{{ route('berita.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete()"  class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $berita->links() }}
                    </div>
                </div>
            </div>

    
@endsection

@section('js')
    <script>
        $(document).ready( function () {
            $('#dT').DataTable();
        } );
    </script>
    
<script>
    $(document).ready(function() {
        $('.delete-form').on('click', function(e) {
            e.preventDefault();
            var form = this;
            swal({
                title: "Anda yakin ingin menghapus data ini?",
                text: "Data yang dihapus tidak dapat dikembalikan.",
                icon: "warning",
                buttons: ["Batal", "Hapus"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                } else {
                    swal("Data tidak dihapus.", {
                        icon: "info",
                    });
                }
            });
        });
    });
</script>
@endsection