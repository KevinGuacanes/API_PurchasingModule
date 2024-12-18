<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PurchaseInvoice;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Log;

class PurchaseInvoiceController extends Controller
{
    /**
     * Obtener el listado de facturas de compra detallado por productos.
     */
    public function getDetailedInvoices()
    {
        // Verificar si hay facturas
        $invoiceIds = PurchaseInvoice::pluck('id');
        
        if ($invoiceIds->isEmpty()) {
            return response()->json(['message' => 'No se encontraron facturas.', 'data' => []], 404);
        }

        // Depuración: Verificar IDs obtenidos
        Log::info('IDs de facturas obtenidos:', $invoiceIds->toArray());

        // Verificar detalles relacionados
        $invoices = InvoiceDetail::whereIn('invoice_id', $invoiceIds)->get();

        // Depuración: Verificar detalles obtenidos
        Log::info('Detalles de facturas obtenidos:', $invoices->toArray());

        if ($invoices->isEmpty()) {
            return response()->json(['message' => 'No se encontraron detalles para las facturas.', 'data' => []], 404);
        }

        return response()->json(['data' => $invoices], 200);
    }
}
