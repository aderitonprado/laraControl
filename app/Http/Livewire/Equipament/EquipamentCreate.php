<?php

namespace App\Http\Livewire\Equipament;

use App\Models\Group;
use Livewire\Component;

class EquipamentCreate extends Component
{
    public $equipament = [];

    protected $rules = [
        'equipament.description'       => 'required|string|min:4',
        'equipament.description_aux'   => 'required',
        'equipament.group_id'          => 'required|integer|min:1', 
        'equipament.serial'            => 'required|min:1', 
        'equipament.status'            => 'required|integer|min:1',
    ];

    public function createEquipament()
    {
        $this->validate();

        auth()->user()->equipaments()->create($this->equipament);

        session()->flash('message', 'Equipamento ' . $this->equipament['description'] . ' criado com sucesso!');

        return redirect('/equipaments');
    }

    public function render()
    {
        $grupos = Group::all();

        return view('livewire.equipament.equipament-create', compact('grupos'));
    }
}
