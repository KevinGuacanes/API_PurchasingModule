<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;  
use App\Models\PurchaseInvoice;

class PurchaseInvoiceController extends Controller
{
    public function getDetailedInvoices()
    {
        $invoices = PurchaseInvoice::with(['invoiceDetails' => function ($query) {
            $query->select('id', 'invoice_id', 'product_id', 'quantity', 'unit_price', 'vat_included', 'subtotal');
        }])->get();

        if ($invoices->isEmpty()) {
            return response()->json([
                'message' => 'No hay facturas de compra disponibles.',
            ],404);
        }

        return response()->json([
            'message' => 'Listado de facturas de compra detallado por productos obtenido exitosamente.',
            'data' => $invoices
        ], 200);
    }
}
