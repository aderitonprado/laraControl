<?php

namespace App\Http\Livewire\Supply;

use App\Models\Supply;
use Livewire\Component;

class SupplyReports extends Component
{
    public $search = null;
    public $type = null;
    public $start_date = null;
    public $end_date = null;
    public $take;

    public function render()
    {
        $supplies = Supply::orderBy('id', 'DESC');

        $supplies->when($this->search, function($queryBuilder){
            return $queryBuilder->where('supply_pump', 'LIKE', '%' . $this->search . '%');
        });

        $supplies->when($this->type, function($queryBuilder){
            return $queryBuilder->where('supply_pump', $this->type);
        });

        $supplies->when($this->start_date, function($queryBuilder){
            return $queryBuilder->where('supply_date', '>=', $this->start_date);
        });

        $supplies->when($this->end_date, function($queryBuilder){
            return $queryBuilder->where('supply_date', '<=', $this->end_date);
        });

        $supplies = $this->take ? $supplies->paginate($this->take) : $supplies->get();

        $supplies = $supplies->count() ? $supplies : [];

        return view('livewire.supply.supply-reports', compact('supplies'));
    }

}
