<?php

namespace App\Http\Livewire;

use App\Models\Snippet;
use Livewire\Component;

class Snippets extends Component
{
    public $title, $snippet_id, $body;
    public $isOpen = 0;
    public $isConfirmDeleteModalOpen = 0;
    public $method;

    protected $rules = [
        'title' => 'required|min:8',
        'body' => 'required',
    ];

    public function render()
    {
        return view('livewire.snippets.snippets', [
            'snippets' => auth()->user()->snippets()->paginate(12),
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

    public function openConfirmDeleteModal()
    {
        $this->isConfirmDeleteModalOpen = true;
    }

    public function closeConfirmDeleteModal()
    {
        $this->isConfirmDeleteModalOpen = false;
    }

    public function store()
    {
        $this->validate();

        Snippet::updateOrCreate(['id' => $this->snippet_id], [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'body' => $this->body,
        ]);

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
