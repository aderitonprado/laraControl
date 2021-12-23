<?php

namespace App\Http\Livewire\Group;

use Livewire\Component;

class GroupCreate extends Component
{
    public $description;

    protected $rules = ['description' => 'required|min:4'];

    public function createGroup()
    {
        $this->validate();

        auth()->user()->groups()->create([
            'description' => $this->description
        ]);

        session()->flash('message', 'Grupo '.$this->description.' criado com sucesso!');
    }

    public function render()
    {
        return view('livewire.group.group-create');
    }
}
