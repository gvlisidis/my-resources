<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class Articles extends Component
{
    public $title, $author, $url, $article_id;
    public $isOpen = 0;

    public function render()
    {
        return view('livewire.articles.articles', [
            'articles' => auth()->user()->articles()->paginate(12),
        ]);
    }

    public function create()
    {
        $this->reset();
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
        $this->validate([
            'title' => 'required',
            'url' => 'required',
            'author' => 'sometimes|nullable',
        ]);

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

        $this->openModal();
    }
}