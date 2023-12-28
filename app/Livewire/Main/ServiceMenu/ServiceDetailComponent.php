<?php

namespace App\Livewire\Main\ServiceMenu;

use Livewire\Component;

class ServiceDetailComponent extends Component
{
    public $id;

     public function mount($id)
    {   
        dd($id);
        $this->id = base64_decode($id);
    }

    public function render()
    {
        return view('livewire.main.service-menu.service-detail-component')
                    ->layout('layouts.template2', ['id' => 2]);
    }

   

}
