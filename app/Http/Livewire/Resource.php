<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Resource extends Component
{
    public $showModal = true;

    public function render()
    {
        return view('livewire.resource');
    }
}
