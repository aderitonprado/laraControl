<?php

namespace App\Http\Livewire\Supply;

use Livewire\Component;
use App\Helpers\CalculaQtd;
use App\Helpers\CalculaPrecoTotal;

class SupplyCreate extends Component
{
    public $supply = [];

    // Linhas que contém os campos que serão validados
    protected $rules = [
        'supply.supply_pump'        => 'required|integer|min:1',
        'supply.supply_date'        => 'required',
        'supply.warehouse'          => 'required|integer|min:1',
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
        'supply.pump_price'         => 'required|string|min:1',

    ];

    // Metodo que cria o abastecimento no banco
    public function createSupply()
    {
        $this->validate();

        // calculo que resulta na quantidade do abastecimento
        $this->supply['qtd'] = CalculaQtd::Calcular(intval($this->supply['pump_start']), intval($this->supply['pump_end']));

        // transforma o pump_price em inteiro. sem arredondar nenhuma casa
        $this->supply['pump_price'] = (int)filter_var($this->supply['pump_price'], FILTER_SANITIZE_NUMBER_INT);

        // se o valor da quantidade for maior que zero, o abastecimento é gravado
        if (intval($this->supply['qtd']) <= 0) {

            session()->flash('message', 'Quantidade não pode ser zero!');
            
        } else {

            $this->supply['pump_total_price'] = CalculaPrecoTotal::CalcularTotal($this->supply['qtd'], $this->supply['pump_price']);

            auth()->user()->supplies()->create($this->supply);
            session()->flash('message', 'Abastecimento criado com sucesso!');

            return redirect('/supplies');
        }
    }

    public function render()
    {
        return view('livewire.supply.supply-create');
    }
}
