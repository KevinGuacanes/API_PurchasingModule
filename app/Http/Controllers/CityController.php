<?php


namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class CityController extends Controller
{
    // Listar ciudades con paginación
    public function index(Request $request)
    {
        $cities = City::paginate(10); // Agrega paginación (10 por página)

        return Inertia::render('Cities/Index', [
            'cities' => $cities,
        ]);
    }

    // Mostrar formulario de creación
    public function create()
    {
        return Inertia::render('Cities/Create');
    }

    // Guardar nueva ciudad
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string|max:10|unique:cities',
            'name' => 'required|string|max:100',
        ]);

        try {
            City::create($validated);
            return Redirect::route('cities.index')->with('success', 'Ciudad creada correctamente.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', 'Error al crear la ciudad.');
        }
    }

    // Mostrar formulario de edición
    public function edit(City $city)
    {
        return Inertia::render('Cities/Edit', [
            'city' => $city,
        ]);
    }

    // Actualizar ciudad
    public function update(Request $request, City $city)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
        ]);

        try {
            $city->update($validated);
            return Redirect::route('cities.index')->with('success', 'Ciudad actualizada correctamente.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', 'Error al actualizar la ciudad.');
        }
    }

    // Eliminar ciudad
    public function destroy(City $city)
    {
        try {
            $city->delete();
            return Redirect::route('cities.index')->with('success', 'Ciudad eliminada correctamente.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', 'Error al eliminar la ciudad.');
        }
    }
}

// namespace App\Http\Controllers;

// use App\Models\City;
// use Illuminate\Http\Request;
// use Inertia\Inertia;

// class CityController extends Controller
// {
//     public function index()
//     {
//         $cities = City::all();
//         return Inertia::render('Cities/Index', ['cities' => $cities]);
//     }

//     public function create()
//     {
//         return Inertia::render('Cities/Create');
//     }

//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'id' => 'required|string|max:10|unique:cities',
//             'name' => 'required|string|max:100',
//         ]);

//         City::create($validated);

//         return redirect()->route('cities.index')->with('success', 'Ciudad creada correctamente.');
//     }

//     public function edit(City $city)
//     {
//         return Inertia::render('Cities/Edit', ['city' => $city]);
//     }

//     public function update(Request $request, City $city)
//     {
//         $validated = $request->validate([
//             'name' => 'required|string|max:100',
//         ]);

//         $city->update($validated);

//         return redirect()->route('cities.index')->with('success', 'Ciudad actualizada correctamente.');
//     }

//     public function destroy(City $city)
//     {
//         $city->delete();
//         return redirect()->route('cities.index')->with('success', 'Ciudad eliminada correctamente.');
//     }
// }
