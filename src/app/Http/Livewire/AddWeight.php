<?php

namespace App\Http\Livewire;

use Livewire\Component;


class AddWeight extends Component
{
    public $showModal = false;

    public $date, $weight, $calories, $exercise_time, $exercise_content;

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.add-weight');
    }
}
