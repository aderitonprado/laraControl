<?php

namespace App\Http\Livewire\Supply;

use Livewire\Component;
use App\Helpers\CalculaQtd;
use App\Helpers\CalculaPrecoTotal;
use App\Models\ThirdParty;
use Carbon\Carbon;

class SupplyCreate extends Component
{
    public $supply = ['pump_price' => '3.5', 'warehouse' => 1, 'hour_meter' => 1, 'supply_pump' => 1, 'pump_start' => 1, 'pump_end' => 1, 'vehicles_fleet' => 1];
    public $vehicles_fleet;
    public $vehicles_plate;

    // Linhas que contém os campos que serão validados
    protected $rules = [
        //'supply.supply_pump'        => 'required|integer|min:1',
        //'supply.warehouse'          => 'required|integer|min:1',
        //'supply.hour_meter'         => 'required|integer',
        //'supply.pump_price'         => 'required|integer',
        //'supply.qtd'                => 'required|integer|min:1',
        'supply.supply_date'        => 'required',
        'supply.third_party_code'   => 'required|integer',
        'supply.vehicles_fleet'     => 'required|integer',
        'supply.client_type'        => 'required',
        'supply.vehicles_last_km'   => 'required|integer',
        'vehicles_plate'            => 'required|min:4',
        'supply.supply_driver'      => 'required|min:4',
        //'supply.pump_start'         => 'required',
        //'supply.pump_end'           => 'required',
        'supply.start_time'         => 'required',
        'supply.end_time'           => 'required',
        'supply.qtd'                => 'required|integer|min:1'

    ];

    // Metodo que cria o abastecimento no banco
    public function createSupply()
    {
        $this->validate();

        $this->supply['pump_total_price'] = CalculaPrecoTotal::CalcularTotal($this->supply['qtd'], $this->supply['pump_price']);

        $id_terceiro = ThirdParty::where('third_party_code', $this->supply['third_party_code'])->get();

        $this->supply['vehicles_plate'] = ($id_terceiro->first()->plate != null || $id_terceiro->first()->plate != '') ? $id_terceiro->first()->plate : $this->vehicles_plate;
        $this->supply['third_party_id'] = $id_terceiro->first()->id;

        auth()->user()->supplies()->create($this->supply);
        session()->flash('message', 'Abastecimento criado com sucesso!');

        return redirect('/supplies');
    }

    public function mount()
    {
        $this->supply['supply_date'] = Carbon::now()->toDateString();
        $this->supply['start_time'] = Carbon::now()->toTimeString('minutes');
        $this->supply['end_time'] = Carbon::now()->toTimeString('minutes');
        //$this->supply['vehicles_fleet'] = ThirdParty::where('')
    }

    public function updated($vehicles_fleet)
    {
        $id_terceiro = ThirdParty::where('third_party_code', $this->supply['third_party_code'])->get();

        if($id_terceiro->first() != null){
            $this->vehicles_plate = ($id_terceiro->first()->plate != null || $id_terceiro->first()->plate != '') ? $id_terceiro->first()->plate : $this->vehicles_plate;
        }

    }

    public function render()
    {
        $thirdparties = ThirdParty::all();

        return view('livewire.supply.supply-create', compact('thirdparties'));
    }
}
