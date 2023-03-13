@extends('layouts.admin')

@section('title', 'Data Pengaduan')

@section('content')

<div class="card ">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h3 class="mb-3">Pengaduan</h3>
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
            <table id="table_aduan" class="table table-bordered dt-responsive text-center nowrap w-100 ">
        
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
                        <td>{{ \Carbon\Carbon::parse($v->tgl_pengaduan)->format('d F Y, H:s') }}
                        </td>
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
                        <td class="d-flex justify-content-evenly">
                            <a href="{{ route('pengaduan.show', $v->id_pengaduan) }}" class="btn btn-primary">LIHAT</a>
                            <form id="delete-form" action="{{ route('pengaduan.destroy', $v->id_pengaduan) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Hapus</button>
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
            $('#table_aduan').DataTable();
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