<?php

namespace App\Livewire\Main;

use Livewire\Component;

class ComputersComponent extends Component
{
    public function render()
    {
        return view('livewire.main.computers-component')->layout('layouts.template2');
    }
}
