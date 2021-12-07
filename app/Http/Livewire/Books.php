<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class Books extends BaseResourceComponent
{
    public $title, $author, $path, $book_id, $tags;

    protected $rules = [
        'title' => 'required|min:8',
        'path' => 'required',
        'author' => 'sometimes|nullable',
        'tags' => '',
    ];

    public function render()
    {
        return view('livewire.books.books', [
            'books' => auth()->user()->books()->with('tags')->paginate(12),
        ]);
    }

    public function store()
    {
        $this->validate();

        $book = Book::updateOrCreate(['id' => $this->book_id], [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'path' => $this->path,
            'author' => $this->author,
        ]);

        $book->syncTags($book->prepareTagsForSync($this->tags));

        session()->flash(
            'message',
            $this->book_id ? 'Book Updated Successfully.' : 'Book Created Successfully.'
        );
        $this->closeModal();
        $this->reset();
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $this->book_id = $id;
        $this->title = $book->title;
        $this->path = $book->path;
        $this->author = $book->author;
        $this->method = 'update';
        $this->tags = $book->tags()->pluck('name');

        $this->openModal();
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        $this->closeConfirmDeleteModal();
        $this->closeModal();
        $this->reset();
    }
}
