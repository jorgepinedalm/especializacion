@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nuevo Residente') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('residente.save') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="tipo_documento_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de documento') }}</label>
                            
                            <div class="col-md-6">
                                <select class="form-control" name="tipo_documento_id" required>
                                    @foreach ($tipos_documento as $t)
                                        <option value="{{ $t->id }}"> {{ $t->nombre }}</option>
                                    @endforeach
                                  
                              </select>
                            </div>

                            
                        </div>

                        <div class="form-group row">
                            <label for="numero_documento" class="col-md-4 col-form-label text-md-right">{{ __('Número de documento') }}</label>

                            <div class="col-md-6">
                                <input id="numero_documento" type="text" class="form-control @error('numero_documento') is-invalid @enderror" name="numero_documento" value="{{ old('numero_documento') }}" required autocomplete="numero_documento" autofocus>

                                @error('numero_documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('name') }}" required autocomplete="nombre" autofocus >

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('name') }}" required autocomplete="apellido" autofocus>

                                @error('apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                                <a href="{{ route('residente.index') }}"><button type="button" class="btn btn-outline-secondary">{{ __('Regresar al listado') }}</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
