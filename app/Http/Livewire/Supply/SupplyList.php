<?php

namespace App\Http\Livewire\Supply;

use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Supply;
use Livewire\Component;


class SupplyList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = null;
    public $type = null;
    public $fleet = null;
    public $vehicles_plate = null;
    public $start_date = null;
    public $end_date = null;
    public $take;

    public function render()
    {
        $supplies = Supply::join('third_parties', 'supplies.third_party_id', '=', 'third_parties.id')
                    ->select('supplies.*', 'third_parties.description')
                    ->orderBy('supplies.id', 'DESC');

        $supplies->when($this->type, function($queryBuilder){
            return $queryBuilder->where('client_type', $this->type);
        });

        $supplies->when($this->fleet, function ($queryBuilder) {
            return $queryBuilder->where('vehicles_fleet', $this->fleet);
        });

        $supplies->when($this->vehicles_plate, function ($queryBuilder) {
            return $queryBuilder->where('vehicles_plate', 'LIKE', '%' . $this->vehicles_plate . '%');
        });

        $supplies->when($this->start_date, function($queryBuilder){
            return $queryBuilder->where('supply_date', '>=', $this->start_date);
        });

        $supplies->when($this->end_date, function($queryBuilder){
            return $queryBuilder->where('supply_date', '<=', $this->end_date);
        });

        $supplies = $this->take ? $supplies->paginate($this->take) : $supplies->paginate(15);

        //$supplies = $supplies->count() < 0 ? $supplies : [];

        return view('livewire.supply.supply-list', compact('supplies'));
    }

    public function remove($supply)
    {

        $sup = Supply::find($supply);
        //$sup = auth()->user()->expenses()->find($expense);
        $sup->delete();

        session()->flash('message', 'Registro removido com sucesso!');

    }

}
