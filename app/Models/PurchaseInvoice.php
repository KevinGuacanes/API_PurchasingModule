<?php
// app/Models/PurchaseInvoice.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    use HasFactory;

    // Indica que la clave primaria no es auto-incremental
    public $incrementing = false;

    // Especifica que el tipo de la clave primaria es string
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'date',
        'supplier_id',
        'payment_type',
        'due_date',
        'total',
        'status',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class, 'invoice_id', 'id');
    }
}
