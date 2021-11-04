<?php

namespace App\Http\Livewire\Supply;

use Livewire\Component;
use App\Models\Supply;
use PDF;

class SupplyPdf extends Component
{
    public Supply $supplies;

    public function render()
    {
        return view('livewire.supply.supply-pdf');
    }

    // Generate PDF
    public function mount()
    {
        // retreive all records from db
        $supplies = $this->supplies;

        // share data to view

        /*
        view()->share('livewire.supply.supply-pdf', $supplies);
        $pdf = PDF::loadView('livewire.supply.supply-pdf', $supplies); */

        $pdf = PDF::loadview('livewire.supply.supply-pdf', compact('supplies'));

        // download PDF file with download method
        return $pdf->stream('pdf_file.pdf');
    }
}
