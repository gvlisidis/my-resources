<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Book;
use Livewire\Component;

class Books extends Component
{
    public $title, $author, $path, $book_id;
    public $isOpen = 0;
    public $method;

    protected $rules = [
        'title' => 'required|min:8',
        'path' => 'required',
        'author' => 'sometimes|nullable',
    ];

    public function render()
    {
        return view('livewire.books.books', [
            'books' => auth()->user()->books()->paginate(12),
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

        Book::updateOrCreate(['id' => $this->book_id], [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'path' => $this->path,
            'author' => $this->author,
        ]);

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

        $this->openModal();
    }
}
