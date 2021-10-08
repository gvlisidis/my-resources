<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class Blogs extends Component
{
    public $title, $author, $url, $blog_id;
    public $isOpen = 0;
    public $method;

    protected $rules = [
        'title' => 'required|min:8',
        'url' => 'required|url',
        'author' => 'sometimes|nullable',
    ];

    public function render()
    {
        return view('livewire.blogs.blogs', [
            'blogs' => auth()->user()->blogs()->paginate(12),
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

        Blog::updateOrCreate(['id' => $this->blog_id], [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'url' => $this->url,
            'author' => $this->author,
        ]);

        session()->flash(
            'message',
            $this->blog_id ? 'Blog Updated Successfully.' : 'Blog Created Successfully.'
        );
        $this->closeModal();
        $this->reset();
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $this->blog_id = $id;
        $this->title = $blog->title;
        $this->url = $blog->url;
        $this->author = $blog->author;
        $this->method = 'update';

        $this->openModal();
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        $this->closeModal();
        $this->reset();
    }
}
