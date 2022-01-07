<?php

namespace App\Http\Livewire\Equipament;

use App\Models\Equipament;
use App\Models\Group;
use Livewire\Component;

class EquipamentEdit extends Component
{
    public $equipaments = [];
    public $grupos;
    public Equipament $equipament;

    protected $rules = [
        'equipament.description'       => 'required|string|min:4',
        'equipament.description_aux'   => 'required',
        'equipament.group_id'          => 'required|integer|min:1', 
        'equipament.serial'            => 'required|min:1', 
        'equipament.status'            => 'required|integer|min:1',
    ];

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

    public function updateEquipament()
    {
        $this->equipament->update($this->equipaments);

        session()->flash('message', 'Equipamento atualizado com sucesso!');

        return redirect('/equipaments');
    }

    public function render()
    {
        return view('livewire.equipament.equipament-edit');
    }
}
