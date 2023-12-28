<?php

namespace App\Livewire\Main;

use Livewire\Component;
use App\Models\Items;

class ServiceComponent extends Component
{
    public function render()
    {
        $data = [
            'items' => Items::all(),
        ];

        return view('livewire.main.service-component', $data)->layout('layouts.template2');
    }
}
