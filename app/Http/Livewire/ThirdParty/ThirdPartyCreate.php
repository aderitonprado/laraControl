<?php

namespace App\Http\Livewire\ThirdParty;

use Livewire\Component;

class ThirdPartyCreate extends Component
{
    public $thirdparty = [];

    protected $rules = [
        'thirdparty.description'       => 'required|string|min:4',
        'thirdparty.description_aux'   => 'required',
        'thirdparty.third_party_code'  => 'required|min:4',
        //'thirdparty.obs'               => 'required|min:5',
        'thirdparty.status'            => 'required|integer|min:1',
    ];

    public function createThirdParty()
    {
        $this->validate();

        auth()->user()->thirdparties()->create($this->thirdparty);
        
        session()->flash('message', 'Terceiro ' . $this->thirdparty['description'] . ' criado com sucesso!');

        return redirect('/thirdparties');
    }

    public function render()
    {
        return view('livewire.third-party.third-party-create');
    }
}
