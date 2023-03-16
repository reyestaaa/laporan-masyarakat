@extends('layouts.auth')

@section('title', 'Halaman Login Admin')

@section('css')


    
@endsection

@section('content')

<div class="auth-page">
  <div class="container-fluid p-0">
      <div class="row g-0">
          <div class="col-xxl-4 col-lg-5 col-md-6">
              <div class="auth-full-page-content d-flex p-sm-5 p-4">
                  <div class="w-100">
                      <div class="d-flex flex-column h-100">
                          <div class="mb-4 mb-md-5 text-center">
                              <a href="index.html" class="d-block auth-logo">
                                  <img src="{{ asset('/assets-admin') }}/images/logo.png" alt="" class="rounded-circle" height="50">
                              </a>
                          </div>
                          <div class="auth-content my-auto">
                              <div class="text-center">
                                  <h5 class="mb-0">Selamat Datang</h5>
                                  <p class="text-muted mt-2">Silahkan Masuk untuk Melanjutkan</p>
                              </div>
                              <form action="{{ route('admin.login') }}" method="POST" role="form" class="mt-4 pt-2">
                                @csrf
                                  <div class="mb-3">
                                      <label class="form-label">Username</label>
                                      <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                                  </div>
                                  <div class="mb-3">
                                      <div class="d-flex align-items-start">
                                          <div class="flex-grow-1">
                                              <label class="form-label">Kata Sandi</label>
                                          </div>
                                      </div>
                                      
                                      <div class="input-group auth-pass-inputgroup">
                                        <input type="password" name="password" class="form-control" placeholder="Masukkan Kata Sandi" id="password" aria-label="Password" aria-describedby="password-addon">
                                        
                                      </div>
                                      
                                  </div>

                                  @if(session('pesan'))
                                    <div class="alert alert-danger">
                                        {{ session('pesan') }}
                                    </div>
                                  @endif

                                  
                                  <div class="mb-3">
                                      <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Masuk</button>
                                  </div>
                              </form>
                              <a href="/">Kembali</a>
                          </div>
                          <div class="mt-4 mt-md-5 text-center">
                              <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Laporian Aplikasi Laporan Masyarakat</p>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- end auth full page content -->
          </div>
          <!-- end col -->
          <div class="col-xxl-8 col-lg-7 col-md-6">
              <div class="auth-bg pt-md-5 p-4 d-flex">
                  <div class="bg-overlay bg-unguy"></div>
                  
              </div>
          </div>
          <!-- end col -->
      </div>
      <!-- end row -->
  </div>
  <!-- end container fluid -->
</div>

@endsection

@section('js')

  <script>
  function showPassword() {
    var passwordInput = document.querySelector('.auth-pass-inputgroup input[type="password"]');
    var toggleButton = document.querySelector('.auth-pass-inputgroup button');
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      toggleButton.innerHTML = '<i class="mdi mdi-eye-off-outline"></i>';
    } else {
      passwordInput.type = 'password';
      toggleButton.innerHTML = '<i class="mdi mdi-eye-outline"></i>';
    }
  }

  </script>
@endsection
