<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',            // ID del detalle.
        'invoice_id',    // Relación con la factura (PurchaseInvoice).
        'product_id',    // Relación con un producto (suponiendo un modelo Product).
        'quantity',      // Cantidad del producto.
        'unit_price',    // Precio unitario del producto.
        'vat_included',  // IVA incluido (boolean o entero).
        'subtotal'       // Subtotal del detalle.
    ];

    protected $casts = [
        'vat_included' => 'integer', // Garantiza que vat_included sea tratado como entero.
    ];

    
    public function purchaseInvoice()
    {
        return $this->belongsTo(PurchaseInvoice::class, 'invoice_id', 'id');
    }
}
