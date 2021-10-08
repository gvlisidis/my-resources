<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class Articles extends Component
{
    public $title, $author, $url, $article_id;
    public $isOpen = 0;
    public $isConfirmDeleteModalOpen = 0;
    public $method;

    protected $rules = [
        'title' => 'required|min:8',
        'url' => 'required|url',
        'author' => 'sometimes|nullable',
    ];

    public function render()
    {
        return view('livewire.articles.articles', [
            'articles' => auth()->user()->articles()->paginate(12),
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

        Article::updateOrCreate(['id' => $this->article_id], [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'url' => $this->url,
            'author' => $this->author,
        ]);

        session()->flash(
            'message',
            $this->article_id ? 'Article Updated Successfully.' : 'Article Created Successfully.'
        );
        $this->closeModal();
        $this->reset();
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $this->article_id = $id;
        $this->title = $article->title;
        $this->url = $article->url;
        $this->author = $article->author;
        $this->method = 'update';

        $this->openModal();
    }

    public function delete($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        $this->closeConfirmDeleteModal();
        $this->closeModal();
        $this->reset();
    }
}
