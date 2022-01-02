<?php

namespace App\Http\Livewire;

use App\Models\Article;

class Articles extends BaseResourceComponent
{
    public $title, $author, $url, $article_id;

    protected $rules = [
        'title' => 'required|min:8',
        'url' => 'required|url',
        'author' => 'sometimes|nullable',
        'tags' => '',
    ];

    public function render()
    {
        return view('livewire.articles.articles', [
             'articles' => auth()->user()->articles()->with('tags')->paginate(12),
            'searchTerm' => $this->searchTerm,
            'model' => $this->model,
        ]);
    }

    public function store()
    {
        $this->validate();

        $article = Article::updateOrCreate(['id' => $this->article_id], [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'url' => $this->url,
            'author' => $this->author,
        ]);

        $article->syncTags($article->prepareTagsForSync($this->tags));

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
        $this->tags = $article->tags()->pluck('name');

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
