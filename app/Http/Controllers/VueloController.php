<?php

namespace App\Http\Controllers;

use App\Models\Aerolinea;
use App\Models\Vuelo;
use Illuminate\Http\Request;

class VueloController extends Controller
{
    public function index()
    {
        $vuelos = Vuelo::with('aerolinea')->get();

        return view('vuelos.index', compact('vuelos'));
    }

    public function create()
    {
        $aerolineas = Aerolinea::all();

        return view('vuelos.create', compact('aerolineas'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'id_aerolinea' => ['required', 'exists:aerolineas,id_aerolinea'],
            'origen' => ['required', 'string', 'max:100'],
            'destino' => ['required', 'string', 'max:100'],
            'fecha' => ['required', 'date'],
            'precio' => ['required', 'numeric', 'min:0'],
        ]);

        Vuelo::create($datos);

        return redirect()->route('vuelos.index')
            ->with('mensaje', 'Vuelo creado correctamente.');
    }

    public function show(Vuelo $vuelo)
    {
        return redirect()->route('vuelos.index');
    }

    public function edit(Vuelo $vuelo)
    {
        $aerolineas = Aerolinea::all();

        return view('vuelos.edit', compact('vuelo', 'aerolineas'));
    }

    public function update(Request $request, Vuelo $vuelo)
    {
        $datos = $request->validate([
            'id_aerolinea' => ['required', 'exists:aerolineas,id_aerolinea'],
            'origen' => ['required', 'string', 'max:100'],
            'destino' => ['required', 'string', 'max:100'],
            'fecha' => ['required', 'date'],
            'precio' => ['required', 'numeric', 'min:0'],
        ]);

        $vuelo->update($datos);

        return redirect()->route('vuelos.index')
            ->with('mensaje', 'Vuelo actualizado correctamente.');
    }

    public function destroy(Vuelo $vuelo)
    {
        $vuelo->delete();

        return redirect()->route('vuelos.index')
            ->with('mensaje', 'Vuelo eliminado correctamente.');
    }
}