<?php

namespace App\Http\Livewire\Group;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Group;

class GroupList extends Component
{
    use WithPagination;

    public $type = null;
    public $start_date = null;
    public $end_date = null;
    public $take;

    public function render()
    {
        $groups = Group::orderBy('id', 'DESC');

        $groups->when($this->start_date, function($queryBuilder){
            return $queryBuilder->where('created_at', '>=', $this->start_date);
        });

        $groups->when($this->end_date, function($queryBuilder){
            return $queryBuilder->where('created_at', '<=', $this->end_date);
        });

        $groups = $this->take ? $groups->paginate($this->take) : $groups->get();

        $groups = $groups->count() ? $groups : [];

        return view('livewire.group.group-list', compact('groups'));
    }

    public function remove($group)
    {

        $grp = Group::find($group);
        
        $grp->delete();

        session()->flash('message', 'Grupo '.$grp->description.' removido com sucesso!');

    }
}
