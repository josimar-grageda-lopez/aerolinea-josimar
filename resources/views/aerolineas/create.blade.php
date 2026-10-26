@extends('layout')

@section('titulo', 'Registrar aerolínea')

@section('contenido')
    <h2>Registrar aerolínea</h2>

    <form action="{{ route('aerolineas.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" value="{{ old('nombre') }}" required>

        <label for="pais_sede">País sede</label>
        <input id="pais_sede" name="pais_sede" value="{{ old('pais_sede') }}" required>

        <button type="submit">Guardar</button>
    </form>
@endsection