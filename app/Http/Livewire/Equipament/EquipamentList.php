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
        // Retorna todos os equipamentos por ordem de ID Desc
        $equipaments = Equipament::orderBy('id', 'DESC');

        /**
         * Retorna os equipamentos respeitando a data de inicio do cadastro
         */
        $equipaments->when($this->start_date, function ($queryBuilder) {
            return $queryBuilder->where('created_at', '>=', $this->start_date);
        });

        /**
         * Retorna os equipamentos respeitando a data final do cadastro
         */
        $equipaments->when($this->end_date, function ($queryBuilder) {
            return $queryBuilder->where('created_at', '<=', $this->end_date);
        });

        /**
         * Retorna os equipamentos por status: Ativo / Inativo / Todos
         */
        $equipaments->when($this->status, function ($queryBuilder) {

            $sts = '';

            if ($this->status != 'A' && $this->status != 'I') {
                $sts = '';
            }

            $this->status == 'A' ? $sts = 1 : $sts = 0;

            return $queryBuilder->where('status', '=', $sts);
        });

        $equipaments = $this->take ? $equipaments->paginate($this->take) : $equipaments->get();

        $equipaments = $equipaments->count() ? $equipaments : [];

        return view('livewire.equipament.equipament-list', compact('equipaments'));
    }
}
