<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function equipaments()
    {
        return $this->hasMany(Equipament::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
