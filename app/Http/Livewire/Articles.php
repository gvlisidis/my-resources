<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Articles extends Component
{
    public function render()
    {
        return view('livewire.articles', [
            'articles' => auth()->user()->articles()->paginate(12),
        ]);
    }
}
