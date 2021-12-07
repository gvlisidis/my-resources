<?php

namespace App\Http\Livewire;

use App\Models\Package;
use Livewire\Component;

class Packages extends BaseResourceComponent
{
    public $title, $owner, $url, $package_id, $tags;

    protected $rules = [
        'title' => 'required|min:8',
        'url' => 'required|url',
        'owner' => 'required',
        'tags' => '',
    ];

    public function render()
    {
        return view('livewire.packages.packages', [
            'packages' => auth()->user()->packages()->with('tags')->paginate(12),
        ]);
    }

    public function store()
    {
        $this->validate();

        $package = Package::updateOrCreate(['id' => $this->package_id], [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'url' => $this->url,
            'owner' => $this->owner,
        ]);

        $package->syncTags($this->prepareTagsForSync($this->tags));

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
        $this->tags = $package->tags()->pluck('name');

        $this->openModal();
    }

    public function delete($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        $this->closeConfirmDeleteModal();
        $this->closeModal();
        $this->reset();
    }
}
