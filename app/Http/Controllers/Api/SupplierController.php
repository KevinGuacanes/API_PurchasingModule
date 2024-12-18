<?php

namespace App\Http\Controllers\Api;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  


class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
    
        // Verificamos si hay registros
        if ($suppliers->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron proveedores.'
            ], 404);
        }
    
        // Convertimos el supplier_type a texto legible
        $suppliers->transform(function ($supplier) {
            $supplier->supplier_type = $supplier->supplier_type ? 'Crédito' : 'Contado';
            return $supplier;
        });
    
        return response()->json(['data' => $suppliers], 200);
    }
    

}
