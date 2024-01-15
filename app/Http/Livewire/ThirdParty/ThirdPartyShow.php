<?php

namespace App\Http\Livewire\ThirdParty;

use Livewire\Component;
use App\Models\ThirdParty;

class ThirdPartyShow extends Component
{
    public $thirdparties = [];
    public ThirdParty $thirdparty;

    public function mount()
    {
        $this->thirdparties['description']      = $this->thirdparty->description;
        $this->thirdparties['third_party_code'] = $this->thirdparty->third_party_code;
        $this->thirdparties['plate']            = $this->thirdparty->plate;
        $this->thirdparties['obs']              = $this->thirdparty->obs;
        $this->thirdparties['status']           = $this->thirdparty->status;
    }

    public function render()
    {
        return view('livewire.third-party.third-party-show');
    }
}
