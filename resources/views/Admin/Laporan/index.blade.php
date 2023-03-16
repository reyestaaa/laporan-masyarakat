@extends('layouts.admin')

@section('title', 'HALAMAN LAPORAN')

@section('content')

<div class="row">
    <div class="col-lg-6 col-12">
        <div class="card shadow border border-secondary border-3">
            <div class="card-header ">
                <div class="text-center fs-4 fw-semibold">
                    Cari Data Laporan
                </div>
            </div>
            <div class="card-body">
            <form action="{{ route('laporan.getLaporan') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" name="from" class="form-control" placeholder="TANGGAL AWAL" onfocusin="{this.type='date'}" onfocusout="{this.type='text'}">
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="to" class="form-control" placeholder="TANGGAL AKHIR" onfocusin="{this.type='date'}" onfocusout="{this.type='text'}">
                    </div>

                    <div class="form-group mb-3">
                        <select name="status" class="form-select">
                            <option value="">-- Pilih Status --</option>
                            <option value="0">Pending</option>
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>

                    <select class="form-select mb-3" name="kategori">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategori as $row)
                            <option value="{{ $row->id_kategori }}">{{ $row->kategori }}</option>
                        @endforeach
                    </select>

                    <select class="form-select mb-3" name="petugas">
                        <option value="">-- Pilih Instansi --</option>
                        @foreach($petugas as $data)
                            <option value="{{ $data->id_petugas }}">{{ $data->nama_petugas }}</option>
                        @endforeach
                    </select>
                    

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-50 fw-bold fs-5">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div class="card shadow border border-secondary border-3">
            <div class="card-header ">

                <div class="text-center fs-4 fw-semibold">
                    Hasil Data Laporan
                </div>
                <div class="float-right mt-3">
                    @if ($pengaduan ?? '')
                        <a href="{{ route('laporan.cetakLaporan',['from' => $from, 'to' => $to, 'status' => $status, 'kategori' => $kategori, 'petugas' => $petugas]) }}" class="btn btn-danger">EKSPORT PDF</a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if ($pengaduan ?? "")
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Judul Laporan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $k => $v)
                    
                            <tr>
                                <td>{{ $k += 1 }}</td>
                                <td>{{ $v->tgl_pengaduan}}</td>
                                <td>{{ $v->kategori->kategori}}</td>
                                <td>{{ $v->judul}}</td>
                                <td>
                                    @if ($v->status == '0')
                                    <a href="#" class="btn btn-danger">PENDING</a>
                                    @elseif ($v->status == 'proses')
                                        <a href="#" class="btn btn-warning">PROSES</a>
                                    @else
                                        <a href="#" class="btn btn-success">SELESAI</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                
                @else
                </div>

                <div class="text-center">
                    TIDAK ADA DATAS
                </div>

                @endif
            </div>
        </div>
    </div>
</div>

@endsection