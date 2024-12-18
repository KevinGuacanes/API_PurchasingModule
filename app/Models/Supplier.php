<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'city_id', 'supplier_type', 'address', 'phone', 'email', 'status'];

    // Supplier.php
    public function city()
    {
        return $this->belongsTo(City::class);
    }


    // Modelo Supplier.php
public function purchaseInvoices()
{
    return $this->hasMany(PurchaseInvoice::class, 'supplier_id');
}

}
