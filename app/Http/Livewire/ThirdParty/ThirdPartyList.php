<?php

namespace App\Http\Livewire\ThirdParty;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ThirdParty;

class ThirdPartyList extends Component
{
    use WithPagination;

    public $status = null;
    public $start_date = null;
    public $end_date = null;
    public $take;

    public function render()
    {
        // Retorna todos os terceiros por ordem de ID Desc
        $thirdparties = ThirdParty::orderBy('id', 'DESC');

        /**
         * Retorna os terceiros respeitando a data de inicio do cadastro
         */
        $thirdparties->when($this->start_date, function ($queryBuilder) {
            return $queryBuilder->where('created_at', '>=', $this->start_date);
        });

        /**
         * Retorna os terceiros respeitando a data final do cadastro
         */
        $thirdparties->when($this->end_date, function ($queryBuilder) {
            return $queryBuilder->where('created_at', '<=', $this->end_date);
        });

        /**
         * Retorna os terceiros por status: Ativo / Inativo / Todos
         */
        $thirdparties->when($this->status, function ($queryBuilder) {

            $sts = '';

            if ($this->status != 'A' && $this->status != 'I') {
                $sts = '';
            }

            $this->status == 'A' ? $sts = 1 : $sts = 0;

            return $queryBuilder->where('status', '=', $sts);
        });

        $thirdparties = $this->take ? $thirdparties->paginate($this->take) : $thirdparties->get();

        $thirdparties = $thirdparties->count() ? $thirdparties : [];

        return view('livewire.third-party.third-party-list', compact('thirdparties'));
    }

    public function remove($thirdparty)
    {

        $third = ThirdParty::find($thirdparty);
        
        $third->delete();

        session()->flash('message', 'Terceiro '.$third->description.' removido com sucesso!');

    }
}
