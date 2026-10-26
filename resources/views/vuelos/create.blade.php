@extends('layout')

@section('titulo', 'Registrar vuelo')

@section('contenido')
    <h2>Registrar vuelo</h2>

    <form action="{{ route('vuelos.store') }}" method="POST">
        @csrf

        <label for="id_aerolinea">Aerolínea</label>
        <select id="id_aerolinea" name="id_aerolinea" required>
            <option value="">Selecciona una aerolínea</option>
            @foreach ($aerolineas as $aerolinea)
                <option value="{{ $aerolinea->id_aerolinea }}"
                    @selected(old('id_aerolinea') == $aerolinea->id_aerolinea)>
                    {{ $aerolinea->nombre }}
                </option>
            @endforeach
        </select>

        <label for="origen">Origen</label>
        <input id="origen" name="origen" value="{{ old('origen') }}" required>

        <label for="destino">Destino</label>
        <input id="destino" name="destino" value="{{ old('destino') }}" required>

        <label for="fecha">Fecha</label>
        <input id="fecha" name="fecha" type="date" value="{{ old('fecha') }}" required>

        <label for="precio">Precio</label>
        <input id="precio" name="precio" type="number" step="0.01" min="0"
               value="{{ old('precio') }}" required>

        <button type="submit">Guardar vuelo</button>
    </form>
@endsection