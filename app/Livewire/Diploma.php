<?php

namespace App\Livewire;

use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Diploma extends Component
{
    public function render()
    {
        return view('livewire.diploma');
    }
}
