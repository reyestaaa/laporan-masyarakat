@extends('layouts.auth')

@section('css')
<style>
    body {
        background: #6a70fc;
    }

    .btn-purple {
        background: #6a70fc;
        width: 100%;
        color: #fff;
    }

</style>
@endsection

@section('title', 'Halaman Daftar')

@section('content')
<main class="main-content mt-0">
    <div class="page-header align-items-start " style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container p-5">
        <div class="row justify-content-center">
          <div class="col-lg-6 mt-1 text-center mx-auto">
            
            <div class="card ">
                <div class="card-header text-center">
                    <h1 class="mb-2 mt-2">Selamat Datang!</h1>
                    <p class="text-lead ">Masukan data dengan benar dan sesuai</p>
                </div>
                <div class="container">
                    @if (Session::has('pesan'))
                    <div class="alert alert-danger text-white mt-2">
                        {{ Session::get('pesan') }}
                    </div>
                    @endif
                </div>
                <div class="card-body">
                  <form action="{{ route('pekat.register') }}" method="POST" role="form" >
                    @csrf
                    <div class="mb-3">
                        <input type="number" name="nik" placeholder="NIK" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="username" placeholder="Username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="number" name="telp" placeholder="No. Telp" class="form-control">
                    </div>
                    <div class="form-check form-check-info text-start">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                    </div>
                    <p class="text-sm mt-3 mb-0">Already have an account? <a href="/" class="text-dark font-weight-bolder">Sign in</a></p>
                  </form>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </main>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <h2 class="text-center text-white mb-0 mt-5">PEKAT</h2>
            <P class="text-center text-white mb-5">Pengaduan Masyarakat</P>
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="text-center mb-5">FORM DAFTAR</h2>
                    <form action="{{ route('pekat.register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="number" name="nik" placeholder="NIK" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Username" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="number" name="telp" placeholder="No. Telp" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-purple">REGISTER</button>
                    </form>
                </div>
            </div>
            @if (Session::has('pesan'))
            <div class="alert alert-danger mt-2">
                {{ Session::get('pesan') }}
            </div>
            @endif
            <a href="{{ route('pekat.index') }}" class="btn btn-warning text-white mt-3" style="width: 100%">Kembali ke Halaman Utama</a>
        </div>
    </div>
</div> --}}
@endsection
