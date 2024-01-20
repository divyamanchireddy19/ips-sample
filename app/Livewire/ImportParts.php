<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PartsImport;

class ImportParts extends Component
{
    use WithFileUploads;

    public $file;

    public function render()
    {
        return view('livewire.import-parts')->layout('layouts.base');
    }

    public function import()
    {
        // $this->validate();

        try {
            Excel::import(new PartsImport, $this->file);

            session()->flash('message', 'Parts imported successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error importing parts. '.$e->getMessage());
        }

        return redirect()->route('inventory.parts');
    }
}
