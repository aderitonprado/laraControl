<?php

namespace App\Http\Livewire\Supply;

use App\Models\Supply;
use Livewire\Component;
use App\Helpers\CalculaQtd;

class SupplyEdit extends Component
{
    public Supply $supply;

    public $supply_pump;
    public $supply_date;
    public $warehouse;
    public $people_code;
    public $vehicles_code;
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
    public $hour_meter;

    // Linhas que contém os campos que serão validados
    protected $rules = [
        'supply_pump'        => 'required|integer|min:1',
        'supply_date'        => 'required',
        'warehouse'          => 'required|integer|min:1',
        //'supply.people_code'        => 'required|integer',
        //'supply.vehicles_code'      => 'required|integer',
        'supply.vehicles_fleet'     => 'required|integer',
        'supply.client_type'        => 'required',
        'supply.vehicles_last_km'   => 'required|integer',
        'supply.vehicles_plate'     => 'required|min:4',
        //'supply.qtd'                => 'required|integer|min:1',
        'supply.pump_start'         => 'required',
        'supply.pump_end'           => 'required',
        'supply.start_time'         => 'required',
        'supply.end_time'           => 'required',
        'supply.hour_meter'         => 'required|integer|min:1',

    ];

    public function mount()
    {

        $this->supply_pump      = $this->supply->supply_pump;
        $this->supply_date      = $this->supply->supply_date->format('Y-m-d');
        $this->warehouse        = $this->supply->warehouse;
        $this->people_code      = $this->supply->people_code;
        $this->vehicles_code    = $this->supply->vehicles_code;
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
        $this->hour_meter       = $this->supply->hour_meter;

    }

    public function updateSupply()
    {

        $this->validate();

        // calculo que resulta na quantidade do abastecimento
        $this->qtd = CalculaQtd::Calcular(intval($this->pump_start), intval($this->pump_end));

        // se o valor da quantidade for maior que zero, o abastecimento é gravado
        if (intval($this->qtd) <= 0) {

            session()->flash('message', 'Quantidade não pode ser zero!');

        } else {

            $this->supply->update([
                'supply_pump'      => $this->supply_pump,
                'supply_date'      => $this->supply_date,
                'warehouse'        => $this->warehouse,
                'people_code'      => $this->people_code,
                'vehicles_code'    => $this->vehicles_code,
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
                'hour_meter'       => $this->hour_meter,
                'userid_update'    => auth()->user()->id,

            ]);

            session()->flash('message', 'Abastecimento atualizado com sucesso!');

            return redirect('/supplies');
        }
    }

    public function render()
    {
        return view('livewire.supply.supply-edit');
    }
}
