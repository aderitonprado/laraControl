<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;

    public function equipaments()
    {
        return $this->hasMany(Equipament::class);
    }

    public function items()
    {
        return $this->hasMany(RequisitionItem::class);
    }
}
