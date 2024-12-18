<?php

// app/Models/Supplier.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // Indica que la clave primaria no es auto-incremental
    public $incrementing = false;

    // Especifica que el tipo de la clave primaria es string
    protected $keyType = 'string';

    protected $fillable = ['id', 'name', 'city_id', 'supplier_type', 'address', 'phone', 'email', 'status'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function purchaseInvoices()
    {
        return $this->hasMany(PurchaseInvoice::class, 'supplier_id');
    }
}
