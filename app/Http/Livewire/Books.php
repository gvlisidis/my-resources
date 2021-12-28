<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Books extends BaseResourceComponent
{
    use WithFileUploads;

    public $title, $author, $file, $book_id, $tags;

    protected $rules = [
        'title' => 'required|min:5',
        'file' => 'required|file',
        'author' => 'sometimes|nullable',
        'tags' => '',
    ];

    public function render()
    {
        return view('livewire.books.books', [
            'books' => auth()->user()->books()->with('tags')->paginate(12),
        ]);
    }

    public function openPDF($id)
    {
        $book = Book::findOrFail($id);

        return response()->download(storage_path('app/' . $book->path));
    }

    public function store()
    {
        $this->validate();

        $file = $this->file->storeAs('books', $this->title . '.pdf');

        $book = Book::updateOrCreate(['id' => $this->book_id], [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'path' => $file,
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
