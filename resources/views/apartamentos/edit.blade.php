@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modificar Apartamento') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('apartamentos.update') }}">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{ $apartamento->id }}">
                        <div class="form-group row">
                            <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('Número') }}</label>

                            <div class="col-md-6">
                                <input id="numero" type="number" class="form-control @error('numero') is-invalid @enderror" name="numero"  value="{{ $apartamento->numero }}" required autocomplete="numero" autofocus >

                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="floor" class="col-md-4 col-form-label text-md-right">{{ __('Floor') }}</label>

                            <div class="col-md-6">
                                <input id="floor" type="number" class="form-control @error('floor') is-invalid @enderror" name="floor" value="{{ $apartamento->floor }}" required autocomplete="floor" autofocus>

                                @error('floor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Área') }}</label>

                            <div class="col-md-6">
                                <input id="area" type="number" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ $apartamento->area }}" required autocomplete="area" autofocus>

                                @error('area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="torre" class="col-md-4 col-form-label text-md-right">{{ __('Torre') }}</label>

                            <div class="col-md-6">
                                <input id="torre" type="number" class="form-control @error('torre') is-invalid @enderror" name="torre" value="{{ $apartamento->torre }}" required autocomplete="torre" autofocus>

                                @error('torre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                                <a href="{{ route('apartamentos.index') }}"><button type="button" class="btn btn-outline-secondary">{{ __('Regresar al listado') }}</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
