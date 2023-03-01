@extends('layouts.admin')

@section('header', 'Data Pengaduan')

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-6 col-12 ">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center font-weight-bold">
                        Pengaduan Masyarakat
                    </h3>
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
                                    <td>
                                        <img src="{{ Storage::url($pengaduan->foto) }}" alt="foto pengaduan" class="img-fluid">
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
        <div class="col-lg-12 col-md-6 col-12 mt-5 ">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center font-weight-bold">
                        Tanggapan Petugas
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('tanggapan.creupd') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="input-group">
                                <select class="form-control" name="status" id="status">
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
                        </div>
                        <div class="form-group">
                            <label for="tanggapan">Tanggapan</label>
                            <textarea class="form-control" placeholder="belum ada tanggapan" name="tanggapan" id="tanggapan" cols="30" rows="10">{{ $tanggapan->tanggapan ?? '' }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                    @if (Session::has('status'))
                        <div class="alert alert-success mt-2 ">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
@endsection
