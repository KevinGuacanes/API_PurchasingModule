<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['id', 'name'];

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
}
