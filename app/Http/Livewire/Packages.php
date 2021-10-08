<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Package;
use Livewire\Component;

class Packages extends Component
{
    public $title, $owner, $url, $package_id;
    public $isOpen = 0;
    public $method;

    protected $rules = [
        'title' => 'required|min:8',
        'url' => 'required|url',
        'owner' => 'required',
    ];

    public function render()
    {
        return view('livewire.packages.packages', [
            'packages' => auth()->user()->packages()->paginate(12),
        ]);
    }

    public function create()
    {
        $this->reset();
        $this->method = 'create';
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function store()
    {
        $this->validate();

        Package::updateOrCreate(['id' => $this->package_id], [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'url' => $this->url,
            'owner' => $this->owner,
        ]);

        session()->flash(
            'message',
            $this->package_id ? 'Package Updated Successfully.' : 'Package Created Successfully.'
        );
        $this->closeModal();
        $this->reset();
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $this->package_id = $id;
        $this->title = $package->title;
        $this->url = $package->url;
        $this->owner = $package->owner;
        $this->method = 'update';

        $this->openModal();
    }
}
