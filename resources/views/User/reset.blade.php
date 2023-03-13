@extends('layouts.user')

@section('title', 'Reset Password')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <style>
        .btn-purple{
            background-color: #6a70fc;
            color: white;
        }
        .btn-purple:hover{
            background-color: #9092ff;
            color: white;
        }

        .form-control, .form-select{
        border-color: rgb(142, 142, 142);
    }
    </style>
@endsection

@section('content')
<div class="container ">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            
            <div class="card shadow">
                <div class="card-header text-center">
                    <h3 class="fw-semibold mt-2">Reset Sandi</h3>
                </div>
                <div class="card-body ">
                    <form id="whatsapp-form" class="p-3">
                        <div class="mb-3">
                            <label for="nik">NIK:</label>
                            <input type="number" placeholder="Masukan nik" id="nik" name="nik" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label for="name">Nama:</label>
                            <input type="text" placeholder="Masukan nama" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-purple w-50">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

  
@section('js')
<script>
    const form = document.getElementById("whatsapp-form");
    const baseUrl = "https://wa.me/6285156016798";
  
    form.addEventListener("submit", (event) => {
      event.preventDefault();
      
      const nik = encodeURIComponent(form.nik.value);
      const name = encodeURIComponent(form.name.value);
      const text = `Reset sandi NIK: ${nik}. Nama: ${name}`;
  
      window.location.href  = `${baseUrl}?text=${text}`;
    });
</script>
@endsection
  