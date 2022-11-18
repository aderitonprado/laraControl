<?php

namespace App\Http\Livewire\Supply;

use App\Models\Supply;
use App\Models\ThirdParty;
use Livewire\Component;

class SupplyReports extends Component
{
    public $search = null;
    public $type = null;
    public $third_party_code = null;
    public $fleet = null;
    public $start_date = null;
    public $end_date = null;
    public $take;
    public $valor_total = null;

    public function render()
    {

        $thirdparties = ThirdParty::all();

        $supplies = Supply::join('third_parties', 'supplies.third_party_id', '=', 'third_parties.id');
        $valor_total = $this->valor_total;

        //dd($thirdparties);

        $supplies->when($this->third_party_code, function ($queryBuilder) {
            return $queryBuilder->where('supplies.third_party_code', $this->third_party_code);
        });

        $supplies->when($this->fleet, function ($queryBuilder) {
            return $queryBuilder->where('vehicles_fleet', $this->fleet);
        });

        $supplies->when($this->search, function ($queryBuilder) {
            return $queryBuilder->where('supply_pump', 'LIKE', '%' . $this->search . '%');
        });

        $supplies->when($this->type, function ($queryBuilder) {
            return $queryBuilder->where('client_type', $this->type);
        });

        $supplies->when($this->start_date, function ($queryBuilder) {
            return $queryBuilder->where('supply_date', '>=', $this->start_date);
        });

        $supplies->when($this->end_date, function ($queryBuilder) {
            return $queryBuilder->where('supply_date', '<=', $this->end_date);
        });

        if ($this->start_date && $this->end_date) {
            $supplies->when($this->start_date, function ($queryBuilder) {
                $this->valor_total = 'TOTAL = R$ ' . number_format($queryBuilder->sum('pump_total_price', 'BETWEEN', $this->start_date, $this->end_date) / 100, 2, ',', '.');
                return $this->valor_total;
            });
        }

        //$valor_total = $supplies::Raw('SELECT SUM(valor) AS total_despesas FROM lançamentos WHERE tipo_id = 1')->get();

        $supplies = $this->take ? $supplies->paginate($this->take) : $supplies->get();

        $supplies = $supplies->count() ? $supplies : [];

        return view('livewire.supply.supply-reports', compact(['supplies', 'thirdparties', 'valor_total']));
    }
}
