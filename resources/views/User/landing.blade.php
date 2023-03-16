@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<style>
    body{
        overflow-x: hidden;
    }
    i.bi{
        font-size: 3em;
        color: white;
    }

    .bg-icon{
        background-color: #6a70fc;
        padding: 20px;
        border-radius: 1%;
        margin-bottom: 20px;
    }
    .text-ungu{
        color: #6a70fc;
    }

    input::placeholder {
        color: #777;
    }

    .form-control, .form-select{
        border-color: rgb(142, 142, 142);
    }

    .card-img-top{
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

    .bg-ungu{
            background-color: #6a70fc;
        }
        
        .text-ungu{
            color: #6a70fc;
        }

        .btn-ungu{
            background-color: #6a70fc;
            color: white;
        }
        .btn-ungu:hover{
            background-color: #9092ff;
            color: white;
        }


</style>
@endsection

@section('title', 'Pengaduan Masyarakat')

@section('content')

{{-- Section Card Pengaduan --}}
<div class="container p-5">
    <div class="row">
        @foreach ($berita as $item)
        <div class="col-sm-6 mb-5 mt-5 mb-sm-0">
            <div class="card shadow border-0">
              <img src="{{ Storage::url($item->image) }}" class="card-img-top" alt="...">
            <div class="card-body border-top border-2 border-dark px-4 py-4">
             <div class=" d-flex align-items-center  justify-content-between align-items-center mb-4">
                <h5 class="card-title">{{ $item->judul }}</h5>
                <a href="" class="btn btn-primary btn-sm">{{ $item->kategori->kategori }}</a>
             </div>
              <p class="card-text">{{ substr(strip_tags($item->isi_berita), 0, 100) }}
            </p>
              <a href="{{ route('show.berita', $item->id) }}" class="btn btn-ungu">Lihat Selanjutnya</a>
            </div>
            <div class="card-footer">
                <p>
                <i class="bi bi-clock fs-6 text-dark"></i>
                {{ $item->created_at->format('d M, h:i') }}
                </p>
            </div>
          </div>
        </div>
        @endforeach
    </div>
</div>

<section id="apk" style="border-bottom:0; margin-top:100px; margin-bottom:100px;">
    <div class="container">
        <div class="p-5">
            <div class="row bs-wizard" style="border-bottom:0; margin-bottom:70px;">
                <div class="col-md-3  mb-3col-xs-offset-1 bs-wizard-step active">
                    <div class="text-center bg-icon ">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <h4 class="text-center fw-semibold">Tulis Laporan</h4>
                    <div class="bs-wizard-info fw-normal text-center">
                        Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap
                    </div>
                </div>
            
                <div class="col-md-3 mb-3 bs-wizard-step">
                    <div class="text-center bg-icon ">
                        <i class="bi bi-reply-fill"></i>
                    </div>
                    <h4 class="text-center fw-semibold">Proses Verifikasi</h4>
                    <div class="bs-wizard-info fw-normal text-center">
                        Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan kepada petugas berwenang
                    </div>
                </div>
            
                <div class="col-md-3 mb-3 bs-wizard-step">
                    <div class="text-center bg-icon ">
                        <i class="bi bi-chat-fill"></i>
                    </div>
                    <h4 class="text-center fw-semibold">Proses Tindak Lanjut</h4>
                    <div class="bs-wizard-info fw-normal text-center">
                        Dalam 5 hari, petugas akan menindaklanjuti dan membalas laporan Anda
                    </div>
                </div>
            
                <div class="col-md-3 mb-3 bs-wizard-step">
                    <div class="text-center bg-icon ">
                        <i class="bi bi-check"></i>
                    </div>
                    <h4 class="text-center fw-semibold">Selesai</h4>
                    <div class="bs-wizard-info fw-normal text-center">
                        Laporan Anda akan terus ditindaklanjuti hingga terselesaikan
                    </div>
                </div>
            
            </div>

            <hr>

            <div class="row mt-5">
                <h4 class="mt-2 text-center fw-bold">Laporan <span class="text-success"> Selesai</span></h4>
                @foreach ($selesai as $item)
                <div class="col-lg-4 col-md-4">
                    <div class="card mt-3 shadow" style="background: url({{ asset('/images') }}/done.png)  no-repeat bottom right;">
                        <div class="card-body">
                            <div class="fw-semibold mb-3 fs-5 text-ungu">{{ $item->judul }}</div>
                            <img src="" alt="">
                            <p class="fw-light">{!! substr($item->isi_laporan, 0, 70) !!}...</p>
                        </div>
                    </div>
                </div>
            @endforeach
            
            </div>
        </div>
    </div>
</section>

<hr>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mt-4 p-3">
                <h5 class="mt-2 text-center fw-semibold">Kategori Paling Populer</h5>
                <hr>
                <div class="card-body">
                   
                        <table class="table table-bordered border-secondary text-center">
                            <thead class="bg-ungu text-white">
                                <tr>
                                    <th>Kategori</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jumlah_pengaduan as $jumlah)
                                <tr>
                                    <td class="text-start">{{ $jumlah->kategori }}</td>
                                    <td>{{ $jumlah->jumlah_pengaduan }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Section Hitung Pengaduan --}}
<div class="pengaduan mt-5">
    <div class="bg-purple">
        <div class="text-center">
            <h5 class="medium text-white mt-3">JUMLAH LAPORAN SEKARANG</h5>
            <h2 class="medium text-white">{{ $pengaduan }}</h2>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-3">
            <h3 class="mt-1">Masuk terlebih dahulu</h3>
            <p>Silahkan masuk menggunakan akun yang sudah didaftarkan.</p>
            <form action="{{ route('pekat.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="mb-2" for="username">Username</label>
                    <input type="text" name="username" placeholder="Masukan Username" id="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="mb-2" for="password">Password</label>
                    <input type="password" name="password" placeholder="Masukan Password" id="password" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-purple text-white mt-3" style="width: 100%">MASUK</button>
                <div class="mb-3 mt-3">
                     <p>Apakah kamu seorang <a href="/admin">admin?</a></p>
                </div>
                <div class="mb-3 mt-3">
                    <p> 
                       <a href="/reset-password" target="_blank">Lupa sandi?</a>
                       Hubungi admin kami untuk mendapatkan bantuan
                   </p>
               </div>
            </form>

            @if (Session::has('pesan'))
            <div class="alert alert-danger mt-2">
                {{ Session::get('pesan') }}
            </div>
            @endif
        

            @if (Session::has('berhasil'))
                <div class="alert alert-success mt-2">
                    {{ Session::get('berhasil') }}
                </div>
            @endif
        </div>
      </div>
    </div>
</div>
  

@endsection

@section('js')
    @if (Session::has('pesan') || Session::has('berhasil'))
    <script>
        $(document).ready(function(){
            $('#exampleModal').modal('show');
        });
    </script>
    @endif

    <script>
        // Dapatkan elemen form dan tombol kirim
        const formPengaduan = document.getElementById('form-pengaduan');
        const btnKirim = formPengaduan.querySelector('button[type="submit"]');
    
        // Tambahkan event listener pada tombol kirim
        btnKirim.addEventListener('click', function(event) {
            // Cek apakah pengguna sudah login atau belum
            if (!{{ Auth::guard('masyarakat')->user() ? 'true' : 'false' }}) {
                // Tampilkan modal login jika belum login
                event.preventDefault(); // Mencegah form dikirim
                $('#exampleModal').modal('show'); // Menampilkan modal login
            }
        });
    </script>
    
@endsection