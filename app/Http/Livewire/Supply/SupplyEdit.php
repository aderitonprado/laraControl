<?php

namespace App\Http\Livewire\Supply;

use App\Models\Supply;
use App\Models\ThirdParty;
use Livewire\Component;
use App\Helpers\CalculaQtd;
use App\Helpers\CalculaPrecoTotal;

class SupplyEdit extends Component
{
    public Supply $supply;
    public $thirdparties;

    public $supply_pump = 1;
    public $supply_date;
    public $warehouse = 1;
    public $third_party_code;
    public $supply_driver;
    public $vehicles_fleet;
    public $client_type;
    public $vehicles_last_km;
    public $vehicles_plate;
    public $obs;
    public $qtd;
    public $pump_start = 1;
    public $pump_end = 1;
    public $start_time;
    public $end_time;
    public $pump_price;
    public $pump_manual_price = 3.5;
    public $pump_total_price;

    // Linhas que contém os campos que serão validados
    protected $rules = [
        //'supply_pump'        => 'required|integer|min:1',
        //'warehouse'          => 'required|integer|min:1',
        //'hour_meter'         => 'required|integer',
        'qtd'                => 'required|integer|min:1',
        //'pump_price'         => 'required|integer',
        'supply_date'        => 'required',
        'third_party_code'   => 'required|integer',
        'vehicles_fleet'     => 'required|integer',
        'client_type'        => 'required',
        'vehicles_last_km'   => 'required|integer',
        'vehicles_plate'     => 'required|min:4',
        'supply_driver'      => 'required|min:4',
        'start_time'         => 'required',
        'end_time'           => 'required',

    ];

    public function mount()
    {
        $this->thirdparties = ThirdParty::all();

        //dd($this->supply->pump_price);

        $this->supply_pump      = $this->supply->supply_pump;
        $this->supply_date      = $this->supply->supply_date->format('Y-m-d');
        $this->warehouse        = $this->supply->warehouse;
        $this->third_party_code = $this->supply->third_party_code;
        $this->supply_driver    = $this->supply->supply_driver;
        $this->vehicles_fleet   = $this->supply->vehicles_fleet;
        $this->client_type      = $this->supply->client_type;
        $this->vehicles_last_km = $this->supply->vehicles_last_km;
        $this->vehicles_plate   = $this->supply->vehicles_plate;
        $this->obs              = $this->supply->obs;
        $this->qtd              = $this->supply->qtd;
        $this->pump_start       = $this->supply->pump_start;
        $this->pump_end         = $this->supply->pump_end;
        $this->start_time       = $this->supply->start_time;
        $this->end_time         = $this->supply->end_time;
        $this->pump_price       = $this->supply->pump_price;
    }

    public function updateSupply()
    {

        $this->validate();

        $this->pump_total_price = CalculaPrecoTotal::CalcularTotal($this->qtd, $this->pump_manual_price);

        $this->supply->update([
            'supply_pump'      => $this->supply_pump,
            'supply_date'      => $this->supply_date,
            'warehouse'        => $this->warehouse,
            'third_party_code' => $this->third_party_code,
            'supply_driver'    => $this->supply_driver,
            'vehicles_fleet'   => $this->vehicles_fleet,
            'client_type'      => $this->client_type,
            'vehicles_last_km' => $this->vehicles_last_km,
            'vehicles_plate'   => $this->vehicles_plate,
            'obs'              => $this->obs,
            'qtd'              => $this->qtd,
            'pump_start'       => $this->pump_start,
            'pump_end'         => $this->pump_end,
            'start_time'       => $this->start_time,
            'end_time'         => $this->end_time,
            'pump_price'       => $this->pump_manual_price,
            'pump_total_price' => $this->pump_total_price,
            'userid_update'    => auth()->user()->id,

        ]);

        session()->flash('message', 'Abastecimento atualizado com sucesso!');

        return redirect('/supplies');
    }

    public function render()
    {
        return view('livewire.supply.supply-edit');
    }
}
