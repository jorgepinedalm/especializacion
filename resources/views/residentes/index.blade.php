@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Listado de Residentes') }} <a href="{{ route('residente.new') }}"><button type="button" class="btn btn-outline-secondary">Nuevo</button></a></div>

                <div class="card-body">
  
                  @if (session()->has('success_message'))
                      <div class="alert alert-success">
                          {{ session()->get('success_message') }}
                      </div>
                  @endif
                  
                  @if (session()->has('error_message'))
                      <div class="alert alert-danger">
                          {{ session()->get('error_message') }}
                      </div>
                  @endif

                   <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Identificación</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Apellido</th>
                          <th scope="col">Email</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($residentes as $key=>$residente)
                          <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $residente->tipo_documento->abbr }} - {{ $residente->numero_documento }}</td>
                            <td>{{ $residente->nombre}}</td>
                            <td>{{ $residente->apellido}}</td>
                            <td>{{ $residente->email}}</td>
                            <td>
                              <a href="{{ route('residente.edit', $residente->id) }}" class="btn btn-outline-secondary btn-xs" tabindex="-1" role="button" aria-disabled="true"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            </td>
                            <td>
                              <form action="{{route('residente.delete') }}" method="POST">
                                  {{ csrf_field() }}
                                  <input type="hidden" id="id" name="id" value="{{ $residente->id }}">
                                  <button type="submit" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button></form>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
