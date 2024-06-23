<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\thread;
use Livewire\Component;

class ShowThreads extends Component
{
    public $search = '';
    public $category = '';

    public function filterByCategory($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $categories = Category::get();
        // metodo para que se muestre cronologicamnete
        $threads = thread::query();
        $threads->where('title', 'like', "%$this->search%");

        if($this->category) {
            $threads->where('category_id', $this->category);
        }

        $threads->withCount('replies');
        $threads->latest()->get();

        return view('livewire.show-threads', ['categories' => $categories, 'threads' => $threads->get()]);
    }
}
