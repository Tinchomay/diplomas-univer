<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Diplomas extends Component
{
    use WithFileUploads;

    public $archivo;

    public function render()
    {
        return view('livewire.diplomas');
    }

    function generarDiplomas()
    {
        dd('Hola');
    }
}
