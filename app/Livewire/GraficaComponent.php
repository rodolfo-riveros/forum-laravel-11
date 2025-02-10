<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GraficaComponent extends Component
{
    //CANTIDAD DE PREGUNTAS POR CATEGORIA

    public $data= [];

    public function mount()
    {
        $this->data = Category::query()
        ->join('threads', 'categories.id', '=', 'threads.category_id')
        ->select('categories.name as categoria', DB::raw('COUNT(categories.id) as respuestas'))
        ->groupBy('categories.id')
        ->orderBy('respuestas', 'desc')
        ->get()->toArray();

    }

    public function render()
    {
        return view('livewire.grafica-component');
    }
}
