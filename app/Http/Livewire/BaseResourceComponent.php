<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BaseResourceComponent extends Component
{
    public $tags;
    public $isOpen = 0;
    public $isConfirmDeleteModalOpen = 0;
    public $method;
    public $searchTerm;
    public $model;

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
