<?php

namespace App\Livewire;

use App\Models\thread;
use Livewire\Component;

class ShowThread extends Component
{
    public thread $thread;

    public function render()
    {
        return view('livewire.show-thread');
    }
}
