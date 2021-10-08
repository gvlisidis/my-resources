<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;

class Videos extends Component
{
    public $title, $url, $video_id;
    public $isOpen = 0;
    public $method;

    protected $rules = [
        'title' => 'required|min:8',
        'url' => 'required|url',
    ];

    public function render()
    {
        return view('livewire.videos.videos', [
            'videos' => auth()->user()->videos()->paginate(12),
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

        Video::updateOrCreate(['id' => $this->video_id], [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'url' => $this->url,
        ]);

        session()->flash(
            'message',
            $this->video_id ? 'Video Updated Successfully.' : 'Video Created Successfully.'
        );
        $this->closeModal();
        $this->reset();
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        $this->video_id = $id;
        $this->title = $video->title;
        $this->url = $video->url;
        $this->method = 'update';

        $this->openModal();
    }
}
