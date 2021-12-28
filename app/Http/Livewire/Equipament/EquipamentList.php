<?php

namespace App\Http\Livewire\Equipament;

use Livewire\Component;
use App\Models\Equipament;
use Livewire\WithPagination;

class EquipamentList extends Component
{
    use WithPagination;

    public $status = null;
    public $start_date = null;
    public $end_date = null;
    public $take;

    public function render()
    {
        $equipaments = Equipament::orderBy('id', 'DESC');

        $equipaments->when($this->start_date, function ($queryBuilder) {
            return $queryBuilder->where('created_at', '>=', $this->start_date);
        });

        $equipaments->when($this->end_date, function ($queryBuilder) {
            return $queryBuilder->where('created_at', '<=', $this->end_date);
        });

        $equipaments->when($this->status, function ($queryBuilder) {
            $this->status == "A" ? $this->status = 1 : $this->status = 0;
            return $queryBuilder->where('status', '=', $this->status);
        });

        $equipaments = $this->take ? $equipaments->paginate($this->take) : $equipaments->get();

        $equipaments = $equipaments->count() ? $equipaments : [];

        return view('livewire.equipament.equipament-list', compact('equipaments'));
    }
}
