<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdParty extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'description_aux', 'third_party_code', 'plate' ,'obs', 'status', 'user_id'];

    Public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplies()
    {
        return $this->hasMany(Supply::class);
    }

}
