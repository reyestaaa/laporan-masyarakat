@extends('layouts.admin')

@section('title', 'DASHBOARD')
{{-- @section('header', 'DASHBOARD') --}}

@section('css')
<style>
  .text-ungu{
    color: #6a70fc;
  }
</style>
@endsection

@section('content')
  <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card bg-primary text-white fw-semibold">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Masyarakat</p>
                  <h5 class="fw-bold text-white">
                    {{ $masyarakat }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="fs-1">
                  <i class='bx bx-user'></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card bg-primary text-white fw-semibold">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Pending</p>
                  <h5 class="fw-bold text-white">
                    {{ $pending}}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="fs-1">
                  <i class='bx bx-x-circle'></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card bg-primary text-white fw-semibold">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Proses</p>
                  <h5 class="fw-bold text-white">
                    {{ $proses }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="fs-1">
                  <i class='bx bx-run'></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card bg-primary text-white fw-semibold">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Selesai</p>
                  <h5 class="fw-bold text-white">
                    {{ $selesai }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="fs-1">
                  <i class='bx bx-smile' ></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="row mt-5">
    <div class="col-lg-8 mb-lg-0 mb-4">
      <div class="card shadow ">
        <div class="card-header pb-0 p-3 border-bottom">
          <div class="d-flex justify-content-center">
            <h3 class="mb-4" >Pengaduan Yang <span class="text-danger">Pending</span></h3>
          </div>
        </div>
        <div class="table-responsive">
            <table class="table text-center">
    
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($pengaduan as $k => $v)            
                    <tr>
                        <td>{{ $k += 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($v->tgl_pengaduan)->format('d F Y H:i:s') }}</td>
                        <td>{{ $v->judul }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-danger">PENDING</a>
                        </td>
                        <td>
                            <a href="{{ route('pengaduan.show', $v->id_pengaduan) }}" class="btn btn-sm btn-primary">LIHAT</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
      </div>
      <div class="card shadow mt-5">
        <div class="card-header pb-0 p-3 border-bottom">
          <div class="d-flex justify-content-center">
            <h3 class="mb-4" >Pengaduan Yang <span class="text-warning">Proses</span></h3>
          </div>
        </div>
        <div class="table-responsive">
            <table class="table text-center">
    
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($prosest as $k => $v)            
                    <tr>
                        <td>{{ $k += 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($v->tgl_pengaduan)->format('d F Y H:i:s') }}</td>
                        <td>{{ $v->judul }}</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Proses</a>
                        </td>
                        
                        <td>
                            <a href="{{ route('pengaduan.show', $v->id_pengaduan) }}" class="btn btn-sm btn-primary">LIHAT</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
      </div>

    </div>

    <div class="col-lg-4">
      <div class="card mt-3 p-3 shadow">
          <h4 class="mt-2 text-center fw-bold">Laporan <span class="text-success"> Selesai</span></h4>
          @foreach ($foto as $item)
          <div class="card mt-3" style="background: url({{ asset('/images') }}/done.png)  no-repeat bottom right;">
                  <div class="card-body">
                      <div class="fw-semibold mb-3 text-ungu">{{ $item->judul }}</div>
                      <img src="" alt="">
                  </div>
              </div>
          @endforeach
      </div>
    </div>


  </div>
@endsection


@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#dash').DataTable();
        } );
    </script>
@endsection