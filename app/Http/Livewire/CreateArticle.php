<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class CreateArticle extends Component
{
    public $title;
    public $author;
    public $url;

    protected $rules = [
        'title' => 'required|min:4',
        'author' => 'sometimes|nullable',
        'url' => 'required|url',
    ];

    public function create()
    {
        if (auth()->check()) {
            $this->validate();
            Article::create([
                'user_id' => auth()->id(),
                'title' => $this->title,
                'author' => $this->author,
                'url' => $this->url,
            ]);
        }

        session()->flash('success_message', 'Article was added successfully.');

        $this->reset();

       // return redirect()->route('articles.index');
    }

    public function render()
    {
        return view('livewire.create-article');
    }
}
