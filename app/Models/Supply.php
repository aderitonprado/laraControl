<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'supply_pump',
        'supply_date',
        'warehouse',
        'people_code',
        'vehicles_code',
        'vehicles_fleet',
        'client_type',
        'vehicles_last_km',
        'vehicles_plate',
        'obs',
        'qtd',
        'pump_start',
        'pump_end',
        'start_time',
        'end_time',
        'hour_meter',
        'userid_update',
    ];

    protected $dates = ['supply_date'];

    // MUTATOR
    public function setExpenseDateAttribute($prop)
    {
        return $this->attributes['supply_date'] = (\DateTime::createFromFormat('d/m/Y H:i:s', $prop))->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
