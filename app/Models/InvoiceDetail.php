<?php
// app/Models/InvoiceDetail.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'invoice_id',
        'product_id',
        'quantity',
        'unit_price',
        'vat_included',
        'subtotal'
    ];

    protected $casts = [
        'vat_included' => 'integer',
    ];

    public $incrementing = false;

    protected $keyType = 'string';

    public function purchaseInvoice()
    {
        return $this->belongsTo(PurchaseInvoice::class, 'invoice_id', 'id');
    }
}
