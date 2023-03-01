@extends('layouts.admin')

@section('title', 'DASHBOARD')
@section('header', 'DASHBOARD')

{{-- @section('css')
<style>
    .img-row{
      height: 100vh;
    }
</style>
@endsection --}}

@section('content')
  <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Petugas</p>
                  <h5 class="font-weight-bolder">
                    {{ $petugas }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                  <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Masyarakat</p>
                  <h5 class="font-weight-bolder">
                    {{ $masyarakat }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                  <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Proses</p>
                  <h5 class="font-weight-bolder">
                    {{ $proses }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                  <i class="ni ni-user-run text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Selesai</p>
                  <h5 class="font-weight-bolder">
                    {{ $selesai }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                  <i class="ni ni-satisfied text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="row mt-5">
    <div class="col-lg-8 mb-lg-0 mb-4">
      <div class="card ">
        <div class="card-header pb-0 p-3 border-bottom">
          <div class="d-flex justify-content-center">
            <h3 class="mb-4" >Pengaduan Yang Pending</h3>
          </div>
        </div>
        <div class="table-responsive">
            <table class="table text-center">
    
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Isi Laporan</th>
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
      <div class="card mt-5">
        <div class="card-header pb-0 p-3 border-bottom">
          <div class="d-flex justify-content-center">
            <h3 class="mb-4" >Pengaduan Yang Proses</h3>
          </div>
        </div>
        <div class="table-responsive">
            <table class="table text-center">
    
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Isi Laporan</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($prosest as $k => $v)            
                    <tr>
                        <td>{{ $k += 1 }}</td>
                        <td>{{ $v->tgl_pengaduan }}</td>
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

    <div class="col-lg-4 vh-100">
      <div class="card card-carousel overflow-hidden p-0" style="height: 70%">
        <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
          <div class="carousel-inner border-radius-lg h-100">
            @foreach ($foto as $k => $v)
            <div class="carousel-item h-100 active" style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url({{ Storage::url($v->foto) }})  no-repeat; background-size: cover;">
              <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <a href="#" class="btn btn-success btn-sm">SELESAI</a>
                </div>
                <div class="p-2 rounded text-center"
                style="background: rgba(0, 0, 0, 0.7);">
                    <h3 class="text-white mb-1">{{ $v->judul }}</h3>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
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