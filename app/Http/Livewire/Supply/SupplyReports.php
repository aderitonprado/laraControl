<?php

namespace App\Http\Livewire\Supply;

use App\Models\Supply;
use Livewire\Component;
use PDF;

class SupplyReports extends Component
{
    public function render()
    {
        $supplies = Supply::all();

        return view('livewire.supply.supply-reports', compact('supplies'));
    }

    public function exportPDF()
    {

        $supplies = Supply::all();

        $view = view('livewire.supply.supply-pdf')->with(compact('supplies'));
        $html = $view->render();
        $pdf = PDF::loadHTML($html)->save(public_path() . '/supply.pdf');

        $this->redirect('/supply.pdf');
    }
}
