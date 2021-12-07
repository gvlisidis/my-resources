<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;

class Videos extends BaseResourceComponent
{
    public $title, $url, $video_id, $tags;


    protected $rules = [
        'title' => 'required|min:8',
        'url' => 'required|url',
        'tags' => '',
    ];

    public function render()
    {
        return view('livewire.videos.videos', [
            'videos' => auth()->user()->videos()->with('tags')->paginate(12),
        ]);
    }

    public function store()
    {
        $this->validate();

        $video = Video::updateOrCreate(['id' => $this->video_id], [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'url' => $this->url,
        ]);

        $video->syncTags($video->prepareTagsForSync($this->tags));

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
        $this->tags = $video->tags()->pluck('name');

        $this->openModal();
    }

    public function delete($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        $this->closeConfirmDeleteModal();
        $this->closeModal();
        $this->reset();
    }
}
