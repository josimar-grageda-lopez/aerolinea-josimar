@extends('adminlte::page')

@section('title')
    @yield('titulo') - Grageda
@stop

@section('content_header')
    <h1>Gestión de aerolíneas y vuelos</h1>
@stop

@section('content')
    <div class="mb-3">
        <a href="{{ route('aerolineas.index') }}" class="btn btn-primary">
            Aerolíneas
        </a>

        <a href="{{ route('vuelos.index') }}" class="btn btn-info">
            Vuelos
        </a>
    </div>

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('contenido')
@stop