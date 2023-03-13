@extends('layouts.admin')

@section('title', 'Data Pengaduan')

@section('css')
<style>
            .zoomable-image {
            max-width: 100%;
            height: auto;
            cursor: zoom-in;
        }

        .zoomable-image.zoomed {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
            z-index: 9999;
            cursor: zoom-out;
            background-color: rgba(0,0,0,0.8);
        }
        .img-laporan img{
            width: clamp(200px, 50%, 300px);
    height: clamp(200px, 50%, 300px);
    cursor: pointer;
        }
</style>
@endsection


@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-6 col-12 ">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center font-weight-bold">
                        Pengaduan Masyarakat
                    </h3>
                    @if (Session::has('status'))
                    <div class="alert alert-success mt-2 ">
                        {{ Session::get('status') }}
                    </div>
                @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Tanggal Pengaduan</th>
                                    <td>:</td>
                                    <td>{{ $pengaduan->tgl_pengaduan }}</td>
                                </tr>
                                <tr>
                                    <th>Foto</th>
                                    <td>:</td>
                                    <td class="img-laporan">
                                        <img src="{{ Storage::url($pengaduan->foto) }}" alt="foto pengaduan" class="zoomable-image">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Judul Laporan</th>
                                    <td>:</td>
                                    <td>{{ $pengaduan->judul}}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>:</td>
                                    <td>
                                        <a class="btn btn-primary" href="#">{{ $pengaduan->kategori->kategori}}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Isi Laporan</th>
                                    <td>:</td>
                                    <td>{{ $pengaduan->isi_laporan }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>:</td>
                                    <td>
                                        @if ($pengaduan->status == '0')
                                            <a href="" class="btn btn-danger">Pending</a>
                                        @elseif($pengaduan->status == 'proses')
                                            <a href="" class="btn btn-warning">Proses</a>
                                        @else
                                            <a href="" class="btn btn-success">Selesai</a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if (Illuminate\Support\Facades\Auth::guard('admin')->user()->level == 'petugas')
        <div class="col-lg-12 col-md-6 col-12 mt-5 ">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center font-weight-bold">
                        Tanggapan Petugas
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('tanggapan.creupd') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                @if ($pengaduan->status == '0')
                                    <option value="0">Pending</option>
                                    <option value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                @elseif($pengaduan->status == 'proses')
                                    <option value="0">Pending</option>
                                    <option selected value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                @else
                                    <option value="0">Pending</option>
                                    <option value="proses">Proses</option>
                                    <option selected value="selesai">Selesai</option>
                                @endif
                            </select>
                            </div>
                        <div class="mb-3">
                            <label for="tanggapan">Tanggapan</label>
                            <textarea name="tanggapan" id="tanggapan"cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-3">Kirim</button>
                    </form>

                </div>
            </div>
        </div>
        @endif
    </div>
    
@endsection


@section('js')
<script>
    const zoomableImages = document.querySelectorAll('.zoomable-image');

    zoomableImages.forEach((image) => {
    image.addEventListener('click', () => {
        image.classList.toggle('zoomed');
    });
    });
</script>
@endsection