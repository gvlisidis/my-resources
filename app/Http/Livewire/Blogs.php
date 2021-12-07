<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Traits\HasTags;
use Illuminate\Support\Str;
use Livewire\Component;

class Blogs extends BaseResourceComponent
{
    use HasTags;

    public $title, $author, $url, $blog_id, $tags;


    protected $rules = [
        'title' => 'required|min:8',
        'url' => 'required|url',
        'author' => 'sometimes|nullable',
        'tags' => '',
    ];

    public function render()
    {
        return view('livewire.blogs.blogs', [
            'blogs' => auth()->user()->blogs()->with('tags')->paginate(12),
        ]);
    }

    public function store()
    {
        $this->validate();

        $blog = Blog::updateOrCreate(['id' => $this->blog_id], [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'url' => $this->url,
            'author' => $this->author,
        ]);

        $blog->syncTags($blog->prepareTagsForSync($this->tags));

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
        $this->tags = $blog->tags()->pluck('name');
        $this->method = 'update';

        $this->openModal();
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        $this->closeConfirmDeleteModal();
        $this->closeModal();
        $this->reset();
    }
}
