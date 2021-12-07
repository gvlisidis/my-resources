<?php

namespace App\Http\Livewire;

use App\Traits\HasTags;
use Livewire\Component;

class BaseResourceComponent extends Component
{
    use HasTags;

    public $tags;
    public $isOpen = 0;
    public $isConfirmDeleteModalOpen = 0;
    public $method;

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

    public function openConfirmDeleteModal()
    {
        $this->isConfirmDeleteModalOpen = true;
    }

    public function closeConfirmDeleteModal()
    {
        $this->isConfirmDeleteModalOpen = false;
    }
}
