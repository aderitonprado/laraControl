<?php

namespace App\Http\Livewire\Supply;

use Illuminate\Support\Facades\DB;
use App\Models\Supply;
use Livewire\Component;

class SupplyShow extends Component
{
    public Supply $supply;

    public $supply_pump;
    public $supply_date;
    public $warehouse;
    public $third_party_code;
    public $third_party_name;
    public $supply_driver;
    public $vehicles_fleet;
    public $client_type;
    public $vehicles_last_km;
    public $vehicles_plate;
    public $obs;
    public $qtd;
    public $pump_start;
    public $pump_end;
    public $start_time;
    public $end_time;
    public $pump_price;

    public $supply_id;

    public function mount()
    {

        $this->supply_id = $this->supply->id;
        $this->third_party_name = $this->supply->getSuppliesWithThird($this->supply->id)->first();

        $this->supply_pump      = $this->supply->supply_pump;
        $this->supply_date      = $this->supply->supply_date;
        $this->warehouse        = $this->supply->warehouse;
        $this->third_party_name = $this->third_party_name->description;
        $this->vehicles_fleet   = $this->supply->vehicles_fleet;
        $this->client_type      = $this->supply->client_type;
        $this->supply_driver    = $this->supply->supply_driver;
        $this->vehicles_last_km = $this->supply->vehicles_last_km;
        $this->vehicles_plate   = $this->supply->vehicles_plate;
        $this->obs              = $this->supply->obs;
        $this->qtd              = $this->supply->qtd;
        $this->pump_start       = $this->supply->pump_start;
        $this->pump_end         = $this->supply->pump_end;
        $this->start_time       = $this->supply->start_time;
        $this->end_time         = $this->supply->end_time;
        $this->pump_price       = number_format($this->supply->pump_price, 2, ',', '.');

    }

    public function render()
    {

        return view('livewire.supply.supply-show');
    }

}
