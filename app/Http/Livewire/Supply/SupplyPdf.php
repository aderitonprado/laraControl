<?php

namespace App\Http\Livewire\Supply;

use Livewire\Component;
use PDF;
use Dompdf\Options;
use App\Models\Supply;

class SupplyPdf extends Component
{

    public function render()
    {

        $supplies = Supply::all();

        return view('livewire.supply.supply-pdf', compact('supplies'));
    }

    public function exportPDF()
    {


        $supplies = Supply::all();

        $view = view('livewire.supply.supply-pdf')->with(compact('supplies'));
        $html = $view->render();
        $pdf = PDF::loadHTML($html)->save(public_path() . '/supply.pdf');

        $this->redirect('/supply.pdf');
    }

    // Generate PDF
    public function createPDF()
    {
        // retreive all records from db
        $supplies = Supply::all();

        // share data to view
        view()->share('livewire.supply.supply-pdf', $supplies);
        $pdf = PDF::loadView('livewire.supply.supply-pdf', $supplies);

        // download PDF file with download method
        return $pdf->stream('pdf_file.pdf');
    }
}
