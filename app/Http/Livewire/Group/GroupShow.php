<?php

namespace App\Http\Livewire\Group;

use Livewire\Component;
use App\Models\Group;

class GroupShow extends Component
{
    public $description;
    public $user_id;

    public Group $group;

    public function mount()
    {
        $this->description = $this->group->description;
        $this->user_id = $this->group->user_id;
    }

    public function render()
    {
        return view('livewire.group.group-show');
    }
}
