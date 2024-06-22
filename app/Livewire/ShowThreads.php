<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\thread;
use Livewire\Component;

class ShowThreads extends Component
{
    public function render()
    {
        $categories = Category::get();
        // metodo para que se muestre cronologicamnete
        $threads = thread::latest()->get();
        return view('livewire.show-threads', ['categories' => $categories, 'threads' => $threads]);
    }
}
