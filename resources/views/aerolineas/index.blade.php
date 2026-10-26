@extends('layout')

@section('titulo', 'Aerolíneas')

@section('contenido')
    <h2>Aerolíneas</h2>

    <p><a href="{{ route('aerolineas.create') }}">Registrar aerolínea</a></p>

    @if ($aerolineas->isEmpty())
        <p>Aún no hay aerolíneas registradas.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>País sede</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aerolineas as $aerolinea)
                    <tr>
                        <td>{{ $aerolinea->id_aerolinea }}</td>
                        <td>{{ $aerolinea->nombre }}</td>
                        <td>{{ $aerolinea->pais_sede }}</td>
                        <td>
                            <a href="{{ route('aerolineas.edit', $aerolinea) }}">Editar</a>

                            <form class="inline"
                                  action="{{ route('aerolineas.destroy', $aerolinea) }}"
                                  method="POST"
                                  onsubmit="return confirm('¿Eliminar esta aerolínea?')">
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