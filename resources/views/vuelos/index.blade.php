@extends('layout')

@section('titulo', 'Vuelos')

@section('contenido')
    <h2>Vuelos</h2>

    <p><a href="{{ route('vuelos.create') }}">Registrar vuelo</a></p>

    @if ($vuelos->isEmpty())
        <p>Aún no hay vuelos registrados.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Aerolínea</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Fecha</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vuelos as $vuelo)
                    <tr>
                        <td>{{ $vuelo->id_vuelo }}</td>
                        <td>{{ $vuelo->aerolinea?->nombre }}</td>
                        <td>{{ $vuelo->origen }}</td>
                        <td>{{ $vuelo->destino }}</td>
                        <td>{{ $vuelo->fecha }}</td>
                        <td>{{ $vuelo->precio }}</td>
                        <td>
                            <a href="{{ route('vuelos.edit', $vuelo) }}">Editar</a>

                            <form class="inline"
                                  action="{{ route('vuelos.destroy', $vuelo) }}"
                                  method="POST"
                                  onsubmit="return confirm('¿Eliminar este vuelo?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection