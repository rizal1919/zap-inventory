<?php

namespace App\Livewire\Main;

use App\Models\ItemCategories;
use Livewire\Component;

class ItemsComponent extends Component
{
    public function render()
    {
        $categories      = ItemCategories::all();

        $data            = [
            'categories'     => $categories,
        ];

        return view('livewire..main.items-component', $data)->layout('layouts.template2');
    }
}
