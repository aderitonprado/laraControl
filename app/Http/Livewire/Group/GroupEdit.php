<?php

namespace App\Http\Livewire\Group;

use App\Models\Group;
use Livewire\Component;

class GroupEdit extends Component
{
    public $description;
    public Group $group;

    protected $rules = [
        'description' => 'required|min:4',
    ];

    public function mount()
    {
        $this->description = $this->group->description;
    }

    public function updateGroup()
    {
        $this->validate();

        $this->group->update([
            'description' => $this->description,
            //'userid_update'    => auth()->user()->id,

        ]);

        session()->flash('message', 'Grupo atualizado com sucesso!');

        return redirect('/groups');
    }

    public function render()
    {
        return view('livewire.group.group-edit');
    }
}
