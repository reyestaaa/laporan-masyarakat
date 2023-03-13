@extends('layouts.admin')

@section('title', 'EDIT kategori')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fw-semibold fs-4">{{ __('Edit Kategori') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('kategori.update', $kategori->id_kategori) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="kategori" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>

                            <div class="col-md-6">
                                <input id="kategori" type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ $kategori->kategori }}" required autocomplete="kategori" autofocus>

                                @error('kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

