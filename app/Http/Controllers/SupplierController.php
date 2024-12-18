<?php

namespace App\Http\Controllers\Api;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    public function store(Request $request)
    {
        // Aseguramos que city_id sea tratado como string o null
        $request->merge([
            'city_id' => $request->input('city_id') !== null ? (string) $request->input('city_id') : null
        ]);

        $validated = $request->validate([
            'id' => 'required|string|max:13|unique:suppliers',
            'name' => 'required|string|max:255',
            'city_id' => [
                'nullable',
                'string', // Asegura que city_id es un string
                Rule::exists('cities', 'id'), // Verifica existencia de city_id en cities
            ],
            'supplier_type' => 'required|boolean',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'status' => 'boolean',
        ]);

        try {
            $supplier = Supplier::create($validated);
            return response()->json($supplier, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el proveedor.'], 400);
        }
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'nullable|string|exists:cities,id', // Validamos como string
            'supplier_type' => 'required|boolean',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'status' => 'boolean',
        ]);

        try {
            $supplier->update($validated);
            return response()->json($supplier, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el proveedor.'], 400);
        }
    }

    public function destroy(Request $request, Supplier $supplier)
    {
        try {
            $supplier->delete();
            return response()->json(['message' => 'Proveedor eliminado correctamente.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el proveedor.'], 400);
        }
    }
}
