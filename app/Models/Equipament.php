<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipament extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'description_aux', 'obs', 'group_id', 'serial', 'status', 'user_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    Public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requisitions()
    {
        return $this->belongsTo(Requisition::class);
    }

    public function stocks()
    {
        return $this->hasOne(Stock::class);
    }
}
