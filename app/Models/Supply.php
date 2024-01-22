<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Supply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'supply_pump',
        'supply_date',
        'warehouse',
        'supply_driver',
        'third_party_code',
        'third_party_id',
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
        'userid_update',
        'pump_price',
        'hour_meter',
        'pump_total_price',
    ];

    protected $dates = ['supply_date'];

    // ACESSOR PUMP PRICE
    public function getPumpPriceAttribute()
    {
        return $this->attributes['pump_price'] / 100;
    }
    
    // MUTATOR  PUMP PRICE
    public function setPumpPriceAttribute($valor)
    {
        $this->attributes['pump_price'] = $valor * 100;   
    }

    // MUTATOR PUMP TOTAL PRICE
    public function setPumpTotalPriceAttribute($valor)
    {
        return $this->attributes['pump_total_price'] = $valor * 100;
    }
    
    // ACESSOR PUMP TOTAL PRICE
    public function getPumpTotalPriceAttribute()
    {
        return $this->attributes['pump_total_price'] / 100;
    }

    // MUTATOR SUPPLY DATE
    public function setTesteDateAttribute($prop)
    {
        return $this->attributes['supply_date'] = (\DateTime::createFromFormat('d/m/Y H:i:s', $prop))->format('Y-m-d H:i:s');
    }

    public function thirdy_parties()
    {
        return $this->belongsTo(ThirdParty::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSuppliesWithThird($id)
    {
        return $this->join('third_parties', 'supplies.third_party_id', '=', 'third_parties.id')
        ->select('supplies.*', 'third_parties.description', 'third_parties.description_aux')
        ->where('supplies.id', '=', $id)
        ->get();
    }
}
