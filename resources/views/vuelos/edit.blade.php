@extends('layout')

@section('titulo', 'Editar vuelo')

@section('contenido')
    <h2>Editar vuelo</h2>

    <form action="{{ route('vuelos.update', $vuelo) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id_aerolinea">Aerolínea</label>
        <select id="id_aerolinea" name="id_aerolinea" required>
            @foreach ($aerolineas as $aerolinea)
                <option value="{{ $aerolinea->id_aerolinea }}"
                    @selected(old('id_aerolinea', $vuelo->id_aerolinea) == $aerolinea->id_aerolinea)>
                    {{ $aerolinea->nombre }}
                </option>
            @endforeach
        </select>

        <label for="origen">Origen</label>
        <input id="origen" name="origen"
               value="{{ old('origen', $vuelo->origen) }}" required>

        <label for="destino">Destino</label>
        <input id="destino" name="destino"
               value="{{ old('destino', $vuelo->destino) }}" required>

        <label for="fecha">Fecha</label>
        <input id="fecha" name="fecha" type="date"
               value="{{ old('fecha', $vuelo->fecha->format('Y-m-d')) }}" required>

        <label for="precio">Precio</label>
        <input id="precio" name="precio" type="number" step="0.01" min="0"
               value="{{ old('precio', $vuelo->precio) }}" required>

        <button type="submit">Actualizar vuelo</button>
    </form>
@endsection