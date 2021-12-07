<?php

namespace App\Http\Livewire;

use App\Models\Snippet;
use Livewire\Component;

class Snippets extends BaseResourceComponent
{
    public $title, $snippet_id, $body, $tags;

    protected $rules = [
        'title' => 'required|min:8',
        'body' => 'required',
        'tags' => '',
    ];

    public function render()
    {
        return view('livewire.snippets.snippets', [
            'snippets' => auth()->user()->snippets()->with('tags')->paginate(12),
        ]);
    }

    public function store()
    {
        $test = $this->validate();
        dd($test);

        $snippet = Snippet::updateOrCreate(['id' => $this->snippet_id], [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $snippet->syncTags($this->prepareTagsForSync($this->tags));

        session()->flash(
            'message',
            $this->snippet_id ? 'Snippet Updated Successfully.' : 'Snippet Created Successfully.'
        );
        $this->closeModal();
        $this->reset();
    }

    public function edit($id)
    {
        $snippet = Snippet::findOrFail($id);
        $this->snippet_id = $id;
        $this->title = $snippet->title;
        $this->body = $snippet->body;
        $this->method = 'update';
        $this->tags = $snippet->tags()->pluck('name');

        $this->openModal();
    }

    public function delete($id)
    {
        $snippet = Snippet::findOrFail($id);
        $snippet->delete();

        $this->closeConfirmDeleteModal();
        $this->closeModal();
        $this->reset();
    }
}
