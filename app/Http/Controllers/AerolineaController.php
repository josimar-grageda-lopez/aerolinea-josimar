<?php

namespace App\Http\Controllers;

use App\Models\Aerolinea;
use Illuminate\Http\Request;

class AerolineaController extends Controller
{
    public function index()
    {
        $aerolineas = Aerolinea::all();

        return view('aerolineas.index', compact('aerolineas'));
    }

    public function create()
    {
        return view('aerolineas.create');   
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'pais_sede' => ['required', 'string', 'max:100'],
        ]);

        Aerolinea::create($datos);

        return redirect()->route('aerolineas.index')
            ->with('mensaje', 'Aerolínea creada correctamente.');
    }

    public function show(Aerolinea $aerolinea)
{
    return redirect()->route('aerolineas.index');
}
    public function edit(Aerolinea $aerolinea)
    {
        return view('aerolineas.edit', compact('aerolinea'));
    }

    public function update(Request $request, Aerolinea $aerolinea)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'pais_sede' => ['required', 'string', 'max:100'],
        ]);

        $aerolinea->update($datos);

        return redirect()->route('aerolineas.index')
            ->with('mensaje', 'Aerolínea actualizada correctamente.');
    }

    public function destroy(Aerolinea $aerolinea)
    {
        $aerolinea->delete();

        return redirect()->route('aerolineas.index')
            ->with('mensaje', 'Aerolínea eliminada correctamente.');
    }
}