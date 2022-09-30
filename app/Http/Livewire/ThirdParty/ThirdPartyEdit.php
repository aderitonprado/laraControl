<?php

namespace App\Http\Livewire\ThirdParty;

use Livewire\Component;
use App\Models\ThirdParty;

class ThirdPartyEdit extends Component
{
    public $thirdparties = [];
    public ThirdParty $thirdparty;

    protected $rules = [
        'thirdparties.description'       => 'required|string|min:4',
        'thirdparties.description_aux'   => 'required',
        'thirdparties.third_party_code'  => 'required|integer|min:4', 
        'thirdparties.obs'               => 'required|min:5', 
        'thirdparties.status'            => 'required|integer|min:1',
    ];

    public function mount()
    {
        $this->thirdparties['description'] = $this->thirdparty->description;
        $this->thirdparties['description_aux'] = $this->thirdparty->description_aux;
        $this->thirdparties['third_party_code'] = $this->thirdparty->third_party_code;
        $this->thirdparties['obs'] = $this->thirdparty->obs;
        $this->thirdparties['status'] = $this->thirdparty->status;
 
    }

    public function updateThirdParty()
    {
        $this->validate();

        $this->thirdparty->update($this->thirdparties);

        session()->flash('message', 'Terceiro atualizado com sucesso!');

        return redirect('/thirdparties');
    }

    public function render()
    {
        return view('livewire.third-party.third-party-edit');
    }
}
