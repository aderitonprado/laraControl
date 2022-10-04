<?php

namespace App\Http\Livewire\Supply;

use Livewire\WithPagination;
use App\Models\Supply;
use Livewire\Component;


class SupplyList extends Component
{
    use WithPagination;

    public $search = null;
    public $type = null;
    public $start_date = null;
    public $end_date = null;
    public $take;

    public function render()
    {
        $supplies = Supply::join('third_parties', 'supplies.third_party_id', '=', 'third_parties.id')->orderBy('supplies.id', 'desc');

        $supplies->when($this->search, function($queryBuilder){
            return $queryBuilder->where('supply_pump', 'LIKE', '%' . $this->search . '%');
        });

        $supplies->when($this->type, function($queryBuilder){
            return $queryBuilder->where('client_type', $this->type);
        });

        $supplies->when($this->start_date, function($queryBuilder){
            return $queryBuilder->where('supply_date', '>=', $this->start_date);
        });

        $supplies->when($this->end_date, function($queryBuilder){
            return $queryBuilder->where('supply_date', '<=', $this->end_date);
        });

        $supplies = $this->take ? $supplies->paginate($this->take) : $supplies->get();

        //dd($supplies);

        $supplies = $supplies->count() ? $supplies : [];

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
