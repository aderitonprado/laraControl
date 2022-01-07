<?php

namespace App\Http\Livewire\Equipament;

use App\Models\Equipament;
use App\Models\Group;
use Livewire\Component;

class EquipamentShow extends Component
{
    public $equipaments = [];
    public $grupos;
    public Equipament $equipament;

    public function mount()
    {
        $this->equipaments['description'] = $this->equipament->description;
        $this->equipaments['description_aux'] = $this->equipament->description_aux;
        $this->equipaments['group_id'] = $this->equipament->group_id;
        $this->equipaments['obs'] = $this->equipament->obs;
        $this->equipaments['serial'] = $this->equipament->serial;
        $this->equipaments['status'] = $this->equipament->status;
        $this->grupos = Group::all();
 
    }

    public function render()
    {
        return view('livewire.equipament.equipament-show');
    }
}
