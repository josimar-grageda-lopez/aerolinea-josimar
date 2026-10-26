@extends('layout')

@section('titulo', 'Editar aerolínea')

@section('contenido')
    <h2>Editar aerolínea</h2>

    <form action="{{ route('aerolineas.update', $aerolinea) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre</label>
        <input
            id="nombre"
            name="nombre"
            value="{{ old('nombre', $aerolinea->nombre) }}"
            required
        >

        <label for="pais_sede">País sede</label>
        <input
            id="pais_sede"
            name="pais_sede"
            value="{{ old('pais_sede', $aerolinea->pais_sede) }}"
            required
        >

        <button type="submit">Actualizar</button>
    </form>
@endsection