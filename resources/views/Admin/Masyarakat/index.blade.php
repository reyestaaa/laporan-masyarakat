@extends('layouts.admin')

@section('title', 'HALAMAN MASYARAKAT')

@section('content')

<div class="card ">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h3 class="mb-3">Data Masyarakat</h3>
        <div>

          <a href="{{ route('masyarakat.export') }}" target="_blank" class="btn btn-danger fw-bold me-2">Export to PDF
            <i class='bx bxs-file-pdf'></i>
          </a>


            

          <button type="button" class="btn btn-success fw-bold" data-bs-toggle="modal" data-bs-target="#importModal">
          Import Excel
          <i class='bx bx-import' ></i>
          </button>
        </div>
        
      </div>
      @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="pengaduanTable1" class="table table-bordered dt-responsive nowrap w-100 text-center">

                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Alamat</th>
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
                        <td>{{ $v->alamat }}</td>
                        <td>{{ $v->telp }}</td>
                        <td class="d-flex justify-content-evenly">
                            <a href="{{ route('masyarakat.edit', $v->nik) }}" class="btn btn-primary">EDIT</a>
                            <form id="delete-form" action="{{ route('masyarakat.destroy', $v->nik) }}" method="POST">
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
    

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('masyarakat.import') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="importModalLabel">Import Excel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="file">Pilih file Excel</label>
              <input type="file" name="file" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Import</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script>
        $(document).ready( function () {
            $('#pengaduanTable1').DataTable();
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