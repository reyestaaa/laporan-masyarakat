@extends('layouts.auth')

@section('header', 'Halaman Login Admin')

@section('content')
<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Login admin</h4>
                  <p class="mb-0">Enter your username and password to Login Admin</p>
                </div>
                <div class="card-body">
                  <form action="{{ route('admin.login') }}" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                      <input type="text" name="username" placeholder="Username" class="form-control form-control-lg">
                  </div>
                  <div class="form-group">
                      <input type="password" name="password" placeholder="Password" class="form-control form-control-lg">
                  </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                <a href="/" class="text-primary">Kembali halaman depan</a>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://i.pinimg.com/564x/6e/a0/61/6ea061e068f924f8d5d818f11134a25d.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Perjalanan Kehidupan"</h4>
                <p class="text-white position-relative">Hidup adalah perjalanan yang penuh dengan rintangan dan tantangan. Namun, dalam setiap rintangan dan tantangan yang kita hadapi, terdapat pelajaran yang bisa dipetik dan pengalaman yang bisa membuat kita tumbuh dan berkembang menjadi pribadi yang lebih baik</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>
@endsection
